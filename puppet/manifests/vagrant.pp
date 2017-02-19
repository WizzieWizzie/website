
Exec { path => [ '/bin/', '/sbin/' , '/usr/bin/', '/usr/sbin/' ] }

class vagrant {

  ensure_packages(['git'])

  include mysql_server

  class { 'nginx_server':
    server => 'dev'
  }

  include wordpress_server

  class { 'wizzie_wizzie_deployment_keys':
    user => 'vagrant'
  }

  exec { 'create wizzie dev db':
    command => 'mysqladmin create Wizzie',
    require =>  [
      Class['mysql_server'],
      Class['wordpress_server']
    ]
  }

  exec { 'wizzie site composer install':
    command => 'sudo -u vagrant sh -c "cd /vagrant/website; composer install"',
    cwd => '/vagrant/website',
    require =>  [
      Package['git'],
      Class['wordpress_server']
    ],
    timeout => 0
  }

  exec { 'wizzie site initialise':
    command => 'sudo -u vagrant sh -c "cd /vagrant/website; ./local-setup.sh"',
    cwd => '/vagrant/website',
    require =>  [
      Exec['wizzie site composer install'],
      Exec['create wizzie dev db']
    ],
    timeout => 0
  }

}

include vagrant