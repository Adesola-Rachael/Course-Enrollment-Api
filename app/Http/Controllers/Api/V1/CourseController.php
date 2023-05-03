<?php

namespace App\Http\Controllers\Api\V1;

use App\Jobs\CourseCreateJob;
use App\Interfaces\StatusCode;
use App\Traits\ResponseTrait;
use App\Http\Controllers\Controller;

class CourseController extends Controller 
{
    use ResponseTrait;
  /**
   * Dispatche jobs to create courses
   * 
   * @return void
   */
    public function createCourse()
    {
        CourseCreateJob::dispatch(); 
        return $this->apiResponse('Courses Created Successfully', null , StatusCode::OK);
 
    }
}