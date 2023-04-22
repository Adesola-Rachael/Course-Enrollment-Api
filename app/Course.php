<?php

namespace App;

use App\Enums\CourseCategoryEnum;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title', 'category', 'course_code', 'text',
    ];
}