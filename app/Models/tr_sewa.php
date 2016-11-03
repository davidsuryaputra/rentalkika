<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tr_sewa extends Model
{
    protected $table = 'tr_sewa';
    protected $fillable = [
    	'partner_id',
    	'client_id',
    	'vehicle_id',
    	'coupon_id',
    	'from_city_id',
    	'to_city_id',
    	'ppn',
    	'pph',
    	'rent_start',
    	'rent_expired',
    	'rent_return',
    	'take_at_pool',
    	'status',
    	'total',
    	];
    	
    public function partner()
    {
		return $this->belongsTo(Partner::class);    
    }
    
    public function client()
    {
		return $this->belongsTo(User::class);    
    }
    
    public function vehicle()
    {
		return $this->belongsTo(Vehicle::class);    
    }
    
    public function coupon()
    {
		return $this->belongsTo(Coupon::class);    
    }
}
