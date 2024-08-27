<?php

use App\Http\Controllers\Home;
use App\Http\Controllers\Login;
use App\Http\Controllers\Partner;
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
    Route::controller(Home::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/changeDate', 'changeDate')->name('changeDate');
    });

    Route::controller(Login::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });

    Route::controller(Partner::class)->group(function () {
        Route::get('/partners', 'index')->name('partner.index');;
    });

});

Route::controller(Login::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login')->name('doLogin');
});
