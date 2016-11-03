<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Http\Requests\CreateUserRequest;

class CompanyUserRequest extends CreateUserRequest
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
            'nama_direktur' => 'required',
            'ktp_direktur' => 'required|image',
            'npwp_kantor' => 'required',
            'surat_kantor' => 'required',
        ];
    }
}
