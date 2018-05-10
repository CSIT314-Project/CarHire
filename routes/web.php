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
Route::get('search', 'SearchController@index');


Route::resource('cars', 'SearchController');
Route::resource('messages', 'MessageController');
Route::post('messages/{update}', 'MessageController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
