<?php

use Illuminate\Http\Request;

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function(){
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
});