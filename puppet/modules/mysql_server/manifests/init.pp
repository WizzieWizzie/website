class mysql_server {

    $mysqlPackages = [
        'mysql-server',
    ]
    package { 
        $mysqlPackages:
            ensure => 'installed',
    }

}

