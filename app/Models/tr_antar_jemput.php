<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tr_antar_jemput extends Model
{
    protected $table = 'tr_antar_jemput';
    protected $fillable = [
		'partner_id',
    	'client_id',
    	'vehicle_id',
    	'coupon_id',
    	'from_city_id',
    	'to_city_id',
    	'harga_antar_jemput_id',
    	'order_date',
    	'distance',
    	'from_address',
    	'to_address',
    	'from_longitude_latitude',
    	'to_longitude_latitude',
    	'ppn',
    	'pph',
    	'status',
    	'total',    
    ];
}
