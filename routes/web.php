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

// middleware('auth') will restrict access of that page to guests

Route::get('/', 'PageController@getIndex')->middleware('auth');
Route::get('dashboard', 'PageController@getDasboard')->middleware('auth');
Route::get('search', 'SearchController@index');		//get Search controller route
Route::get('garage', 'PageController@getGarage')->middleware('auth');
Route::get('settings', 'PageController@getSettings')->middleware('auth');



Route::resource('garage', 'addCarController'); 	// Controller route for adding new cars 
Route::resource('cars', 'SearchController');	// Controller route for searching cars


Auth::routes();

Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');	//route for redirecting user to login screen after logout
