<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
		'zone_id',
		'name',    
    ];
    
    public function zone(){
		return $this->belongsTo(Zone::class);    
    }
    
    public function cities(){
		return $this->hasMany(Route::class);    
    }
}
