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

Route::prefix('v1/users')->namespace('App\Http\Controllers\Api')->group(function () {

    Route::post('/login', 'UserController@login')->name('login');
    Route::post('', 'UserController@registerUser')->name('registerUser');

    Route::group(['middleware' => ['auth:api']], function () {
        Route::put('perfil', 'UserController@updatePerfilUser')->name('updatePerfilUser');
    });
});
