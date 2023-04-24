<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Export\CoursesExport;
use App\Http\Controllers\Controller;

class ExportCourseController extends Controller
{
    public function exportCourses(){
        return (new CoursesExport)->download('course.csv');
    }
}
