# Wizzie Wizzie Website

## This is the repository for the Wizzie Wizzie website - it is recommended to use vagrant to run and contribute to this project.

### 1. Install the dependencies if you do not already have them

- VirtualBox ([Download Page](https://www.virtualbox.org/wiki/Downloads))
- Vagrant ([Download Page](https://www.vagrantup.com/downloads))

### 2. Clone this repository into a directory
```bash
$ git clone git@github.com:WizzieWizzie/website.git
$ cd website
$ git submodule update --init --recursive
```

### 3. Install the Debian base box
```bash
$ vagrant box add debian/jessie64
```

### 3.1 Install the vagrant-vguest plugin as the debian image does not have the virtualbox guest additions installed.
```bash
$ vagrant plugin install vagrant-vbguest
```

### 4. Boot the VM - provisioning may take some time:
```bash
$ vagrant up
```

### 5. Visit the site - [http://localhost:8080/](http://localhost:8080/)