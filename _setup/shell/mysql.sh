#!/usr/bin/env bash

sudo apt-get update
sudo apt-get install -y python-software-properties

sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password 1234'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password 1234'
sudo apt-get -y install mysql-server

sudo apt-get -y install mysql-client