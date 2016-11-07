<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Harga_antar_jemput extends Model
{
    protected $table = 'harga_antar_jemput';
    protected $fillable = ['zone_id', 'value'];
    
    public function zone()
    {
		return $this->belongsTo(Zone::class);    
    }
}

