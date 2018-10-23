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

Route::get('/', 'HomeController@getHome');

Route::group(['middleware' => 'auth'], function() {
	Route::get('catalog', 'CatalogController@getIndex');

	Route::get('catalog/show/{id}', 'CatalogController@getShow');

	Route::put('catalog/rent/{id}', 'CatalogController@putRent');

	Route::put('catalog/return/{id}', 'CatalogController@putReturn');

	Route::delete('catalog/delete/{id}', 'CatalogController@deleteMovie');

	Route::get('catalog/create', 'CatalogController@getCreate');

	Route::post('catalog/create', 'CatalogController@postCreate');

	Route::get('catalog/edit/{id}', 'CatalogController@getEdit');

	Route::put('catalog/edit/{id}', 'CatalogController@putEdit');
});

Auth::routes();
