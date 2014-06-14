#!/usr/bin/env bash

apt-get update
apt-get install -y apache2 php5
rm -rf /var/www
cp -r /vagrant /var/www
chown -R www-data /var/www/app/tmp/