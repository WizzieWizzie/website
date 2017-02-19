#!/usr/bin/env bash

# installs packer to /usr/local/bin/packer

apt-get -y install unzip

mkdir -p /tmp/packer; cd /tmp/packer
wget -q https://releases.hashicorp.com/packer/0.12.1/packer_0.12.1_linux_amd64.zip
unzip packer_0.12.1_linux_amd64.zip
mv packer /usr/local/bin/packer
cd /
rm -rf /tmp/packer