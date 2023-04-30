<?php

namespace App\Http\Controllers\Api\V1;
use App\Export\CoursesExport;
use App\Http\Controllers\Controller;

class ExportCourseController extends Controller
{
    /**
     * Export all courses
     */
    public function exportCourses(){
        return (new CoursesExport)->download('course.csv');
    }
}