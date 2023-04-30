<?php

namespace App\Http\Controllers\Api\V1;

use App\Jobs\CourseCreateJob;
use App\Http\Controllers\Controller;

class CourseController extends Controller 
{
  /**
   * Dispatche jobs to create courses
   * 
   * @return void
   */
    public function createCourse()
    {
        CourseCreateJob::dispatch();  
    }
}