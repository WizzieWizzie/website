#!/bin/bash

#######################################

domain="local.wizziewizzie.org"

adminUser="root"
adminPass="password"
adminEmail="sutherland.dave@gmail.com"

siteTitle="Wizzie Wizzie"

########################################


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


# import data
$wp import ../../../../content/data/wizziewizzie.wordpress.2015-06-25.xml --authors=create

# Add default Homa and News page
# Relies on the import data ids to be correct
$wp option set show_on_front page
$wp option set page_on_front 10
$wp option set page_for_posts 12