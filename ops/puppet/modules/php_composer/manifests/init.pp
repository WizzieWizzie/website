
define php_composer() {

    ensure_packages( ['wget', 'php5-cli'] )

    file { '/usr/local/bin/install-composer.sh':
        source  => 'puppet:///modules/php_composer/install-composer.sh',
        mode    => '755'
    }

    exec { 'run install-composer.sh':
        command => '/usr/local/bin/install-composer.sh',
        require => [
            Package['wget'],
            Package['php5-cli'],
            File['/usr/local/bin/install-composer.sh']
        ]
    }
}