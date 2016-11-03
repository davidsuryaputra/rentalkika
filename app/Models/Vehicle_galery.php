<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle_galery extends Model
{
    protected $table = "vehicle_galeries";
    protected $fillable = ['vehicle_id', 'path'];
    
	public function vehicle()
	{
		return $this->belongsTo(Vehicle::class);	
	} 
}
