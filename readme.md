# TSD - SRRS

## Setting Up Instructions

### Method 01: With XAMPP in Windows

* Install XAMPP https://www.apachefriends.org/index.html
* Install composer https://getcomposer.org/
* Install Node.js https://nodejs.org/en/
* Install Git https://git-scm.com/

* Execute below on command prompt

```
cd C:\xampp\htdocs\
git clone git@github.com:chathuras/TSD-SRRS.git
cd TSD-SRRS
copy .env.example .env
```

* Create an empty database on MySql via phpMyAdmin

```
Example:
mysql> CREATE DATABASE `tsd-srrs`;
```

* Update database credentials on .env file
```
Example:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tsd-srrs
DB_USERNAME=homestead
DB_PASSWORD=
```

* Execute below on command prompt to set up DB tables
(Note: this will delete all existing data and recreate tables 
with random sample data)
```
php artisan migrate:refresh --seed
```

* Open C:\xampp\apache\conf\extra\httpd-vhosts.conf file and add following lines at the end of the file to create a
VirtualHost and restart Apache.
```apacheconfig
<VirtualHost *:80>
	DocumentRoot "C:\xampp\htdocs\TSD-SRRS\public"
		ServerName srrs.app
	<Directory "C:\xampp\htdocs\TSD-SRRS\public">
		Order allow,deny
		Allow from all
</Directory>
</VirtualHost>
```

* Open C:\Windows\System32\drivers\etc\hosts file as Administrator and add following line at the end of the file.
```
127.0.0.1   srrs.app
```

* Execute below on command prompt
```
composer install
npm install
npm install -g gulp
gulp watch
```

<!--
### Method 02: With Vagrant on Linux and Mac

* Install Virtualbox https://www.virtualbox.org/wiki/Downloads
* Install Vagrant https://www.vagrantup.com/
* Install Git

* Add below entry to the host file
```
192.168.10.10   srrs.app
```

* Navigate to the directory where you want to keep the project and execute below on command prompt
``` 
git clone git@github.com:chathuras/TSD-SRRS.git
cd TSD-SRRS
vagrant up
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
-->

## Accessing the web site 
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