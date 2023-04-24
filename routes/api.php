<?php

use Illuminate\Http\Request;

Route::group(['middleware' => 'api', 'prefix' => 'project'], function(){
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login')->name('login');
    Route::group(['middleware' => 'auth:api','prefix'=>'courses'],function (){
        Route::get('create', 'CourseController@createCourse')->name('create');
        Route::post('enrol', 'UserCourseController@enrolCourse');
        Route::get('list', 'UserCourseController@listOfAllCourses');
    });
});

