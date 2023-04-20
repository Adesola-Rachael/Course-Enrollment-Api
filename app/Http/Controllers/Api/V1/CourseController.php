<?php

namespace App\Http\Controllers\Api\V1;


use Exception;
use App\Course;
use App\Enums\AbstractEnum;
use App\Jobs\CourseCreateJob;
use App\Interfaces\StatusCode;
use App\Enums\CourseCategoryEnum;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Services\CreateCourseService;


class CourseController extends Controller 
{
    public function createCourse(){
        try {  
           if( !CourseCreateJob::dispatch()){
            return $this->apiResponse('Something Went Wrong',null, StatusCode::BAD_REQUEST);
           } 
        }catch (Exception $e) {                
            throw new Exception($e->getMessage()); 
        }
    }
}