Wizzie Website
==============

Setting up:

    curl -sS https://getcomposer.org/installer | php
    php composer.phar install

Then create a local-config.php in the root with this stuff in it:


    <?php

    define( 'DB_NAME', 'Wizzie' );
    define( 'DB_USER', 'root' );
    define( 'DB_PASSWORD', '' );
    define( 'DB_HOST', 'localhost' );
    define( 'WP_HOME', 'http://local.wizziewizzie.org/');
    define( 'WP_SITEURL', 'http://local.wizziewizzie.org/wordpress');


Create a database & user if needed:

    mysql -e"CREATE DATABASE Wizzie;"

Use wp-cli to setup db, plugins, and import existing content:

    cd vendor/wp-cli/wp-cli/

    ./wp --path=../../../../wordpress --url=local.wizziewizzie.org db reset

    ./wp core install --path=../../../../wordpress --url=local.wizziewizzie.org --admin_user=root --admin_password=password --admin_email=sutherland.dave@gmail.com --title="Wizzie"


