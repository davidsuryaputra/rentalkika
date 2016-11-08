<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Harga_sewa extends Model
{
    protected $table = 'harga_sewa';
    protected $fillable = ['zone_id', 'car_class_id', 'value', 'description'];
    
    public function zone()
    {
		return $this->belongsTo(Zone::class);    
    }
    
    public function car_class()
    {
		return $this->belongsTo(Car_class::class);    
    }
    
    public function tr_sewa()
    {
		return $this->belongsToMany(tr_sewa::class);    
    }
}
