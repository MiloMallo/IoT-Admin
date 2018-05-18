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
Route::post('login', 'api\Auth\UserController@login');
Route::post('register', 'api\Auth\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('logout', 'api\Auth\UserController@logout');
    Route::post('gets', 'api\Auth\UserController@getDetails');
    Route::get('posts', 'api\Auth\UserController@index');

    // Users
    Route::get('me', 'api\Auth\UserController@me');
});

