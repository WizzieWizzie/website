Vagrant.configure(2) do |config|

    config.vm.box = "debian/jessie64"
    config.vm.box_version = "8.7.0"

    config.vm.network "private_network", type: "dhcp"
    config.vm.network "forwarded_port", guest: 80, host: 8080

    # enable swap
    config.vm.provision :shell, :path => "ops/scripts/swap.sh"

    # install puppet
    config.vm.provision :shell, :path => "ops/scripts/puppet.sh"
    
    # install packer
    config.vm.provision :shell, :path => "ops/scripts/packer.sh"

    # provision with puppet
    config.vm.provision "puppet" do |puppet|
        puppet.module_path = "ops/puppet/modules"
        puppet.manifests_path = "ops/puppet/manifests"
        puppet.manifest_file = "vagrant.pp"
        puppet.options = ['--verbose']
    end

    config.ssh.forward_agent = true
    config.vm.synced_folder ".", "/vagrant", type: "virtualbox"

end