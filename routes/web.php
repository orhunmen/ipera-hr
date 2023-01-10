<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/managerMenu', [App\Http\Controllers\HomeController::class, 'managerMenu'])->name('home.managerMenu');
Route::get('/company', [App\Http\Controllers\HomeController::class, 'companyMenu'])->name('home.companyMenu');
Route::get('/employee', [App\Http\Controllers\HomeController::class, 'employeeMenu'])->name('home.employeeMenu');

Route::get('/index', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::post('/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('/selectEmp', [App\Http\Controllers\UserController::class, 'select'])->name('user.select');
Route::get('/select2delete', [App\Http\Controllers\UserController::class, 'select2delete'])->name('user.select2delete');
Route::post('/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

Route::get('/cindex', [App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');
Route::get('/createCompany', [App\Http\Controllers\CompanyController::class, 'create'])->name('company.create');
Route::post('/storeCompany', [App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');
Route::post('/editCompany', [App\Http\Controllers\CompanyController::class, 'edit'])->name('company.edit');
Route::post('/updateCompany', [App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');
Route::get('/selectCmp', [App\Http\Controllers\CompanyController::class, 'select'])->name('company.select');
Route::get('/select2deleteCmp', [App\Http\Controllers\CompanyController::class, 'select2deleteCmp'])->name('company.select2deleteCmp');
Route::post('/destroyCompany', [App\Http\Controllers\CompanyController::class, 'destroy'])->name('company.destroy');

Route::get('/manager', [App\Http\Controllers\ManagerController::class, 'addManager'])->name('manager.addManager');
Route::post('/add', [App\Http\Controllers\ManagerController::class, 'add'])->name('manager.add');
Route::get('/mindex', [App\Http\Controllers\ManagerController::class, 'index'])->name('manager.index');


