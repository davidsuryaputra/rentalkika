<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car_class extends Model
{
    protected $fillable = [
		'name',    
    ];
    
    public function car()
    {
		return $this->hasMany(Car::class);    
    }
}
