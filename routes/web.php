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
