# redirect laravel subfolder

RewriteEngine On

RewriteCond %{REQUEST_URI} !^/jpgovt56/public/

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f

RewriteRule ^(.*)$ /jpgovt56/public/$1
#RewriteRule ^ index.php [L]
RewriteRule ^(/)?$ jpgovt56/public/index.php [L]

# php -- BEGIN cPanel-generated handler, do not edit
# Set the “ea-php56” package as the default “PHP” programming language.
<IfModule mime_module>
  AddHandler application/x-httpd-ea-php56 .php .php5 .phtml
</IfModule>
# php -- END cPanel-generated handler, do not edit

# Block xmlrpc.php
<Files xmlrpc.php>
Require all denied
</Files>

# Block wp-cron.php
<Files wp-cron.php>
Require all denied
</Files>
