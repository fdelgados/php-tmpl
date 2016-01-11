# -*- mode: ruby -*-
# vi: set ft=ruby :

require 'yaml'

settings = YAML.load_file 'vagrant.yml'
exclude_files = File.readlines(settings['folders']['php_tmpl'] + ".gitignore").map(&:chomp)

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  # All Vagrant configuration is done here. The most common configuration
  # options are documented and commented below. For a complete reference,
  # please see the online documentation at vagrantup.com.

  # Every Vagrant virtual environment requires a box to build off of.
  config.vm.box = "hashicorp/precise64"

  config.vm.network "public_network", bridge: settings['vm']['public_network']

  config.vm.hostname = settings['vm']['hostname']

  config.vm.synced_folder settings['folders']['php_tmpl'], "/vagrant"
  config.vm.synced_folder settings['folders']['php_tmpl'], settings['folders']['code'], type: "rsync", owner: "vagrant", group: "vagrant", rsync__args: ["--archive", "-z", "-i"], rsync__exclude: exclude_files

  config.vm.provider "virtualbox" do |vb|
    vb.memory = settings['vm']['memory']
    vb.cpus = settings['vm']['cpus']
  end

  config.vm.provision "shell", inline: "sudo rsync -a -i -K -z --delete -q /vagrant/ " + settings['folders']['code'], privileged: false, run: "always"

  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "ansible/playbook.yml"
    ansible.verbose = "vvvv"
    ansible.extra_vars = {
      code_folder: settings['folders']['code']
    }
  end
end
