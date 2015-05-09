#!/usr/bin/env bash

sudo add-apt-repository ppa:ondrej/php5
sudo apt-get update
sudo apt-get install -y php5 php5-curl php5-mysql

sudo a2enmod rewrite
sudo a2enmod headers
sudo service apache2 restart

sudo cp /vagrant/_setup/config/apache.conf /etc/apache2/sites-available/000-default.conf
sudo service apache2 restart

sudo rm -rf /var/www/html