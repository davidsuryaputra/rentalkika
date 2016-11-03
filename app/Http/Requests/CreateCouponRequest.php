<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCouponRequest extends Request
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
    	if($this->fixedRadios == 0){
        return [
            'name' => 'required',
            'code' => 'required',
            'masaberlaku' => 'required',
            'fixedRadios' => 'required|numeric',
            'value' => 'required|numeric|min:1|max:100',
        ];
    	}
    	
    	return [
            'name' => 'required',
            'code' => 'required',
            'masaberlaku' => 'required',
            'fixedRadios' => 'required|numeric',
            'value' => 'required|numeric|min:10000',
        ];
    }
}
