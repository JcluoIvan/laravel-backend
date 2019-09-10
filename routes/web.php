<?php

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
    return view('welcome');
});


Route::get('/cache', function () {

    $message = artisan('config:clear');
    return "<pre style='color: green'>{$message}</pre>";
});

Route::prefix('backend')
    ->namespace('Backend')
    ->group(function () {
        Route::get('/', 'HomeController@viewIndex');

        Route::get('/system-config', 'SystemConfigController@viewIndex');

        Route::get('/users', 'UsersController@viewIndex');
    });
