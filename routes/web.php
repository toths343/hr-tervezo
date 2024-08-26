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
    'middleware' => [],
], function () {
    Route::controller(Home::class)->group(function () {
        Route::get('/', 'index');
    });

    Route::controller(Login::class)->group(function () {
        Route::get('/login', 'index');
        Route::get('/logout', 'logout')->name('logout');
        Route::post('/login', 'login')->name('login');
    });

    Route::controller(Partner::class)->group(function () {
        Route::get('/partners', 'index')->name('partner.index');;
    });

});
