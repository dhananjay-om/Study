
Install opensearch  steps
--------------------------------
https://opensearch.org/docs/latest/install-and-configure/install-opensearch/debian/

wget https://artifacts.opensearch.org/releases/bundle/opensearch/2.12.0/opensearch-2.12.0-linux-x64.deb
sudo dpkg -i opensearch-2.12.0-linux-x64.deb
vi /var/log/opensearch/install_demo_configuration.log
vi jvm.options.d/
vi jvm.options
vi opensearch.yml
vi opensearch-security/
service opensearch restart
netstat -plunt
sudo env OPENSEARCH_INITIAL_ADMIN_PASSWORD=4i5LZ4MPbqxlItl
telnet 127.0.0.1 9200
sudo systemctl enable opensearch
sudo systemctl start opensearch
telnet 127.0.0.1 9200
netstat -plunt
sudo env OPENSEARCH_INITIAL_ADMIN_PASSWORD=4i5LZ4MPbqxlItl dpkg -i opensearch-2.12.0-linux-x64.deb
sudo systemctl daemon-reload
sudo systemctl enable opensearch.service
netstat -plunt
sudo systemctl start opensearch.service
netstat -plunt
vi /etc/opensearch/opensearch.yml


Install phpmyadmin
-----------------------------
wget https://files.phpmyadmin.net/phpMyAdmin/5.2.1/phpMyAdmin-5.2.1-all-languages.zip
unzip phpMyAdmin-5.2.1-all-languages.zip 
mv phpMyAdmin-5.2.1-all-languages phpMyAdmin
vi phpMyAdmin
cd phpMyAdmin
mv config.sample.inc.php config.inc.php 
vi config.inc.php 

changes  server configration name 
$cfg['Servers'][$i]['host'] = 'uat.c5eytmn2uchf.ap-southeast-1.rds.amazonaws.com';


Setup virtualhost
-------------------------
service apache2 restart
a2enmod rewrite headers
nano /etc/apache2/sites-enabled/000-default.conf

<VirtualHost *:80>
        ServerName uat.directwholesale.com.sg
        ServerAlias uat.directwholesale.com.sg
        ServerAdmin webmaster@localhost
        DocumentRoot /var/www/html/pub

RewriteEngine On
#RewriteCond %{HTTP:X-Forwarded-Proto} =http
#RewriteRule . https://%{HTTP:Host}%{REQUEST_URI} [L,R=permanent]

<Directory /var/www/>
        Options Indexes FollowSymLinks Includes
        AllowOverride All
        Order allow,deny
        Allow from all
</Directory>

ErrorLog ${APACHE_LOG_DIR}/error.log
CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>


