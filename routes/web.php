<?php

Auth::routes();
Route::get('/', 'DashboardController@index');
Route::get('home', 'HomeController@index');
Route::post('pesan', 'DashboardController@postPesan');