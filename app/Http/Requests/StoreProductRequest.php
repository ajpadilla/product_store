<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreProductRequest extends Request
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
            'name' => 'required|max:50|unique:products,name', 
            'description' => 'required|max:256', 
            'quantity' => 'required|integer', 
            'price' => 'required|numeric', 
            'active' => 'required|boolean', 
            'mark' => 'required', 
            'classification_id' => 'required|exists:classifications,id', 
        ];
    }
}
