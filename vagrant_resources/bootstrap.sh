#!/bin/bash


yum -y update

# Apache
yum -y install httpd

# MySql
yum -y install http://dev.mysql.com/get/mysql-community-release-el6-5.noarch.rpm
yum -y install mysql-community-server

# PHP
# php-version: 5.6.30
yum -y install epel-release
rpm -ivh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
yum -y remove php-*
yum -y install --enablerepo=remi,remi-php56 install mod_ssl httpd php php-devel php-common php-gd php-mbstring php-mysql php-pdo php-pear php-xml

# Setup Appache and Mysql
service httpd start
service mysqld start

# CodeIgniter
unzip /tmp/3.0.1.zip -d /var/www/html/
ln -s /vagrant/codeigniter /var/www/html/code


# mysql
mysqladmin -u root password password
mysql -uroot -ppassword <<EOF
CREATE DATABASE taskboard;
GRANT ALL PRIVILEGES ON taskboard.* TO "root"@"localhost" IDENTIFIED BY "password";
    FLUSH PRIVILEGES;
EOF
