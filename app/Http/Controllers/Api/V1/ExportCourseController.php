<?php

namespace App\Http\Controllers\Api\V1;
use App\Export\CoursesExport;
use App\Http\Controllers\Controller;

class ExportCourseController extends Controller
{
    public function exportCourses(){
        return (new CoursesExport)->download('course.csv');
    }
}