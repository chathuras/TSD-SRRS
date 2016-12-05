# TSD - SRRS


## Setting Up Instructions

### Prerequisite

* Virtualbox https://www.virtualbox.org/wiki/Downloads
* Vagrant https://www.vagrantup.com/
* Git

### Install

``` 
git clone git@github.com:chathuras/TSD-SRRS.git
cd TSD-SRRS
```

* Open Homestead.yml and edit below to match the project path in your machine
```
map: "/Users/chathura/PhpstormProjects/TSD-SRRS"
```
* Add below entry to the host file
```
192.168.10.10   srrs.app
```
* Run
```
vagrant provision
vagrant up
vagrant ssh
cd tsd-srrs
composer install
```

* visit below link on the browser
```
http://srrs.app/
```

* if all good you should see the site running