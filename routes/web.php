<?php
Auth::routes();

Route::get('/', function () {
	return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{email}', 'UserController@profile')->name('profile');

Route::resource('/comment','CommentController');
Route::resource('/post','PostController');
Route::resource('/bio','UserBiographyController');


Route::post('/bio/{id}', 'UserBiographyController@delete')->name('destroy');

// Route::get('/profile/{email}', 'UserController@profile')->name('profile');


