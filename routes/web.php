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

Route::get('/index', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');

Route::get('/manager', [App\Http\Controllers\ManagerController::class, 'addManager'])->name('manager.addManager');
Route::post('/add', [App\Http\Controllers\ManagerController::class, 'add'])->name('manager.add');
Route::get('/mindex', [App\Http\Controllers\ManagerController::class, 'index'])->name('manager.index');

Route::get('/cindex', [App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');
Route::get('/createCompany', [App\Http\Controllers\CompanyController::class, 'create'])->name('company.create');
Route::post('/storeCompany', [App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');
