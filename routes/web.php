<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

// guest

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('/', [HomeController::class, 'showHome'])->name('home');
Route::get('showcar/{id}', [HomeController::class, 'showCar']);
Route::get('aboutus', [HomeController::class, 'aboutUs']);
Route::get('contact', [SendEmailController::class, 'contact']);
Route::get('reload-captcha', [SendEmailController::class, 'reloadCaptcha']);


// admin

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('showCars', [AdminController::class, 'showCars'])->name('showCars');
        Route::get('newcar', [AdminController::class, 'showNewCar']);
        Route::get('editcar/{id}', [AdminController::class, 'editCar']);

        Route::post('/newcar', [AdminController::class, 'createNewCar']);
        Route::post('/contact', [SendEmailController::class, 'sendEmail']);

        Route::put('updatecar/{id}', [AdminController::class, 'updateCar']);
        Route::put('updatestatus/{id}', [AdminController::class, 'updateStatus']);

        Route::get('deletecar/{id}', [AdminController::class, 'deleteCar']);
        Route::get('deleteallphotos/{id}', [AdminController::class, 'deleteAllPhotos']);
    });
});
