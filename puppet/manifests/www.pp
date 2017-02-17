
Exec { path => [ '/bin/', '/sbin/' , '/usr/bin/', '/usr/sbin/' ] }

class www {

    hostname { 'set the www server hostname':
      server  => 'www'
    }

    include mysql_server

    class { 'nginx_server':
      server  => 'www'
    }

    include wordpress_server

    class { 'wizzie_wizzie_deployment_keys':
      user    => 'admin'
    }

    class { 'wizzie_wizzie_wordpress_deployment':
      user    => 'admin',
      group   => 'www-data',
      server  => 'www',
      require => [
        Class['wordpress_server'],
        Class['wizzie_wizzie_deployment_keys']
      ]
    }

}

include www