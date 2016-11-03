<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateAdminRequest extends Request
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
            'full_name' => 'required',
            'email' => 'required|unique:users,email,'.$this->id,
            'phone' => 'required|numeric|digits_between:6,15',
            'password' => 'required|confirmed|min:6',
            'permissions' => 'required',
        ];
    }
}
