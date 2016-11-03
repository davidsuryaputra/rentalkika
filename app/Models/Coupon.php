<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
		'name',
		'code',
		'value',
		'start_date',
		'expired_date',
		'is_fixed',
		'description',    
    ];
}
