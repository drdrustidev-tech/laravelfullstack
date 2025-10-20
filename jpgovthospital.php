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


<?php

use App\Http\Controllers\CentralOpdRegisterController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\OldNewController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\PatientRegisterController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'permission:manage-admin-tasks'])->group(function () {
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('userroles', UserRoleController::class);

    Route::resource('departments', DepartmentController::class);
    Route::resource('designations', DesignationController::class);
    Route::resource('opds', OpdController::class);
    Route::resource('genders', GenderController::class);
    Route::resource('oldNews', OldNewController::class);
    

});


Route::middleware(['auth', 'permission:manage-patient-register'])->group(function () {

     Route::get('patient_registers/showByOpdNo/{opdno}', [PatientRegisterController::class, 'showByOpdNo'])->name('patient_registers.showByOpdNo');
    Route::resource('patient_registers', PatientRegisterController::class);

    Route::get('central_opd_registers', [CentralOpdRegisterController::class, 'index'])->name('central_opd_registers.index');
    Route::get('central_opd_registers/create', [CentralOpdRegisterController::class, 'create'])->name('central_opd_registers.create');
    Route::post('central_opd_registers', [CentralOpdRegisterController::class, 'store'])->name('central_opd_registers.store');
    Route::get('central_opd_registers/{centralOpdRegister}/edit', [CentralOpdRegisterController::class, 'edit'])->name('central_opd_registers.edit');
    Route::put('central_opd_registers/{centralOpdRegister}', [CentralOpdRegisterController::class, 'update'])->name('central_opd_registers.update');
    Route::delete('central_opd_registers/{centralOpdRegister}', [CentralOpdRegisterController::class, 'destroy'])->name('central_opd_registers.destroy');
});










