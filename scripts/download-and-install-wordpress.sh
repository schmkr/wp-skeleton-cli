#!/usr/bin/env sh
#
# This script assumes you have wp-cli installed.
# @see http://wp-cli.org/ for installation instructions
#
# This script should also be called from the root dir of this project.

read -p "[1/4] What will the url be for this installation? http://" URL
read -p "[2/4] What is the title for this blog? " TITLE
read -p "[3/4] Please provide a username for the admin: " ADMIN_NAME
read -p "[4/4] Please provide an emailaddres for the admin: " ADMIN_EMAIL

# Don't ask the user for a password, just generate on for him:
ADMIN_PASSWORD=`dd if=/dev/random bs=16 count=1 2>/dev/null | base64 | sed 's/=//g'`

# But do let the user know what the password is ;-)
echo "The password for $ADMIN_NAME ($ADMIN_EMAIL) will be: $ADMIN_PASSWORD";

# Download Wordpress
wp core download

# Do the installation with the given options
wp core install \
 	--url="http://$URL/wp" \
 	--title="$TITLE" \
 	--admin_name="$ADMIN_NAME" \
 	--admin_email="$ADMIN_EMAIL" \
 	--admin_password="$ADMIN_PASSWORD"

# Make sure the blog is (for now) not public, we have a lot of configuration to do
wp option set blog_public 0

# Set the "home" url to the same as URL, but without "/wp"
wp option set home "http://$URL"

# Set the timezone to Europe/Amsterdam and the right date format
wp option set timezone_string "Europe/Amsterdam"
wp option set date_format "d-m-Y"
wp option set time_format "H:i"

# I don't like those smileys Wordpress uses, disabled them
wp option set use_smilies 0

# Disabled pingback
wp option set default_pingback_flag 0
wp option set default_ping_status 0

# Disabled threaded comments
wp option set thread_comments 0

# Don't show avatars in comments
wp option set show_avatars 0
wp option set avatar_default "blank"

# Change the image dimensions to a bit larger:
wp option set thumbnail_size_w 164
wp option set thumbnail_size_h 164
wp option set medium_size_w 500
wp option set medium_size_h 500
wp option set large_size_w 1500
wp option set large_size_h 1500

# Set the permalink structure to /%postname%/
wp option set permalink_structure "/%postname%/"
