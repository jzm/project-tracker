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

Route::get('/', 'MainController@index')->middleware('auth');

Route::get('login', 'AuthController@login')->name('login');
Route::post('login', 'AuthController@postLogin');

Route::get('register', 'AuthController@register')->middleware('guest')->name('register');
Route::post('register', 'AuthController@postRegister')->middleware('guest');

Route::get('auth/token/{token}', 'AuthController@authenticate');
