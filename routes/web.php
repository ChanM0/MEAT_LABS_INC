<?php
Auth::routes();

Route::get('/', function () {
	return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mainForum', 'PostController@mainForum')->name('forum');
Route::get('/profile/{email}', 'UserController@profile')->name('profile');

Route::resource('/comment','CommentController');
Route::post('/comment/{id}', 'CommentController@delete')->name('comment.delete');
Route::get('/comment', 'CommentController@update')->name('comment.update');

Route::resource('/post','PostController');
Route::post('/post/{id}', 'PostController@delete')->name('post.delete');
Route::get('/post', 'PostController@update')->name('post.update');

Route::resource('/biography','UserBiographyController');
Route::post('/biography/{id}', 'UserBiographyController@delete')->name('bio.delete');
Route::get('/biography', 'UserBiographyController@update')->name('bio.update');

// Route::get('/profile/{email}', 'UserController@profile')->name('profile');


