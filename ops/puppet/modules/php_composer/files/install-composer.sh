#!/bin/sh

EXPECTED_SIGNATURE=$(wget -q -O - https://composer.github.io/installer.sig)
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
ACTUAL_SIGNATURE=$(php -r "echo hash_file('SHA384', 'composer-setup.php');")

if [ "$EXPECTED_SIGNATURE" != "$ACTUAL_SIGNATURE" ]
then
    >&2 echo 'ERROR: Invalid installer signature'
    rm composer-setup.php
    exit 1
fi

# jokes and japes from the composer team!
export COMPOSER_HOME=/root
php composer-setup.php --install-dir=/usr/bin/ --quiet
RESULT=$?

mv /usr/bin/composer.phar /usr/bin/composer

rm composer-setup.php
exit $RESULT