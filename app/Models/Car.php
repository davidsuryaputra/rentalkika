<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
		'car_class_id',
		'car_brand_id',
		'name',    
    ];
    
    public function car_class()
    {
		return $this->belongsTo(Car_class::class, 'car_class_id');    
    }
    
    public function brand()
    {
		return $this->belongsTo(Car_brand::class, 'car_brand_id');    
    }
}
