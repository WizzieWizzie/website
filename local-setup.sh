#!/bin/bash

#######################################

domain="local.wizziewizzie.org"

dbName="Wizzie"
dbUser="root"
dbPass=""
dbHost="localhost"

########################################

# create the local config file
cat << EOF > local-config.php
<?php

define('DB_NAME', '$dbName');
define('DB_USER', '$dbUser');
define('DB_PASSWORD', '$dbPass');
define('DB_HOST', '$dbHost');
define('WP_HOME', 'http://$domain/');
define('WP_SITEURL', 'http://$domain/wordpress');

EOF

