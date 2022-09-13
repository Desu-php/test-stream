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


Route::get('/', 'BroadcastController@index')->name('home');

Route::group(['middleware' => ['auth'], 'controller' => 'BroadcastController'], function () {
    Route::group(['prefix' => 'create'], function () {
        Route::get('', 'create')->name('broadcasts.create');
        Route::post('', 'store')->name('broadcasts.store');
    });
});

require __DIR__ . '/auth.php';

Route::get('{broadcast}', 'BroadcastController@show')->name('broadcasts.show');

