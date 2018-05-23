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


Route::get('/', 'PageController@getIndex');
Route::get('register', 'PageController@getRegister');
Route::get('login', 'PageController@getLogin');
Route::get('dashboard', 'PageController@getDasboard');
Route::get('sorry', 'PageController@getSorry')->name('sorry');
Route::get('sorryCredit', 'PageController@getSorryCredit')->name('sorry');
Route::get('sorryIdentity', 'PageController@getSorryIdentity')->name('sorry');


Route::get('search', 'SearchController@index');
//Route::get('garage', 'PageController@getGarage')->middleware('auth');
Route::get('settings', 'PageController@getSettings')->middleware('auth');

Route::resource('settings', 'SettingsController');
Route::post('settings/{update}', 'SettingsController@update');
Route::resource('garage', 'addCarController'); 	// Controller route for adding new cars 
Route::post('garage/{update}', 'addCarController@update'); 
//Route::post('garage', 'addCarController@destroy'); 	// Controller route for adding new cars 

Route::resource('cars', 'SearchController');
Route::resource('messages', 'MessageController');
Route::resource('transactions', 'TransactionsController');
Route::post('transactions/{update}', 'TransactionsController@update');

Route::post('messages/{update}', 'MessageController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
