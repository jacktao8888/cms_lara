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

use \Illuminate\Http\Request;

Route::group(['prefix' => 'admin'], function () {

//    Route::get('/{name}/{num?}', function ($name = 'a') {
//        return view('welcome');
//    })->where('name', '[A-Za-z]+');

    Route::get('register', function () {
        return view('register', ['name' => 'dear visitor']);
    });

    Route::post('register', 'Auth\RegisterController@store');

//    Route::get('login', function () {
//        return view('login', ['name' => 'dear member']);
//    });

    Route::get('login', 'Auth\LoginController@show');

    Route::post('login', 'Auth\LoginController@confirm');

    Route::get('index', function () {
        return view('index');
    });
});

//Route::get('hello/world', 'HelloController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
