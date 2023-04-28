<?php

namespace App\Models;

use App\Models\User;
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