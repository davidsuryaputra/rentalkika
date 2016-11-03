<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
	protected $fillable = [
		'partner_id',
		'zone_id',
		'route_id',
		'car_id',
		'passenger_capacity',
		'license_plate',
		'year',
		'status',
		'is_feeder',
	];    

	public function car()
	{
		return $this->belongsTo(Car::class);	
	}	
	
	public function galery()
	{
		return $this->hasOne(Vehicle_galery::class);	
	}

}