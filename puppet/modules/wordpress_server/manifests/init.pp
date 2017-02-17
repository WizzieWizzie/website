class wordpress_server() {

    ensure_packages( [
        'php5-fpm',
        'php5-mysql',
        'php5-cli',
        'php5-curl',
        'curl',
        'wget'
    ] )

    php_composer { 'install composer': }

    file { '/etc/php5/mods-available/max-upload-size-100M.ini':
        ensure          => present,
        source          => "puppet:///modules/wordpress_server/max-upload-size-100M.ini",
        require         => Package['php5-fpm'],
    }

    file { '/etc/php5/fpm/conf.d/30-max-upload-size-100M.ini':
        ensure          => link,
        target          => '/etc/php5/mods-available/max-upload-size-100M.ini',
        require         => File['/etc/php5/mods-available/max-upload-size-100M.ini'],
    }

    service { 'php5-fpm':
        ensure          => 'running',
        enable          => true,
        subscribe       => File['/etc/php5/fpm/conf.d/30-max-upload-size-100M.ini'],
    }

}