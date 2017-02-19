#!/bin/bash

domain="localhost:8080"
adminUser="root"
adminPass="password"
adminEmail="sutherland.dave@gmail.com"
siteTitle="Wizzie Wizzie Computer Coding Club"

# get the list of plugins
plugins=`ls -d content/plugins/*/ | sed "s/content\/plugins\/\([^\/]*\)\/.*/\1/g"`
# get the theme
theme=`ls -d content/themes/*/ | sed "s/content\/themes\/\([^\/]*\)\/.*/\1/g"`

cd vendor/wp-cli/wp-cli/bin

wp="./wp --path=../../../../wordpress --url=$domain"

# reset and initialize wordpress
$wp db reset
$wp core install \
    --admin_user="$adminUser" --admin_password="$adminPass" --admin_email="$adminEmail" \
    --title="$siteTitle"

# activate the plugins
for plugin in $plugins
do
    $wp plugin activate $plugin
done

# activate the theme
$wp theme activate $theme

# advanced custom fields
$wp acf import all

# permalink structure - outputs an error which can be ignored
$wp rewrite structure "/%postname%/" > /dev/null

# delete hello world and sample page
$wp post delete 1
$wp post delete 2

# import the content
$wp import content/data/wizziewizziecomputercodingclub.wordpress.2017-02-18.000.xml --authors=create

# home page static page
$wp option update show_on_front 'page'
# specify home page
homePageId=`$wp post list --title="Home" --post_type=page --fields=ID | grep -Eo "[0-9]*"`
$wp option update page_on_front $homePageId
# specify posts page
newsPageId=`$wp post list --title="News" --post_type=page --fields=ID | grep -Eo "[0-9]*"`
$wp option update page_for_posts $newsPageId
