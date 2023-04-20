<?php

use Illuminate\Http\Request;

Route::group(['middleware' => 'api', 'prefix' => 'project'], function(){
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::group(['middleware' => 'customAuth','prefix'=>'courses'],function (){
        Route::get('create', 'CourseController@createCourse');

    });
});

Route::get('test', 'CourseController@Crea');
