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

// Route Barang
Route::get('/barang', [App\Http\Controllers\BarangController::class, 'index'])->name('barang');
Route::get('/barang/add', [App\Http\Controllers\BarangController::class, 'new_form'])->name('formBarang');
Route::post('/barang/post', [App\Http\Controllers\BarangController::class, 'create'])->name('createBarang');
Route::delete('/barang/hapus/{id}', [App\Http\Controllers\BarangController::class, 'delete'])->name('deleteBarang');

// Route Client
Route::get('/client', [App\Http\Controllers\ClientController::class, 'index'])->name('client');
Route::get('/client/add', [App\Http\Controllers\ClientController::class, 'new_form'])->name('formClient');
Route::post('/client/post', [App\Http\Controllers\ClientController::class, 'create'])->name('createClient');

// Route Driver
Route::get('/driver', [App\Http\Controllers\DriverController::class, 'index'])->name('driver');
