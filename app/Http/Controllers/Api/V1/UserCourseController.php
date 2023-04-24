<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Course;
use App\Traits\ResponseTrait;
use App\Interfaces\StatusCode;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Http\Requests\EnrolCourseRequest;

class UserCourseController extends Controller
{
    use ResponseTrait;
    public function enrolCourse(EnrolCourseRequest $request)
    {
       $user = auth()->user();
       $roleIds = $request->ids;
       $createUserCourse = $user->courses()->attach($roleIds); 
       $getAllUserCourse = $user->courses;
       $retrieveAllNewlyRegisteredCourse = collect($getAllUserCourse);
       $getNewlyRegisterdCourse = $retrieveAllNewlyRegisteredCourse->whereIn('id', $roleIds);
       $newCoursesRegistered = $getNewlyRegisterdCourse;
       return $this->apiResponse('Course Created Successfully',$newCoursesRegistered , StatusCode::CREATED);
    }
    public function listOfAllCourses(){
        $courses = Course::with('users')->get()->toArray();
        return $this->apiResponse('Courses Listed Successfully',$courses , StatusCode::OK);
    }
}
