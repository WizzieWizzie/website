#!/usr/bin/env bash

# install puppet sources
wget https://apt.puppetlabs.com/puppetlabs-release-pc1-trusty.deb
sudo dpkg -i puppetlabs-release-pc1-trusty.deb

# update apt and install puppet
sudo apt-get update
sudo apt-get -y install puppet

# TODO: this should be put somewhere else
cat > /etc/profile.d/00-aliases.sh <<EOT
alias ll='ls -l'
EOT
