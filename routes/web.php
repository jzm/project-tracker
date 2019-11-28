<?php

Route::get('/', 'MainController@index')->middleware('activated');
Route::get('/projects', 'ProjectController@index')->middleware('activated');

Route::get('login', 'AuthController@login')->name('login');
Route::post('logout', 'AuthController@logout')->name('logout');
Route::post('login', 'AuthController@postLogin');

Route::get('register', 'AuthController@register')->middleware('guest')->name('register');
Route::post('register', 'AuthController@postRegister')->middleware('guest');


Route::get('not-activated', 'AuthController@notActivated');

Route::get('auth/token/{token}', 'AuthController@authenticate');
