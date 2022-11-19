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
    return view('auth.login');
});
Auth::routes();

// Route Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home/post', [App\Http\Controllers\HomeController::class, 'store'])->name('postPickup');
Route::delete('/home/delete/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('deletePickup');
Route::delete('/home/delete/multiple/{id}', [App\Http\Controllers\HomeController::class, 'deleteMultiple'])->name('deleteMultiple');
Route::get('/home/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('editPickup');
Route::get('/home/export', [App\Http\Controllers\HomeController::class, 'export'])->name('export');
Route::post('/home/import', [App\Http\Controllers\HomeController::class, 'import'])->name('import');
Route::post('/searchpickup', [App\Http\Controllers\HomeController::class, 'search'])->name('search-pickup');

// Route Report
Route::get('/report', [App\Http\Controllers\ReportController::class, 'index'])->name('report');
Route::get('/report/data', [App\Http\Controllers\ReportController::class, 'getReport'])->name('getReport');
Route::get('/report/show', [App\Http\Controllers\ReportController::class, 'show'])->name('show');

// Route Barang
Route::get('/barang', [App\Http\Controllers\BarangController::class, 'index'])->name('barang');
Route::post('/barang/post', [App\Http\Controllers\BarangController::class, 'create'])->name('createBarang');
Route::delete('/barang/hapus/{id}', [App\Http\Controllers\BarangController::class, 'delete'])->name('deleteBarang');

// Route Client
Route::get('/client', [App\Http\Controllers\ClientController::class, 'index'])->name('clients');
Route::post('/client/post', [App\Http\Controllers\ClientController::class, 'create'])->name('clientPost');
Route::delete('/client/hapus/{id}', [App\Http\Controllers\ClientController::class, 'delete'])->name('deleteClient');

// Route Driver
Route::get('/driver', [App\Http\Controllers\DriverController::class, 'index'])->name('driver');
Route::post('/driver/post', [App\Http\Controllers\DriverController::class, 'store'])->name('driverPost');
route::post('/searchdriver', [App\Http\Controllers\DriverController::class, 'search'])->name('searchDriver');
Route::delete('/driver/delete/{id}', [App\Http\Controllers\DriverController::class, 'destroy'])->name('driverDestroy');

// Route Users
Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');
Route::post('/users/post', [App\Http\Controllers\UsersController::class, 'store'])->name('userPost');
Route::delete('/users/delete/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('userDestroy');
