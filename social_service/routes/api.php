<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1/users')->namespace('App\Http\Controllers\Api')->group(function(){
    Route::post('/login','UserController@login')->name('login');
    Route::get('','UserController@getAllUsers')->name('getAllUsers');
    Route::post('','UserController@createUser')->name('createUser');
    Route::put('{id}','UserController@updateUser')->name('updateUser');
});
