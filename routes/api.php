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
    Route::get('/{id}/konten', 'KontenController@getKonten');
});

Route::group(['prefix' => 'akuns'], function(){
    Route::get('/{email}/email', 'AkunController@getAkun');
    Route::get('/{limit}/limit', 'AkunController@index');
});

Route::group(['prefix' => 'pesans'], function(){
    Route::get('/kode', 'PesanController@getKodeBook');
    Route::get('/{userid}/user/{stat}/status', 'PesanController@getPesanByKdBookAndStatus');
    Route::post('/{userid}/user', 'PesanController@tambah');
    Route::post('/{kdbook}/booking/{userid}/user/{total}/set', 'PesanController@setTotal');
});

Route::group(['prefix' => 'carts'], function(){
    Route::get('/{kdbook}/kode', 'CartController@getCart');
    Route::get('/{kdbook}/booking/{userid}/user/total', 'CartController@getTotal');
    Route::get('/{kdbook}/booking/{userid}/user/{limit}/limit', 'CartController@getCartKontenByUserKdBook');
    Route::get('/{kdbook}/booking/{userid}/user/{kontenid}/konten', 'CartController@cekCart');
    Route::post('/{kdbook}/booking/{userid}/user/{kontenid}/konten', 'CartController@tambah');
    Route::delete('/{kdbook}/booking/{userid}/user/{kontenid}/konten', 'CartController@hapus');
});