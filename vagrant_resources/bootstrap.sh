#!/bin/bash


yum -y update

# Apache
yum -y install httpd

# MySql
yum -y install http://dev.mysql.com/get/mysql-community-release-el6-5.noarch.rpm
yum -y install mysql-community-server

# PHP
rpm -Uvh http://ftp.iij.ad.jp/pub/linux/fedora/epel/6/x86_64/epel-release-6-8.noarch.rpm
rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-6.rpm
yum -y install --skip-broken --enablerepo=remi --enablerepo=remi-php56 php php-mbstring php-mcrypt php-pear php-mysql php-mysqli

# Setup Appache and Mysql
service httpd start
service mysqld start

# CodeIgniter
yum -y install unzip
wget https://github.com/bcit-ci/CodeIgniter/archive/3.0.1.zip -P /tmp/
unzip /tmp/3.0.1.zip -d /var/www/html/
mv /var/www/html/CodeIgniter-3.0.1/ /var/www/html/code/

ln -s /vagrant /var/www/html

# mysql
mysqladmin -u root password password
mysql -uroot -ppassword <<EOF
CREATE DATABASE taskboard;
GRANT ALL PRIVILEGES ON taskboard.* TO "root"@"localhost" IDENTIFIED BY "password";
    FLUSH PRIVILEGES;
EOF
