
Exec { path => [ '/bin/', '/sbin/' , '/usr/bin/', '/usr/sbin/' ] }

class vagrant {

    ensure_packages( ['git'] )

    include mysql_server

    class { 'nginx_server':
       server          => 'dev'
    }

    include wordpress_server

    class { 'wizzie_wizzie_deployment_keys':
        user       => 'vagrant'
    }

    exec { 'create dev blog db':
       command         => 'mysqladmin create Wizzie',
       require         =>  [
                               Class['mysql_server'],
                               Class['wordpress_server']
                           ]
    }

    exec { 'blog composer install':
       command             => 'sudo -u vagrant sh -c "cd /vagrant/website; composer install"',
       cwd                 => '/vagrant/website',
       require             =>  [
                                   Package['git'],
                                   Class['wordpress_server']
                               ],
       timeout             => 0
    }
    
}

include vagrant