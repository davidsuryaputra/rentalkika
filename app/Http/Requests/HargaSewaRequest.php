<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class HargaSewaRequest extends Request
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
            'zone_name' => 'required|numeric',
            'car_class' => 'required|numeric',
            'keterangan' => 'required',
            'value' => 'required|numeric'
        ];
    }
}
