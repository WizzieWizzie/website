
class wizzie_wizzie_wordpress_deployment($server, $user) {
   
    ensure_packages( ["git", "python-pip"] )

    exec { "setup wizzie-wizzie blog project root":
        command         => "mkdir -p /opt/wizzie-wizzie-wordpress "
    }

    exec { "change owner of /opt/wizzie-wizzie-wordpress":
        command         => "chown -R $user:$user /opt/wizzie-wizzie-wordpress",
        require         => Exec["setup wizzie-wizzie blog project root"]
    }

    # todo remove the .git dir
    exec { "clone the git repo" :
        command         => "su $user -c \"git clone git@bitbucket.org:wizziewizzie/website.git /opt/wizzie-wizzie-wordpress/.\"",
        cwd             => "/home/$user",
        require         =>  [
                                Class["wizzie_wizzie_deployment_keys"],
                                Package["git"],
                                Exec["change owner of /opt/wizzie-wizzie-wordpress"]
                            ]
    }

    exec { "run composer install" :
        serverironment     => ["COMPOSER_HOME=/root"],
        command         => "composer install",
        cwd             => "/opt/wizzie-wizzie-wordpress",
        require         =>  Exec["clone the git repo"]
    }

    exec { "change permissions on content":
        command         => "chown -R www-data:www-data *",
        cwd             => "/opt/wizzie-wizzie-wordpress",
        require         =>  Exec["sync the content"]
    }


    file { "/opt/wizzie-wizzie-wordpress/local-config.php":
        source          => "puppet:///modules/wizzie_wizzie_wordpress_deployment/local-config.php.$server",
        owner           => "$user",
        group           => "$user",
        mode            => "775",
        require         =>  Exec["clone the git repo"]
    }

}