
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
    require => [
      Class['wordpress_server'],
      Class['wizzie_wizzie_deployment_keys']
    ]
  }

  class { '::ntp':
    servers => [
      '0.amazon.pool.ntp.org',
      '1.amazon.pool.ntp.org',
      '2.amazon.pool.ntp.org',
      '3.amazon.pool.ntp.org'
    ],
  }

}

include www