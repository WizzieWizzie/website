class nginx_server($server) {

    ensure_packages( ['nginx', 'openssl'] )

    file { '/etc/nginx/sites-available/default':
        ensure      => file,
        source      => "puppet:///modules/nginx_server/default.$server",
        require     => Package['nginx'],
    }

    service { 'nginx':
        ensure      => 'running',
        enable      => true,
        subscribe   => File['/etc/nginx/sites-available/default'],
    }

}
