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

// RUTAS GET
Route::get('/', [App\Http\Controllers\HomeController::class, 'showHome'])->name('home');
Route::get('/showcar/{id}', [App\Http\Controllers\HomeController::class, 'showCar']);
Auth::routes(['register' => false]);
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'showCars']);
Route::get('/newcar', [App\Http\Controllers\AdminController::class, 'showNewCar']);
Route::get('editcar/{id}', [App\Http\Controllers\AdminController::class, 'editCar']);
Route::get('/aboutus', [App\Http\Controllers\HomeController::class, 'aboutUs']);
Route::get('/contact', [App\Http\Controllers\SendEmailController::class, 'contact']);
Route::get('reload-captcha', [App\Http\Controllers\SendEmailController::class, 'reloadCaptcha']);

// RUTAS POST
Route::post('/newcar', [App\Http\Controllers\AdminController::class, 'createNewCar']);
Route::post('/contact', [App\Http\Controllers\SendEmailController::class, 'sendEmail']);

// RUTAS PUT
Route::put('updatecar/{id}', [App\Http\Controllers\AdminController::class, 'updateCar']);
Route::put('updatestatus/{id}', [App\Http\Controllers\AdminController::class, 'updateStatus']);

// RUTAS DELETE
Route::get('deletecar/{id}', [App\Http\Controllers\AdminController::class, 'deleteCar']);
Route::get('deleteallphotos/{id}', [App\Http\Controllers\AdminController::class, 'deleteAllPhotos']);
