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

Route::group(['prefix' => 'kontens'], function(){
    Route::get('/{limit}/limit', 'KontenController@index');
});

Route::group(['prefix' => 'akuns'], function(){
    Route::get('/{email}/email', 'AkunController@getAkun');
    Route::get('/{limit}/limit', 'AkunController@index');
});