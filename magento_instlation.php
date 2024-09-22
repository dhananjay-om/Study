<?php
Step 1: 

sudo composer create-project --repository-url=https://repo.magento.com/ magento/project-community-edition=2.4.6 magento246

Step 2: 
sudo php bin/magento setup:install --base-url='http://127.0.0.1/magento247/' --db-host='127.0.0.1' --db-name='magento247' --db-user='root' --db-password='root@123' --admin-firstname='admin' --admin-lastname='admin' --admin-email='kumar.dhananjay@orangemantra.in' --admin-user='admin' --admin-password='admin@123' --language='en_US' --currency='USD' --timezone='Asia/Kolkata' --use-rewrites=1 --cleanup-database --search-engine=elasticsearch7 --elasticsearch-host=192.168.200.24 --elasticsearch-port=9200 --backend-frontname="admin"


Create a virtual host : 
----------------------------

Step 1: copy default config file.

Run from command line:: sudo cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/magento2.com.conf

& you can open magento2.com.conf file using nano command.

sudo nano /etc/apache2/sites-available/magento2.com.conf

Step 2: add below code on new file magento2.com.conf

<VirtualHost *:80>
    ServerAdmin magento2@test.com
    ServerName magento2.com
    ServerAlias www.magento2.com
    DocumentRoot /var/www/html/magento2
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
    <Directory /var/www/html/magento2>
                Options Indexes FollowSymLinks MultiViews
                AllowOverride All
                Order allow,deny
                allow from all
    </Directory>
</VirtualHost>

Step 3: Enable virtual host configuration files

From command line: sudo a2ensite magento2.com.conf

Step 4: start apache service

From command line: sudo service apache2 restart

Step 5: add host entry

From command line: sudo nano /etc/hosts

add below line in hosts file

127.0.0.1 magento2.com

Step 6:

upade below url on value column of core_config_data.

http://magento2.com/

Step 7: go to var/www/html/magento2 & run below commands,

1. sudo chmod -R 0777 var pub generated
2. sudo php bin/magento c:f
3.sudo bin/magento module:disable Magento_AdminAdobeImsTwoFactorAuth Magento_TwoFactorAuth

