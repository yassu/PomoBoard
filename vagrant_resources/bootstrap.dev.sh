#!/bin/bash


yum -y install git

# bash_profile
if [ ! -L /home/vagrant/.bash_profile ]; then
    rm /home/vagrant/.bash_profile
    ln -s /vagrant/vagrant_resources/bash_profile /home/vagrant/.bash_profile
fi


# composer
if [ ! -e /usr/local/bin/composer.phar ]; then
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php --install-dir /usr/bin
    php -r "unlink('composer-setup.php');"
fi

# CodeSniffer
if [ ! -e /var/www/html/vendor/ ]; then
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
fi
