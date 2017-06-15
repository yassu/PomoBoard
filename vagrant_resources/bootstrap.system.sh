#!/bin/bash


yum -y update

# system

# Apache
yum -y install httpd

# MySql
yum -y install http://dev.mysql.com/get/mysql-community-release-el6-5.noarch.rpm
yum -y install mysql-community-server

# PHP
# php-version: 5.6.30
yum -y install epel-release
rpm -ivh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
yum -y install --enablerepo=remi,remi-php56 install mod_ssl httpd php php-devel php-common php-gd php-mbstring php-mysql php-pdo php-pear php-xml

# php.ini
if [ ! -L /etc/php.ini ]; then
    rm -f /etc/php.ini
    ln -s /vagrant/vagrant_resources/php.ini /etc/php.ini
fi

# httpd.conf
if [ ! -L /etc/httpd/conf/httpd.conf ]; then
    rm /etc/httpd/conf/httpd.conf
    ln -s /vagrant/vagrant_resources/httpd.conf /etc/httpd/conf/httpd.conf
fi

# Setup Appache and Mysql
service httpd start
service mysqld start

# CodeIgniter
if [ ! -L /var/www/html ]; then
    rm -rf /var/www/html/
    ln -s /vagrant/codeigniter /var/www/html
fi

# mysql
mysqladmin -u root password password
mysql -uroot -ppassword <<EOF
CREATE DATABASE IF NOT EXISTS pomoboard;
GRANT ALL PRIVILEGES ON pomoboard.* TO "root"@"localhost" IDENTIFIED BY "password";
    FLUSH PRIVILEGES;
EOF

# migration
(cd /var/www/html && php index.php migrate current)