#!/bin/bash


yum -y update

# system
yum -y install git

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

# composer
if [ ! -e /usr/local/bin/composer.phar ]; then
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php --install-dir /usr/bin
    php -r "unlink('composer-setup.php');"
fi

# Setup Appache and Mysql
service httpd start
service mysqld start

# CodeIgniter
if [ ! -L /var/www/html ]; then
    rm -rf /var/www/html/
    ln -s /vagrant/codeigniter /var/www/html
fi

# CodeSniffer
(
    cd /var/www/html/
    composer.phar install
)
(
    cd /tmp/
    git clone https://github.com/thomas-ernest/CodeIgniter-for-PHP_CodeSniffer.git
    cd /var/www/html/vendor/squizlabs/php_codesniffer/src/Standards/
    mkdir CodeIgniter
    cp -R /tmp/CodeIgniter-for-PHP_CodeSniffer/src/* CodeIgniter/
)

# mysql
mysqladmin -u root password password
mysql -uroot -ppassword <<EOF
CREATE DATABASE IF NOT EXISTS pomoboard;
GRANT ALL PRIVILEGES ON pomoboard.* TO "root"@"localhost" IDENTIFIED BY "password";
    FLUSH PRIVILEGES;
EOF

# migration
(cd /var/www/html && php index.php migrate current)