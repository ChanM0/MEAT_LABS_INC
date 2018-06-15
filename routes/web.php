<?php
Auth::routes();

Route::get('/', function () {
	return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/{email}', 'UserController@profile')->name('profile');

// Route::get('/profile/{email}', 'UserController@profile')->name('profile');


