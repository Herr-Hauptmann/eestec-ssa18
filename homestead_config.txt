*DISCLAIMER: This setup has been tested on windows only but should work with Linux/Mac OS as well.*

*[On this link](https://laravel.com/docs/5.6/homestead) you can find official homestead documentation which was used to make this docs. However the difference is in details. This one has more details in conjuction with or needs*

First things first, please download or check for updates if you already have it:
* [VirtualBox 5.2](https://www.virtualbox.org/wiki/Downloads)
* [Vagrant](https://www.vagrantup.com/downloads.html)

After installing Vagrant you will probably have to reboot your PC. **This is a great opportunity to check whether your PC has Virtualization enabled.** This can be changed in BIOS (Usually opens when tapping DEL key on machine boot before booting into OS).

**Install vagrant homestead plugin using this command in your cmd/bash:** `vagrant box add laravel/homestead`

Most of this process might take some time, especially the next step so patience is the key here.

Great, now we have everything we need to clone homestead. 

## **For MAC/Linux users:**
```shell
git clone https://github.com/laravel/homestead.git ~/Homestead
```
* Then cd into that directory: `cd ~/Homestead`
* Now we want to get the latest stable release: `git checkout v7.9.0`
* Finally we run small scripts to install some necessary files: `bash init.sh`



## **For Windows users:**
* A common practice is to install homestead inside your Users folder (e.g. C:\Users\Tarik\Homestead) so firstly we want to navigate to our folder using the shell: `cd C:\Users\<your username>`
* Now we can clone (**note: the command is not the same as for the mac/linux**): 
```shell
git clone https://github.com/laravel/homestead.git Homestead
```
* Then cd into that directory: `cd Homestead`
* Now we want to get the latest stable release: `git checkout v7.9.0`
* Finally we run small scripts to install some necessary files: `init.bat`

## Homestead.yaml configuration

Homestead.yaml can be found inside your fresh homestead installation and it provides an easy-to-use structure to make our configuration.

Here is an example of my config, just for the reference
```yaml
---
ip: "192.168.10.10"
memory: 2048
cpus: 1
provider: virtualbox

authorize: c:/Users/Tarik/.ssh/id_rsa.pub

keys:
    - c:/Users/Tarik/.ssh/id_rsa

folders:
    - map: c:/Users/Tarik/Documents/Projects
      to: /home/vagrant/code
      type: "nfs"

sites:
    - map: am-frontend.test
      to: /home/vagrant/code/augsburg-marketing-frontend/public
    - map: am-places.test
      to: /home/vagrant/code/augsburg-marketing-places/public
    - map: vb-dashboard.test
      to: /home/vagrant/code/visionbitesAPI/public
    - map: typo3-8-7-2.test
      to: /home/vagrant/code/prototypo87-composer2/public

databases:
    - homestead

# blackfire:
#     - id: foo
#       token: bar
#       client-id: foo
#       client-token: bar

# ports:
#     - send: 50000
#       to: 5000
#     - send: 7777
#       to: 777
#       protocol: udp
```

## A few notes about configuration
*  Default (and usually always free) IP for homestead is **192.168.10.10** and it shouldn't be changed unless you really, **really**, ***really*** need to.
* default provider is *virtualbox* and if you followed the steps that's the one that we will use
* Parameters *authorize* and *keys* are used for connecting to the vagrant box via SSH. Typically we can just comment these out and homestead will create some for us. Anyways, if that isn't the case you can always change this.
* Next parameter ***folders*** is an important one. It maps **projects folders** from your PC to the projects folders on the Vagrant. The default path for vagrant projects folder is `/home/vagrant/code` but it can be changed (as long as you create the directory first). All of the projects I have, at least the ones I use homestead for, are inside .../Documents/Projects (**notice the forward slashes, it is IMPORTANT to use them instead of windows standard backslash '\\'**). The last parameter in here is *type* and it's optional. "nfs" provides faster syncing but sometimes it will make your Vagrant unable to start so you can comment it out.
* ***sites*** parameter maps URLs to projects. Let's demonstrate this in an example:
```yaml
- map: am-frontend.test # this is the URL
  to: /home/vagrant/code/augsburg-marketing-frontend/public
```
'augsburg-marketing-frontend' is the name of the project you want to map. ***Name of the project folder will always be the same as in your default OS.***

The reason why '/public' is appended here is that this is a [Slim](https://www.slimframework.com/) project and webroot is located in the
 'public' folder. For the composer version of TYPO3 'public' folder is also the web root ***but*** for the "old" 
TYPO3 the web root is actually the project folder - that means no '/public' at the end.


In case a new entry(site) is added to the *sites* property the site you just added needs to be included in *hosts* file.
[Here](https://www.howtogeek.com/howto/27350/beginner-geek-how-to-edit-your-hosts-file/) is a nice tutorial for Windows, Ubuntu or Mac for editing this file.


Example of a new entry in *hosts* file: `192.168.10.10 prototypo87-composer.test`

With current restrictions and notices from internet browsers it is preferred to use **&ast;.test** as the extension.


***Whenever homestead.yaml is changed the vagrant instance needs to be provisioned.*** This can be done using the `vagrant provision` command. If that doesn't make the changes then `vagrant reload --provision` should. Make sure you're inside *Homestead* directory when executing this or any of the commands related to homestead.


### To start homestead you can type `vagrant up` and to shut it down `vagrant halt`.
