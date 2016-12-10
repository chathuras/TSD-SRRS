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
map: "/Users/chathura/Projects/TSD-SRRS"
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
npm install
gulp
```
* Setting Up DB
(Note: this will delete all existing data and recreate tables 
with random sample data)
```
php artisan migrate:refresh --seed
```

* visit below link on the browser
```
http://srrs.app/
```

* if all good you should see the site running

* Sample login details for the user login
```
E-Mail Address: admin@srrs.app
Password: admin1
```
