#!/usr/bin/env bash

# enables the swapfile on aws micro instances

sudo dd if=/dev/zero of=/swapfile bs=1M count=1024
sudo mkswap /swapfile
sudo swapon /swapfile
sudo echo "/swapfile swap swap defaults 0 0" | sudo tee -a /etc/fstab