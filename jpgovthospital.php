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
