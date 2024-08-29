<?php

use App\Http\Controllers\EntityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PartnerController;
use Illuminate\Support\Facades\Route;

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

Route::group([
    'middleware' => ['auth'],
], function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home.index');
        Route::post('/changeDate', 'changeDate')->name('changeDate');
    });

    Route::controller(LoginController::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });

    Route::controller(PartnerController::class)->group(function () {
        Route::get('/partners', 'index')->name('partner.index');
        Route::get('/partners/{id}', 'detail')->name('partner.detail');
    });

    Route::controller(EntityController::class)->group(function () {
        Route::get('/entity/{type}/{id}', 'index')->name('entity.index');
    });
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login')->name('doLogin');
});
