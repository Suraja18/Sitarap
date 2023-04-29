<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;

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

Route::get('/admin',[AdminController::class,'showForm']);
Route::get('/admin/admin_dash',[AdminController::class,'showAdmin']);
Route::get('/admin/company',[AdminController::class,'companymanage'])->name('admin.company');
Route::get('/users',[UserController::class,'showForm']);
Route::get('/clinic',[ClinicController::class,'showForm']);
Route::get('/company',[CompanyController::class,'showForm']);
Route::post('/admin/login',[AdminController::class,'checkLogin'])->name('admin.login');

Route::post('/users/login',[UserController::class,'checkLogin'])->name('users.login');
Route::post('/clinic/login',[ClinicController::class,'checkLogin'])->name('clinic.login');
Route::post('/company/login',[CompanyController::class,'checkLogin'])->name('company.login');
Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');
Route::get('/users/logout',[UserController::class,'logout'])->name('users.logout');
Route::get('/clinic/logout',[ClinicController::class,'logout'])->name('clinic.logout');
Route::get('/company/logout',[CompanyController::class,'logout'])->name('company.logout');
