# PHP project template

## System requirements
This guide is intended for users of Unix (Linux / Mac OS X) machines.

In order to use this template, you will need to install the following software
in your local machine:
+ VirtualBox ([site](https://www.virtualbox.org/))
+ Vagrant ([site](https://www.vagrantup.com/))
+ Ansible ([site](http://www.ansible.com/))

## Install VirtualBox 

Download [here](https://www.virtualbox.org/wiki/Downloads) the appropriate VirtualBox package for your platform. Install
it!

## Install Vagrant

Go [here](http://www.vagrantup.com/downloads) and download the appropriate 
installer or package for your platform. Then install it.

## Install Ansible
### Install Ansible on Ubuntu:
Install the `software-properties-common` package

```
sudo apt-get update
sudo apt-get install software-properties-common
```

Once the package is installed, we can add the Ansible PPA by typing the 
following command:

```sh
sudo apt-add-repository ppa:ansible/ansible
```

Next, we need to refresh our system's package index so that it is aware of the 
packages available in the PPA. Afterwards, we can install the software:

```sh
sudo apt-get update
sudo apt-get install ansible
```
### Install Ansible on Mac OS X

Install Ansible using Python:

```sh
sudo easy_install pip
sudo pip install ansible --quiet
```

Install Ansible using Homebrew:

```sh
brew install ansible
```

## Run the environment

First create a copy of the vagrant.yml.dist file and rename it to vagrant.yml:

```sh
cp vagrant.yml.dist vagrant.yml
```

And change the appropiate values, remember to change the hostname or the machine
will never start.

Now, you can start the virtual machine. To do so, run the commands below:

```sh
vagrant up
vagrant rsync-auto
```

If you want to interact with the virtual machine through an SSH session, run 
this command:

```sh
vagrant ssh
```

You can run the two steps above in just one line:

```sh
vagrant reload --provision && vagrant ssh -c "[any bash command]" && vagrant rsync-auto
```

To stop the environment, run this:

```sh
vagrant halt
```

That's all, enjoy!!