<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            "name" => "required|max:150",
            "email" => "required|email|max:150|unique:users,email",
            "phone" => "nullable|max:20|unique:users,phone",
            "profile_image" => "nullable|mimes:png,jpg,jpeg",
            "password" => "required|max:60|confirmed"
        ];
    }
}
