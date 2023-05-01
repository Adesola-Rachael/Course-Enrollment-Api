<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Course;
use App\Traits\ResponseTrait;
use App\Interfaces\StatusCode;
use App\Http\Controllers\Controller;
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
       $user->courses()->sync($courseIds); 
       $getNewlyRegisterdCourse = collect($user->courses)->whereIn('id', $courseIds);
       return $this->apiResponse('Course Created Successfully', $getNewlyRegisterdCourse , StatusCode::OK);
    }

    /**
    * List of all courses
    * @return Illuminate\Http\JsonResponse
    */
    public function listOfAllCourses()
    {
        $user = auth()->user();
        $courses = Course::with(['users' => function ($query) use ($user) {
        $query->where('users.id', $user->id);
        }])->get(); 
        return $this->apiResponse('Courses Listed Successfully', $this->getCourses($courses) , StatusCode::OK);
    }

    /**
    * get all courses
    *  @param $courses
    * @return array
    */
    public function getCourses($courses)
    {
        $getdata = [];
        foreach($courses as $course) {
            $data["course_title"] = $course->title;
            $data["course_code"] = $course->course_code;
            foreach($course->users ?? [] as $user){
                $data['date_enrolled'] = $user->pivot->created_at ?? null;
            }
            $getdata[] = $data;
        }
        return $getdata;
    }
}