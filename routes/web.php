<?php
Auth::routes();

Route::get('/', function () {
	return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mainForum', 'PostController@mainForum')->name('forum');

Route::get('/profile/{email}', 'UserController@profile')->name('profile');
Route::get('/username/{id}', 'UserController@usernameEdit')->name('username.edit');
Route::get('/username', 'UserController@usernameUpdate')->name('username.update');


// Route::group(['prefix'=>'comment'],function () {
Route::group(['prefix'=>'comment', 'middleware' => 'auth'],function () {
	// Route::get('/','CommentController@all')->middleware('auth');
	Route::post('/','CommentController@store')->name('comment.store');
	Route::get('/{id}', 'CommentController@edit')->name('comment.edit');
	Route::post('/{id}', 'CommentController@delete')->name('comment.delete');
	Route::get('update/{id}', 'CommentController@update')->name('comment.update');
});

Route::group(['prefix'=>'post', 'middleware' => 'auth'],function () {
	Route::post('/','PostController@store')->name('post.store');
	Route::get('/{id}', 'PostController@edit')->name('post.edit');
	Route::post('/{id}', 'PostController@delete')->name('post.delete');
	Route::get('/', 'PostController@update')->name('post.update2');
});

Route::group(['prefix'=>'biography', 'middleware' => 'auth'],function () {
	Route::post('/','UserBiographyController@store')->name('biography.store');
	Route::get('/{id}', 'UserBiographyController@edit')->name('biography.edit');
	Route::post('/{id}', 'UserBiographyController@delete')->name('biography.delete');
	Route::get('/', 'UserBiographyController@update')->name('biography.update');
});


