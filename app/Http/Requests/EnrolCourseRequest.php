<?php

namespace App\Http\Requests;

use App\Rules\EnrolCourseRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EnrolCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // course_id
            'courses' => 'required|array',
            'courses.*' => 'exists:courses,id'
        ];
    }
}