<?php
Auth::routes();

Route::get('/', function () {

	return view('welcome');

});

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix'=>'user', 'middleware' => 'auth'],function () {

	Route::get('profile/{email}', 'UserController@profile')->name('profile');

	Route::get('allProfiles', 'UserController@showAll')->name('profile.showAll');

	Route::get('username/{id}', 'UserController@usernameEdit')->name('username.edit');

	Route::get('username/update/{id}', 'UserController@usernameUpdate')->name('username.update');

	Route::get('delete/{id}', 'UserController@delete')->name('user.delete');

	Route::post('admin/{id}', 'UserController@makeAdmin')->name('user.makeAdmin');

	Route::post('{id}', 'UserController@removeAdmin')->name('user.removeAdmin');

});

Route::group(['prefix'=>'comment', 'middleware' => 'auth'],function () {

	Route::get('store/{id}','CommentController@store')->name('comment.store');

	Route::get('/{id}', 'CommentController@edit')->name('comment.edit');

	Route::get('delete/{id}', 'CommentController@delete')->name('comment.delete');

	Route::get('update/{id}', 'CommentController@update')->name('comment.update');

});

Route::group(['prefix'=>'post', 'middleware' => 'auth'],function () {

	Route::get('/store/{id}','PostController@store')->name('post.store');

	Route::get('/{id}', 'PostController@edit')->name('post.edit');

	Route::get('delete/{id}', 'PostController@delete')->name('post.delete');

	Route::get('/update/{id}', 'PostController@update')->name('post.update');

});

Route::group(['prefix'=>'biography', 'middleware' => 'auth'],function () {

	Route::post('/','UserBiographyController@store')->name('biography.store');

	Route::get('/{id}', 'UserBiographyController@edit')->name('biography.edit');

	Route::post('/{id}', 'UserBiographyController@delete')->name('biography.delete');

	Route::get('/update/{id}', 'UserBiographyController@update')->name('biography.update');

});


