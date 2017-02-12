
Exec { path => [ '/bin/', '/sbin/' , '/usr/bin/', '/usr/sbin/' ] }

class www {

    ensure_packages( ['git'] )

    hostname { 'set the www server hostname':
        server => 'www'
    }

    include mysql_server

    class { 'nginx_server':
       server => 'www'
    }

    include wordpress_server

    class { 'wizzie_wizzie_deployment_keys':
        user => 'admin'
    }

}

include www