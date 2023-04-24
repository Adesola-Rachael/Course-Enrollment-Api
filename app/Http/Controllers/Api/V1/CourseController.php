<?php

namespace App\Http\Controllers\Api\V1;

use App\Jobs\CourseCreateJob;
use App\Http\Controllers\Controller;

class CourseController extends Controller 
{
    public function createCourse()
    {
        CourseCreateJob::dispatch();  
    }
}