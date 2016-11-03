<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\Http\Requests\CreateUserRequest;

class PartnerUserRequest extends CreateUserRequest
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
        return parent::rules() + [
            'ktp_pemilik' => 'required|image',
            'nama_pemilik' => 'required',
        ];
    }
}
