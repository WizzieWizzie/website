class mysql_server {

    ensure_packages( ['mysql-server'] )

    service { 'mysql':
        ensure      => 'running',
        enable      => true,
        subscribe   => Package['mysql-server'],
    }

}