<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreatePricingRentcarRequest extends Request
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
            'short_time' => 'required|numeric|min:10000',
            'normal_time' => 'required|numeric|min:10000',
            'out_of_town' => 'required|numeric|min:1000',
            'overtime' => 'required|numeric|min:10000',
            'driver' => 'required|numeric|min:1000',
        ];
    }
}
