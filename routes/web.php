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
# Auth Routes
Auth::routes();


# Front Routes
Route::get('/', 'FrontEndController@index')->name('index');
Route::get('/search', 'FrontEndController@search')->name('search');
Route::post('/subscribe', 'SendMailController@subscribe')->name('subscribe');
Route::get('/sendmail','SendMailController@myTestMail');

Route::get('/{slug}', 'FrontEndController@singlePost')->name('post.single');
Route::get('/category/{id}', 'FrontEndController@singleCategory')->name('category.single');
Route::get('/tag/{id}', 'FrontEndController@singleTag')->name('tag.single');


# Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	
	# Dashboard Routes
	Route::get('/home', 'HomeController@index')->name('home');

	# Post Routes
	Route::get('/posts', 'PostsController@index')->name('posts');
	Route::get('/post/create', 'PostsController@create')->name('post.create');
	Route::post('/post/store', 'PostsController@store')->name('post.store');
	Route::get('/post/edit/{id}', 'PostsController@edit')->name('post.edit');
	Route::post('/post/update/{id}', 'PostsController@update')->name('post.update');
	Route::get('/post/delete/{id}', 'PostsController@destroy')->name('post.delete');
	Route::get('/post/trashed', 'PostsController@trashed')->name('post.trashed');
	Route::get('/post/force/{id}', 'PostsController@force')->name('post.force');
	Route::get('/post/restore/{id}', 'PostsController@restore')->name('post.restore');

	# Categroy Routes
	Route::get('/categories', 'CategroiesController@index')->name('categories');
	Route::get('/category/create', 'CategroiesController@create')->name('category.create');
	Route::post('/category/store', 'CategroiesController@store')->name('category.store');
	Route::get('/category/edit/{id}', 'CategroiesController@edit')->name('category.edit');
	Route::post('/category/update/{id}', 'CategroiesController@update')->name('category.update');
	Route::get('/category/delete/{id}', 'CategroiesController@destroy')->name('category.delete');

	# Tag Routes
	Route::get('/tags', 'TagsController@index')->name('tags');
	Route::get('/tag/create', 'TagsController@create')->name('tag.create');
	Route::post('/tag/store', 'TagsController@store')->name('tag.store');
	Route::get('/tag/edit/{id}', 'TagsController@edit')->name('tag.edit');
	Route::post('/tag/update/{id}', 'TagsController@update')->name('tag.update');
	Route::get('/tag/delete/{id}', 'TagsController@destroy')->name('tag.delete');

	# User Routes
	Route::get('/users', 'UsersController@index')->name('users');
	Route::get('/user/create', 'UsersController@create')->name('user.create');
	Route::post('/user/store', 'UsersController@store')->name('user.store');
	Route::get('/user/delete/{id}', 'UsersController@destroy')->name('user.delete');
	Route::get('/user/trashed', 'UsersController@trashed')->name('user.trashed');
	Route::get('/user/force/{id}', 'UsersController@force')->name('user.force');
	Route::get('/user/restore/{id}', 'UsersController@restore')->name('user.restore');
	Route::get('/user/admin/{id}', 'UsersController@admin')
					->name('user.admin')->middleware('admin');
	Route::get('/user/not_admin/{id}', 'UsersController@notAdmin')->name('user.not_admin');

	# User Profile Routes
	Route::get('/profile/{id}', 'ProfilesController@index')->name('profile');
	Route::get('/profile/edit/{id}', 'ProfilesController@edit')->name('profile.edit');
	Route::post('/profile/update/{id}', 'ProfilesController@update')->name('profile.update');
	Route::post('/profile/avatar/{id}', 'ProfilesController@avatar')->name('profile.avatar');
	Route::post('/profile/password/{id}', 'ProfilesController@password')->name('profile.password');

	# Settings Routes
	Route::get('/settings', 'SettingsController@index')->name('settings');
	Route::post('/settings/update', 'SettingsController@update')->name('settings.update');

});
