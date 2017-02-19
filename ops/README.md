# Wizzie Wizzie Ops

## This project uses [packer.io](https://www.packer.io) to build the vagrant box and AMIs for Wizzie Wizzie. To build the www server you will need AWS credentials and the Hiera data with the secrets - talk to David about this 

### 1. You can build the AMI for www from inside the vagrant box

```bash
$ cd /vagrant/ops
$ source aws.sh
$ packer build www.json
```