<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UserAuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ];
    }

    public function messages()
    {
        return [
        ];
    }
}
