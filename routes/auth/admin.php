<?php

Route::get('/', 'Auth\Admin\DashboardController@home')->name('manage.dashboard');
Route::get('/home', 'Auth\Admin\DashboardController@home');
Route::get('/home/{sectore}', 'Auth\Admin\DashboardController@editsector')->name('manage.dashboard.sector');
Route::post('/home/{sectore}', 'Auth\Admin\DashboardController@updatesector')->name('manage.dashboard.sector.update');

Route::group(['prefix'=> 'services'], function(){
	Route::get('/', 'Auth\Admin\DashboardController@services')->name('manage.service');
	Route::get('{category}', 'Auth\Admin\DashboardController@create')->name('manage.service.create');
	Route::post('{category}', 'Auth\Admin\DashboardController@store')->name('manage.service.store');
	Route::get('{category}/{id}', 'Auth\Admin\DashboardController@edit')->name('manage.service.edit');
	Route::post('{category}/{id}', 'Auth\Admin\DashboardController@update')->name('manage.service.update');
	Route::delete('{id}', 'Auth\Admin\DashboardController@delete')->name('manage.service.delete');
});