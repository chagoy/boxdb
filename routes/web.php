<?php

Route::get('/', function () {
	$boxers = \App\Boxer::get();

	return view('welcome', compact('boxers'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/boxers', 'BoxerController@index');
Route::get('/boxers/add', 'BoxerController@create');
Route::post('/boxers/store', 'BoxerController@store');
Route::get('/boxers/{boxer}', 'BoxerController@show');

Route::get('/cards/add', 'CardController@create');
Route::post('/cards/store', 'CardController@store');
Route::get('/cards', 'CardController@index');
Route::get('/cards/{card}', 'CardController@show');

Route::get('/networks', 'NetworkController@index');
Route::get('/networks/{network}', 'NetworkController@show');

Route::post('/boxers/{boxer}/upload', 'UploadController@store');
Route::post('/cards/{card}/upload', 'UploadController@cardStore');

Route::get('/venues', 'VenueController@index');
Route::get('/venues/add', 'VenueController@create');
Route::post('/venues/store', 'VenueController@store');
Route::get('/venues/{venue}', 'VenueController@show');
