<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CarRequest extends Request
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
            'brand_name' => 'required|numeric',
            'class_name' => 'required|numeric',
            'car_name' => 'required|unique:cars,name,'.$this->id,
        ];
    }
}