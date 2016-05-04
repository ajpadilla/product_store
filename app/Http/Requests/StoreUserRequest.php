<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreUserRequest extends Request
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
            'first_name' => 'required|min:3|max:60',
            'last_name' => 'required|min:3|max:60',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username|max:50',
            'password' => 'required|min:6|max:60|confirmed',
            'password_confirmation' => 'required|min:6|max:60',
            'photo' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ];
    }
}
