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

    /**
     * User Enrolment for new course(s)
     * 
     * @param EnrolCourseRequest $request
     * @return Illuminate\Http\JsonResponse
     */
    public function enrolCourse(EnrolCourseRequest $request)
    {
       $user = auth()->user();
       $courseIds = $request->ids;
       $user->courses()->attach($courseIds); 
       $getNewlyRegisterdCourse = collect($user->courses)->whereIn('id', $courseIds);
       return $this->apiResponse('Course Created Successfully', $getNewlyRegisterdCourse , StatusCode::OK);
    }

    /**
     * List of all courses
     * @return Illuminate\Http\JsonResponse
     */
    public function listOfAllCourses(){
        $courses = Course::with('users')->get();
        return $this->apiResponse('Courses Listed Successfully', $courses , StatusCode::OK);
    }
}