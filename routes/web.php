<?php
//USER STORIES
//a user can look at a boxer's cards
//a user can look at a card's ratings
//a user can see fights that happened on a card
//a user can add a boxer to the database
//a user can add a card to the database
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