class wizzie_wizzie_wordpress_deployment($user, $group,
  $efsMountDevice = '',
  $dbHost = 'localhost',
  $dbName = 'Wizzie',
  $dbUser = 'root',
  $dbPass = '',
  $googleSheetAccountEmail = '', 
  $wizzieEmailSenderEmail = '',
  $wizzieEmailSenderName = '',
  $wizzieEmailSenderCCS = '',
  $wizzieMailerUsername = '',
  $wizzieMailerPassword = '',
  $saltsAuthKey = '',
  $saltsSecureAuthKey = '',
  $saltsLoggedInKey = '',
  $saltsNonceKey = '',
  $saltsAuth = '',
  $saltsSecureAuth = '',
  $saltsLoggedIn = '',
  $saltsNonce = '',
) {
   
  ensure_packages( ["git"] )

  file { "/opt/wizzie-wizzie-wordpress":
    ensure => "directory",
    owner => "$user",
    group => "$group",
  }

  exec { "clone the git repo" :
    command => "su $user -c \"git clone git@github.com:WizzieWizzie/website.git /opt/wizzie-wizzie-wordpress/.\"",
    cwd => "/home/$user",
    require =>  [
      Class["wizzie_wizzie_deployment_keys"],
      Package["git"],
      File["/opt/wizzie-wizzie-wordpress"]
    ]
  }

  exec { "run composer install" :
    environment => ["COMPOSER_HOME=/root"],
    command => "composer install",
    cwd => "/opt/wizzie-wizzie-wordpress/website",
    require => Exec["clone the git repo"]
  }

  file { "/opt/wizzie-wizzie-wordpress/website/local-config.php":
    content => template('wizzie_wizzie_wordpress_deployment/local-config.php.erb'),
    owner => "$user",
    group => "$user",
    mode => "664",
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
    device  => "$efsMountDevice",
    fstype  => "nfs",
    ensure  => "mounted",
    options => "nfsvers=4.1,rsize=1048576,wsize=1048576,hard,timeo=600,retrans=2",
    atboot  => "true",
    require => File["/opt/wizzie-wizzie-data"]
  }

  file { '/opt/wizzie-wizzie-wordpress/website/content/uploads':
    ensure => 'link',
    target => '/opt/wizzie-wizzie-data/www.wizziewizzie.org.uploads/',
    require => Mount["/opt/wizzie-wizzie-data"]
  }

}
