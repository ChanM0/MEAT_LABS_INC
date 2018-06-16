<?php
Auth::routes();

Route::get('/', function () {
	return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/mainForum', 'PostController@mainForum')->name('forum');
Route::get('/profile/{email}', 'UserController@profile')->name('profile');
Route::resource('/comment','CommentController');
Route::resource('/post','PostController');


Route::resource('/biography','UserBiographyController');
Route::post('/biography/{id}', 'UserBiographyController@delete')->name('delete');
Route::get('/biography', 'UserBiographyController@update')->name('update');

// Route::get('/profile/{email}', 'UserController@profile')->name('profile');


