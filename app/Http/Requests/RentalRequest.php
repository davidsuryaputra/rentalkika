<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RentalRequest extends Request
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
    	if($this->tujuan = 'dalam_kota'){
    		return [
	            'dalam_kota' => 'required',
	            'tahun_mobil' => 'required',
	            'jenis_mobil' => 'required',
        	];
    	}else if($this->tujuan = 'luar_kota') {	
			return [
				'dari_kota' => 'required',
				'ke_kota' => 'required',
				'jenis_mobil' => 'required',
				'tahun_mobil' => 'required',
			];		
		}else {
   	 		return [
   	 			'tujuan' => 'required',
   	 			'jenis_mobil' => 'required',
   	 			'tahun_mobil' => 'required',
   	 		];
   	 	}
   }
}
