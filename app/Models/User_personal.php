<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_personal extends Model
{
	
	protected $table = 'user_personal';
	
    protected $fillable = [
		'user_id',    	
    	'family_name',
    	'family_address',
    	'family_phone',
    	'ktp',
    ];
    
    public function user()
    {
		return $this->belongsTo(User::class);    
    }
}
