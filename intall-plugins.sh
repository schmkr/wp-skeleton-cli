#!/usr/bin/env sh
#
# This script assumes you have wp-cli installed.
# @see http://wp-cli.org/ for installation instructions
#

# Wordpress Importer
wp plugin install "wordpress-importer" && wp plugin activate "wordpress-importer"

# W3 Total Cache
wp plugin install "w3-total-cache" && wp plugin activate "w3-total-cache"

# WordPress SEO by Yoast
wp plugin install "wordpress-seo" && wp plugin activate "wordpress-seo"

# Social (by MailChimp)
wp plugin install "social" && wp plugin activate "social"

# Regenerate Thumbnails
wp plugin install "regenerate-thumbnails" && wp plugin activate "regenerate-thumbnails"

# Google XML Sitemaps
# (disabled because it is generating errors (E_STRICT), v 3.2.9)
# wp plugin install "google-sitemap-generator" && wp plugin activate "google-sitemap-generator"

