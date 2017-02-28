<?php

Auth::routes();
Route::get('/', 'DashboardController@index');
Route::get('home', 'HomeController@index');
Route::post('pesan', 'DashboardController@postPesan');
Route::post('upload', 'UploadImageController@upload');
Route::get('coba1/coba/coba', function(){
	return view('dashboard');
});
/*Route::get('log', function(){
	Auth::logout();
});*/