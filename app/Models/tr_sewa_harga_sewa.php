<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tr_sewa_harga_sewa extends Model
{
    protected $table = 'tr_sewa_harga_sewa';
    protected $fillable = ['tr_sewa_id', 'harga_sewa_id'];
}
