<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_company extends Model
{
	
	protected $table = 'user_company';
	
    protected $fillable = [
    	'user_id',
    	'nama_direktur',
    	'ktp_direktur',
    	'npwp_kantor',
    	'surat_kantor',
    ];
    
    public function user()
    {
		return $this->belongsTo(User::class);    
    }
}
