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
Route::middleware('auth:api')->get('/user', 'UserController@AuthRouteAPI');

Route::get('home', 'ApiController@getHome');
// Route::get('home', 'App\Http\Controllers\ApiController@getHome');
// Route::get('home', 'App\Http\Controllers\ApiController@getHome');
// Route::get('home', 'App\Http\Controllers\ApiController@getHome');
 