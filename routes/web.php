<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

#Admin Route
Route::get('/admin',[AdminController::class,'showForm'])->name('admin');

#Route::get('/admin/admin_dash',[AdminController::class,'showAdmin']);



#Company
Route::get('/company',[CompanyController::class,'showForm'])->name('company');


#Users
Route::get('/users',[UserController::class,'showForm'])->name('users');



#Clinic
Route::get('/clinic',[ClinicController::class,'showForm'])->name('clinic');





Route::middleware(['admin'])->group(function () {
    Route::get('/admin/admin_dash',[AdminController::class,'showAdmin'])->name('admin_dash');
    Route::post('/admin/add_company',[AdminController::class,'addcompany'])->name('admin.add_company');
    Route::get('/admin/company',[AdminController::class,'companymanage'])->name('admin.company');
    Route::get('/admin/view_company',[AdminController::class,'viewcompany'])->name('admin.view_company');
    Route::get('/admin/del_company/{id}',[AdminController::class,'delcompany'])->name('admin.del_company');
    Route::post('/admin/login',[AdminController::class,'checkLogin'])->name('admin.login');
    Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');
});

Route::middleware(['company'])->group(function () {
    Route::post('/company/add_clinic',[CompanyController::class,'addclinic'])->name('company.add_clinic');
    Route::post('/company/add_user',[CompanyController::class,'adduser'])->name('company.add_user');
    Route::post('/company/add_token',[CompanyController::class,'addtoken'])->name('company.add_token');
    Route::get('/company/clinic',[CompanyController::class,'clinicmanage'])->name('company.clinic');
    Route::get('/company/user',[CompanyController::class,'usermanage'])->name('company.user');
    Route::get('/company/token',[CompanyController::class,'tokenmanage'])->name('company.token');
    Route::get('/company/view_clinic',[CompanyController::class,'viewclinic'])->name('company.view_clinic');
    Route::get('/company/view_user',[CompanyController::class,'viewuser'])->name('company.view_user');
    Route::get('/company/del_token/{id}',[CompanyController::class,'deltoken'])->name('company.del_token');
    Route::get('/company/del_clinic/{id}',[CompanyController::class,'delclinic'])->name('company.del_clinic');
    Route::get('/company/del_user/{id}',[CompanyController::class,'deluser'])->name('company.del_user');
    Route::post('/company/login',[CompanyController::class,'checkLogin'])->name('company.login');
    Route::get('/company/logout',[CompanyController::class,'logout'])->name('company.logout');
});

Route::middleware(['clinic'])->group(function () {
    Route::post('/clinic/login',[ClinicController::class,'checkLogin'])->name('clinic.login');
    Route::get('/clinic/logout',[ClinicController::class,'logout'])->name('clinic.logout');
});

Route::middleware(['user'])->group(function () {
    Route::get('/users/logout',[UserController::class,'logout'])->name('users.logout');
    Route::post('/users/login',[UserController::class,'checkLogin'])->name('users.login');
});
