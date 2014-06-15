#!/usr/bin/env bash

apt-get update
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password your_password'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password your_password'
apt-get install -y apache2 php5 memcached php5-memcached mysql-server php5-mysql
rm -rf /var/www
ln -s /vagrant /var/www
sudo a2enmod rewrite
sudo sed 's/AllowOverride None/AllowOverride All/' /etc/apache2/sites-available/default > /etc/apache2/sites-available/default
sudo service apache2 restart
mysql -u root -pyour_password < /vagrant/setup.sql
export PATH="$PATH:/vagrant/lib/Cake/Console"
cake -app /vagrant/app schema create
mysql -u root -pyour_password < /vagrant/users.sql