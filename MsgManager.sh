#!/bin/bash

unzip MsgManager-master-*.zip
rm MsgManager-master-*.zip
mv MsgManager-master-* MsgManagerDeploy
cd MsgManagerDeploy
chmod o+w -R storage bootstrap/cache
chown -R www-data:www-data storage/logs
composer install

cp /var/www/MsgManager/.env /var/www/MsgManagerDeploy/.env
#cp /var/www/MsgManager/storage/oauth* /var/www/MsgManagerDeploy/storage/

#php artisan migrate

cd /var/www
today=$(date +%y%m%d)
mv /var/www/MsgManager /var/www/bak/MsgManager${today}
mv /var/www/MsgManager /var/www/MsgManager