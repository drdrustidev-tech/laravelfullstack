composer create-project --prefer-dist laravel/laravel jpgovthospitalxx
composer require guizoxxv/laravel-breeze-bootstrap

php artisan breeze-bootstrap:install
npm i -D sass@1.77.6 --save-exact
npm remove tailwindcss postcss autoprefixer
npm install bootstrap @popperjs/core
Edit resources/css/app.css
@import "bootstrap/dist/css/bootstrap.min.css";
Edit resources/js/app.js
Add this line at the bottom:
import 'bootstrap';


composer require maatwebsite/excel:3.1.67
enable extension gd zip
php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config


php artisan migrate:rollback --step=1 

php artisan make:model Department -mcr
short_name, medium_name, full_name

php artisan make:model Designation -mcr
short_name, medium_name, full_name

php artisan make:model Opd -mcr
short_name, medium_name, full_name, opd_no
php artisan make:model Gender -mcr
short_name, medium_name, full_name

php artisan make:model PatientRegister -mcr
unique_id, opd_no, name, age, gender_id, address
php artisan make:model YearlyOpdRegister -mcr
patient_register_id, yearly_opd_register_date, opd_no

php artisan make:model CentralOpdRegister -mcr
patient_register_id, consult_date, old_new, opd_room_no

php artisan make:controller CentralOpdRegisterReportController


php artisan migrate:rollback --path=/database/migrations/2025_10_16_172022_create_opds_table.php

dd(json_encode($report, JSON_PRETTY_PRINT));
dd($report->toArray());
php artisan make:seeder DepartmentTableSeeder
php artisan make:seeder DesignationTableSeeder
php artisan make:seeder OldNewTableSeeder
php artisan make:seeder OpdTableSeeder
php artisan make:seeder GenderTableSeeder
php artisan make:controller UserRoleController
php artisan make:controller RolePermissionController
After deleting any controller model
# Clear cached files
php artisan cache:clear
php artisan route:clear
php artisan config:clear
php artisan view:clear

# Regenerate autoload files
composer dump-autoload

php artisan migrate:fresh --seed

To deployee to host
composer install --optimize-autoloader --no-dev
npm run build   # if you're using Vite
php artisan config:cache
php artisan route:cache
php artisan view:cache

in root folder make htaccess file

# redirect laravel subfolder

RewriteEngine On

RewriteCond %{REQUEST_URI} !^/jpgovthospital/public/

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f

RewriteRule ^(.*)$ /jpgovthospital/public/$1
#RewriteRule ^ index.php [L]
RewriteRule ^(/)?$ jpgovthospital/public/index.php [L]

# Block xmlrpc.php
<Files xmlrpc.php>
Require all denied
</Files>

# Block wp-cron.php
<Files wp-cron.php>
Require all denied
</Files>

# php -- BEGIN cPanel-generated handler, do not edit
# Set the “ea-php81” package as the default “PHP” programming language.
<IfModule mime_module>
  AddHandler application/x-httpd-ea-php81 .php .php8 .phtml
</IfModule>
# php -- END cPanel-generated handler, do not edit










