<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Htpp\Requests\RentalRequest;

class RentalController extends Controller
{
    public function create()
    {
    	return view('backend.customer.order_rental');
    }
    
    public function store(RentalRequest $request)
    {
    
    }
}
