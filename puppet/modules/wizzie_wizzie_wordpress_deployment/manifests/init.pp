class wizzie_wizzie_wordpress_deployment($server, $user, $group) {
   
  ensure_packages( ["git"] )

  exec { "setup wizzie-wizzie blog project root":
    command => "mkdir -p /opt/wizzie-wizzie-wordpress"
  }

  exec { "change owner of /opt/wizzie-wizzie-wordpress":
    command => "chown -R $user:$user /opt/wizzie-wizzie-wordpress",
    require => Exec["setup wizzie-wizzie blog project root"]
  }

  # todo remove the .git dir
  exec { "clone the git repo" :
    command => "su $user -c \"git clone git@bitbucket.org:wizziewizzie/website.git /opt/wizzie-wizzie-wordpress/.\"",
    cwd => "/home/$user",
    require =>  [
      Class["wizzie_wizzie_deployment_keys"],
      Package["git"],
      Exec["change owner of /opt/wizzie-wizzie-wordpress"]
    ]
  }

  exec { "run composer install" :
    environment => ["COMPOSER_HOME=/root"],
    command => "composer install",
    cwd => "/opt/wizzie-wizzie-wordpress",
    require => Exec["clone the git repo"]
  }

  exec { "change permissions on content":
    command => "chown -R $user:$group *",
    cwd => "/opt/wizzie-wizzie-wordpress",
    require => Exec["clone the git repo"]
  }

  file { "/opt/wizzie-wizzie-wordpress/local-config.php":
    source => "puppet:///modules/wizzie_wizzie_wordpress_deployment/local-config.php.$server",
    owner => "$user",
    group => "$user",
    mode => "775",
    require => Exec["clone the git repo"]
  }

  # mount the Amazon EFS
  ensure_packages( ["nfs-common"] )

  file { "/opt/wizzie-wizzie-data":
    ensure => "directory",
    owner => "$user",
    group => "$group",
  }

  mount { "/opt/wizzie-wizzie-data":
    device  => "***REMOVED***",
    fstype  => "nfs",
    ensure  => "mounted",
    options => "nfsvers=4.1,rsize=1048576,wsize=1048576,hard,timeo=600,retrans=2",
    atboot  => "true",
    require => File["/opt/wizzie-wizzie-data"]
  }

  file { '/opt/wizzie-wizzie-wordpress/content/uploads':
    ensure => 'link',
    target => '/opt/wizzie-wizzie-data/www.wizziewizzie.org.uploads/',
    require => Mount["/opt/wizzie-wizzie-data"]
  }

}
