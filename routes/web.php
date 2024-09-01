<?php

use App\Http\Controllers\EntityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjektController;
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

    Route::controller(EntityController::class)->group(function () {
        Route::get('/entity/{type}', 'list')->name('entity.list');
        Route::get('/entity/{type}/{id}', 'index')->name('entity.index');

        Route::get('/entity/modal/edit/{type}/{uid?}', 'editModal')->name('entity.editModal');
        Route::get('/entity/modal/merge/{type}/{id}', 'mergeModal')->name('entity.mergeModal');
        Route::get('/entity/modal/borderdate/{type}/{id}', 'borderdateModal')->name('entity.borderdateModal');
        Route::get('/entity/modal/delete/{type}/{uid}', 'deleteModal')->name('entity.deleteModal');

        Route::post('/entity/save/merge/{type}/{id}', 'mergeSave')->name('entity.mergeSave');
        Route::post('/entity/save/borderdate/{type}/{id}', 'borderdateSave')->name('entity.borderdateSave');
        Route::post('/entity/save/delete/{type}/{uid}', 'deleteSave')->name('entity.deleteSave');
    });

    Route::controller(PartnerController::class)->group(function () {
        Route::post('/partner/save/{uid?}', 'save')->name('partner.save');
    });

    Route::controller(ProjektController::class)->group(function () {
        Route::post('/projekt/save/{uid?}', 'save')->name('projekt.save');
    });

});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login')->name('doLogin');
});
