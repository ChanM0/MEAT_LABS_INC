<?php

//Auth::routes();
//

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', 'Auth\RegisterController@register')->name('register');
Route::get('/login', 'Auth\LoginController@login')->name('login');

Route::post('/register', 'Auth\RegisterController@processPost')->name('register');


Route::get('/home', 'HomeController@index')->name('home');
