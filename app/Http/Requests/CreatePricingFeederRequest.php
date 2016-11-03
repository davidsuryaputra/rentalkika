<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreatePricingFeederRequest extends Request
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
            'dari_kota' => 'required|numeric',
            'ke_kota' => 'required|numeric',
            'tarif' => 'required|numeric|min:3000',
        ];
    }
}
