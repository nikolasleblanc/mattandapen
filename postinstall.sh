#!/usr/bin/env bash

sudo apt-get update
sudo apt-get install -y python-software-properties
sudo apt-get install -y curl
sudo apt-get install -y vim
sudo apt-get install -y git

echo "192.168.30.13 breathe.eaaps.local" >> /etc/hosts
echo "192.168.30.11 api.eaaps.local" >> /etc/hosts
echo "192.168.30.14 apinode.eaaps.local" >> /etc/hosts
echo "192.168.30.12 eaaps.eaaps.local" >> /etc/hosts
echo "192.168.30.15 mysql.eaaps.local" >> /etc/hosts