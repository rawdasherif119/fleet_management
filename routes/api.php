<?php

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', 'AuthController@register')->name('api.register');
    Route::post('/login', 'AuthController@login')->name('api.login');
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'trips'], function () {
        Route::get('available', 'TripController@getAvailableTrips');
    });
    Route::group(['prefix' => 'reservations'], function () {
        Route::post('/', 'ReservationController@store');
    });
});
