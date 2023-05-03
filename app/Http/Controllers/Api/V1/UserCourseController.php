<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Course;
use App\Traits\ResponseTrait;
use App\Interfaces\StatusCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\EnrolCourseRequest;
use App\Http\Resources\EnrolCourseResource;

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
       $course_ids = $request->ids;
       $user->courses()->sync($course_ids); 
       $get_newly_registerd_course = collect($user->courses)->whereIn('id', $course_ids);
       return $this->apiResponse('Course Created Successfully', EnrolCourseResource::collection($get_newly_registerd_course) , StatusCode::OK);
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
        $response = [];
        foreach($courses as $course) {
           $enrolment_date = null; 
            foreach($course->users as $user) {
                $enrolment_date =  date_format($user->pivot->created_at, "Y-m-d H:i:s") ;
            }
            $response[] = [
                'course_title' => $course->title,
                'course_code' => $course->course_code,
                'date_enrolled' => $enrolment_date
            ];
        }
        return $response;
    }
}