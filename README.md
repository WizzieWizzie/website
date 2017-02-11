# Wizzie Wizzie Ops

## This project uses [packer.io](https://www.packer.io) to build the vagrant box and AMIs for Wizzie Wizzie. 

### 1. Install the dependencies if you do not already have them

- Packer ([Download Page](https://www.packer.io/downloads.html)]

### 2. Clone this repository into a directory

```bash
$ git clone git@bitbucket.org:wizziewizzie/ops.git
$ cd ops
$ git submodule update --init --recursive
```

### 3. Build

```bash
$ packer build www.json
```