<?php

Route::get('/', 'Auth\Blog\AdminController@index');

Route::group(['prefix'=> 'blog'], function(){
	Route::get('/', 'Auth\Blog\BlogController@index')->name('manage.blog.dashboard');
	Route::get('/add', 'Auth\Blog\BlogController@create')->name('manage.blog.create');
	Route::post('/add', 'Auth\Blog\BlogController@store')->name('manage.blog.store');
	Route::get('/{id}', 'Auth\Blog\BlogController@edit')->name('manage.blog.edit');
	Route::post('/{id}', 'Auth\Blog\BlogController@update')->name('manage.blog.update');
	Route::delete('/{id}', 'Auth\Blog\BlogController@delete')->name('manage.blog.delete');
});

Route::group(['prefix'=>'tag'], function(){
	Route::get('/', 'Auth\Blog\TagController@index')->name('manage.tag.dashboard');
	Route::get('/add', 'Auth\Blog\TagController@create')->name('manage.tag.create');
	Route::post('/add', 'Auth\Blog\TagController@store')->name('manage.tag.store');
	Route::get('/{id}', 'Auth\Blog\TagController@edit')->name('manage.tag.edit');
	Route::post('/{id}', 'Auth\Blog\TagController@update')->name('manage.tag.update');
	Route::delete('/{id}', 'Auth\Blog\TagController@delete')->name('manage.tag.delete');
});

Route::group(['prefix'=>'category'], function(){
	Route::get('/', 'Auth\Blog\CategoryController@index')->name('manage.category.dashboard');
	Route::get('/add', 'Auth\Blog\CategoryController@create')->name('manage.category.create');
	Route::post('/add', 'Auth\Blog\CategoryController@store')->name('manage.category.store');
	Route::get('/{id}', 'Auth\Blog\CategoryController@edit')->name('manage.category.edit');
	Route::post('/{id}', 'Auth\Blog\CategoryController@update')->name('manage.category.update');
	Route::delete('/{id}', 'Auth\Blog\CategoryController@delete')->name('manage.category.delete');
});