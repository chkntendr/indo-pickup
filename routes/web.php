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
    if (Session::has('auth')) {
        return redirect('/home');
    } else {
        return view('auth.login');
    }
});
Auth::routes();

// Route Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/edit/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('editPickup');
Route::put('/home/pickup/update/{id}', [App\Http\Controllers\HomeController::class, 'editSave'])->name('editSave');
Route::get('/home/kargo', [App\Http\Controllers\HomeController::class, 'getKargo'])->name('homeKargo');
Route::get('/home/dokumen', [App\Http\Controllers\HomeController::class, 'getDokumen'])->name('homeDokumen');
Route::get('/home/tujuan', [App\Http\Controllers\HomeController::class, 'getTujuan'])->name('homeTujuan');
Route::post('/home/post', [App\Http\Controllers\HomeController::class, 'store'])->name('postPickup');
Route::delete('/home/delete/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('deletePickup');
Route::get('/home/export', [App\Http\Controllers\HomeController::class, 'export'])->name('export');
Route::post('/home/import', [App\Http\Controllers\HomeController::class, 'import'])->name('import');

// Route Report
Route::get('/report', [App\Http\Controllers\ReportController::class, 'index'])->name('report');
Route::get('/report/show', [App\Http\Controllers\ReportController::class, 'show'])->name('show');
Route::get('/report/select2', [App\Http\Controllers\ReportController::class, 'select2'])->name('reportSelect');
Route::get('/create', [App\Http\Controllers\ReportController::class, 'create'])->name('createReport');
Route::get('/report/print', [App\Http\Controllers\ReportController::class, 'print'])->name('print');

// Route Barang
Route::get('/barang', [App\Http\Controllers\BarangController::class, 'index'])->name('barang');
Route::get('/barang/data', [App\Http\Controllers\BarangController::class, 'get'])->name('dataBarang');
Route::get('/barang/select2', [App\Http\Controllers\BarangController::class, 'select2'])->name('selectBarang');
Route::post('/barang/post', [App\Http\Controllers\BarangController::class, 'create'])->name('createBarang');
Route::delete('/barang/delete/{id}', [App\Http\Controllers\BarangController::class, 'delete'])->name('deleteBarang');

// Route Manifest
Route::get('/manifest/store', [App\Http\Controllers\ManifestController::class, 'store'])->name('manifest');
Route::get('/manifest/data', [App\Http\Controllers\ManifestController::class, 'show'])->name('manifestData');
Route::post('/manifest/upload/{id}', [App\Http\Controllers\ManifestController::class, 'upload'])->name('importManifest');

// Route Client
Route::get('/client', [App\Http\Controllers\ClientController::class, 'index'])->name('clients');
Route::get('/client/data', [App\Http\Controllers\ClientController::class, 'get'])->name('dataClient');
Route::get('/client/select2', [App\Http\Controllers\ClientController::class, 'select2'])->name('selectClient');
Route::post('/client/post', [App\Http\Controllers\ClientController::class, 'create'])->name('clientPost');
Route::delete('/client/delete/{id}', [App\Http\Controllers\ClientController::class, 'delete'])->name('deleteClient');

// Route Driver
Route::get('/driver', [App\Http\Controllers\DriverController::class, 'index'])->name('driver');
Route::get('/driver/data', [App\Http\Controllers\DriverController::class, 'get'])->name('dataDriver');
Route::get('/driver/select2', [App\Http\Controllers\DriverController::class, 'select2'])->name('selectDriver');
Route::post('/driver/post', [App\Http\Controllers\DriverController::class, 'store'])->name('driverPost');
Route::delete('/driver/delete/{id}', [App\Http\Controllers\DriverController::class, 'destroy'])->name('driverDestroy');

// Route Users
Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');
Route::get('/users/data', [App\Http\Controllers\UsersController::class, 'get'])->name('dataUsers');
Route::post('/users/post', [App\Http\Controllers\UsersController::class, 'store'])->name('userPost');
Route::delete('/users/delete/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('userDestroy');
