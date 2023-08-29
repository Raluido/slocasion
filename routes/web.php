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
Route::post('contact', [SendEmailController::class, 'sendEmail']);
Route::get('reload-captcha', [SendEmailController::class, 'reloadCaptcha']);


// admin

Route::group(['middleware' => ['auth']], function () {
    Route::get('logout', [LogoutController::class, 'logout'])->name('logout');

    Route::get('editcar/{id}', [AdminController::class, 'editCar']);
    Route::put('updatecar/{id}', [AdminController::class, 'updateCar']);

    Route::get('newcar', [AdminController::class, 'showNewCar']);
    Route::post('/newcar', [AdminController::class, 'createNewCar']);

    Route::put('updatestatus/{id}', [AdminController::class, 'updateStatus']);

    Route::get('deletecar/{id}', [AdminController::class, 'deleteCar'])->name('deleteCar');
    Route::get('deleteimg/{id}', [AdminController::class, 'deleteImg'])->name('deleteImg');
    Route::get('deleteimgmain/{id}', [AdminController::class, 'deleteImgMain'])->name('deleteImgMain');
});
