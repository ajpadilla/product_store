<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditUserRequest extends Request
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
            'first_name' => 'required|max:60',
            'last_name' => 'required|max:60',
            'username' => 'required|max:50|unique:users,username,'.auth()->user()->id,
            'email' => 'required|email|unique:users,email,'.auth()->user()->id,
            'address' => 'required|max:255',
            'post_code' => 'required|max:5',
            'phone' => 'required',
            'country_id' => 'required|exists:countries,id',
            'photo' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ];
    }
}
