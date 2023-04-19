<?php

use Illuminate\Http\Request;
use App\Http\Controllers\V1\ApiAuthController;



Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'], function($router){
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
   
});