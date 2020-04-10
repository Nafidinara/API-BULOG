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

Route::prefix('v1')->group(function (){
    Route::post('create','BulogController@store');
    Route::get('data','BulogController@index');
    Route::post('update/{bulog_id}','BulogController@update');
    Route::delete('delete/{bulog_id}','BulogController@destroy');
});
