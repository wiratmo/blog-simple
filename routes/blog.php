<?php

Route::get('/', 'BlogController@index');
Route::get('/user/{user}', 'BlogController@user');
Route::get('/user/{user}/{slug}', 'BlogController@slug');
Route::get('/category/{slug}', 'CategoryController@slug');
Route::get('/tag/{slug}', 'TagController@slug');
Route::get('/check', 'CategoryController@check');