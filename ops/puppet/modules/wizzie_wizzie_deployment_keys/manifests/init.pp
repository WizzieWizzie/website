class wizzie_wizzie_deployment_keys($user) {

    ensure_packages( ["acl", "keychain"] )

    file { "/home/$user/.ssh":
        ensure          => "directory",
        mode            => "0600",
        owner           => "$user",
        group           => "$user",
    }

    file { "/home/$user/.ssh/id_rsa":
        source          => "puppet:///modules/wizzie_wizzie_deployment_keys/wizzie-deployment_rsa",
        owner           => "$user",
        group           => "$user",
        mode            => "0600",
        require         => File["/home/$user/.ssh"]
    }

    file { "/home/$user/.ssh/id_rsa.pub":
        source          => "puppet:///modules/wizzie_wizzie_deployment_keys/wizzie-deployment_rsa.pub",
        owner           => "$user",
        group           => "$user",
        mode            => "0644"
    }

    exec { "accept bitbucket key":
        command         => "su $user -c \"ssh-keyscan bitbucket.org >> ~/.ssh/known_hosts\"",
        cwd             => "/home/$user",    
        require         => [
                                File["/home/$user/.ssh/id_rsa", "/home/$user/.ssh/id_rsa.pub"],
                                Package["keychain"]
                            ],
    }

    exec { "accept github key as $user":
        command         => "su $user -c \"ssh-keyscan github.com >> ~/.ssh/known_hosts\"",
        cwd             => "/home/$user",    
        require         => [
                                File["/home/$user/.ssh/id_rsa", "/home/$user/.ssh/id_rsa.pub"],
                                Package["keychain"]
                            ],
    }

    file { "/root/.ssh":
        ensure          => "directory",
        mode            => "0600",
        owner           => "root",
        group           => "root",
    }

    file { "/root/.ssh/id_rsa":
        source          => "puppet:///modules/wizzie_wizzie_deployment_keys/wizzie-deployment_rsa",
        owner           => "root",
        group           => "root",
        mode            => "0600",
        require         => File["/root/.ssh"]
    }

    file { "/root/.ssh/id_rsa.pub":
        source          => "puppet:///modules/wizzie_wizzie_deployment_keys/wizzie-deployment_rsa.pub",
        owner           => "root",
        group           => "root",
        mode            => "0644"
    }

    exec { "accept bitbucket key as root":
        command         => "su root -c \"ssh-keyscan bitbucket.org >> ~/.ssh/known_hosts\"",
        cwd             => "/root",    
        require         => [
                                File["/root/.ssh/id_rsa", "/root/.ssh/id_rsa.pub"],
                                Package["keychain"]
                            ],
    }

    exec { "accept github key as root":
        command         => "su root -c \"ssh-keyscan github.com >> ~/.ssh/known_hosts\"",
        cwd             => "/root",    
        require         => [
                                File["/root/.ssh/id_rsa", "/root/.ssh/id_rsa.pub"],
                                Package["keychain"]
                            ],
    }

}