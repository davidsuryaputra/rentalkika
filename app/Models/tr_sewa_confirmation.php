<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tr_sewa_confirmation extends Model
{
    protected $table = 'tr_sewa_confirmation';
    protected $fillable = ['tr_sewa_id', 'bank_id', 'payment_proof'];
}
