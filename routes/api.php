<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/v1/catalog', 'APICatalogController',
				['only' => ['index', 'show']]);

Route::resource('/v1/catalog', 'APICatalogController',
				['only' => ['store', 'update', 'destroy']])->middleware('auth.basic');

Route::group(['middleware' => 'auth.basic'], function() {
	Route::put('/v1/catalog/{id}/rent', 'APICatalogController@putRent');
	Route::put('/v1/catalog/{id}/return', 'APICatalogController@putReturn');
});
