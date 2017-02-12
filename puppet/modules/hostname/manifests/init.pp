
define hostname($server) {

    file { '/root/set-hostname.sh':
        ensure          => present,
        content         => template('hostname/set-hostname.sh.erb'),
        mode            => '775',
    }

    cron { 'add set-hostname.sh cron job': 
       command         => '/root/set-hostname.sh',
       user            => 'root',
       special         => 'reboot',
       require         => File['/root/set-hostname.sh']
    }

}