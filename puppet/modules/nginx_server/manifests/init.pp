class nginx_server($server) {

    ensure_packages( ['nginx', 'openssl'] )

    file { '/etc/nginx/sites-available/default':
        ensure          => file,
        source          => "puppet:///modules/nginx_server/default.$server",
        require         => Package['nginx'],
    }

    exec {'nginx restart':
        command         => '/etc/init.d/nginx restart',
        require         => File['/etc/nginx/sites-available/default'],
    }

}
