#!/usr/bin/env bash

apt-get update
apt-get install -y apache2 php5 memcached php5-memcached
rm -rf /var/www
ln -s /vagrant /var/www
sudo a2enmod rewrite
sudo sed 's/AllowOverride None/AllowOverride All/' /etc/apache2/sites-available/default > /etc/apache2/sites-available/default
sudo service apache2 restart