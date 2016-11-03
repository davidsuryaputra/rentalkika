<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
		'user_id',
		'zone_id',
		'nama_pemilik',
		'ktp_pemilik',
    ];
    
    public function user()
    {
		return $this->belongsTo(User::class);    
    }
    
    public function zone()
    {
		return $this->belongsTo(Zone::class);    
    }
}
