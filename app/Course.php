<?php

namespace App;

use App\User;
use App\Enums\CourseCategoryEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    protected $fillable = [
        'title', 'category', 'course_code', 'text',
    ];

    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_course')->withPivot('created_at');
    }
}