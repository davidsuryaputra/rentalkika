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
		'car_class_id',
		'passenger_capacity',
		'photo',
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
	
	public function partner()
	{
		return $this->belongsTo(Partner::class);	
	}
	
	public function scopeHargaSewa($query)
	{
		return $query->rightJoin('harga_sewa', function ($join){
			$join->on('vehicles.car_class_id', '=', 'harga_sewa.car_class_id');
			$join->on('vehicles.zone_id', '=', 'harga_sewa.zone_id');
		});	
	}

}
