#!/usr/bin/env sh
#
# This script assumes you have wp-cli installed.
# @see http://wp-cli.org/ for installation instructions
#

# Wordpress Importer
wp plugin install "wordpress-importer" && wp plugin activate "wordpress-importer"

# WP Super Cache
wp plugin install "wp-super-cache" && wp plugin activate "wp-super-cache"

# WordPress SEO by Yoast
wp plugin install "wordpress-seo" && wp plugin activate "wordpress-seo"

# Social (by MailChimp)
wp plugin install "social" && wp plugin activate "social"

# Regenerate Thumbnails
wp plugin install "regenerate-thumbnails" && wp plugin activate "regenerate-thumbnails"

# Google XML Sitemaps
# (disabled because it is generating errors (E_STRICT), v 3.2.9)
# wp plugin install "google-sitemap-generator" && wp plugin activate "google-sitemap-generator"
