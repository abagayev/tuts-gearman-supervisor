#!/usr/bin/env bash

# be sure that you are using php 7
php -v

# install gearman and tools
sudo apt-get install gearman php-gearman gearman-tools

# run and check gearman status
sudo gearmand -d
gearadmin  --status

# install and setup supervisor
sudo apt-get install supervisor
sudo cp supervisor.conf /etc/supervisor/conf.d/
sudo supervisorctl reload
sudo supervisorctl status
