<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Htpp\Requests\RentalRequest;

use App\Models\City;
use App\Models\Car_class;
use App\Models\Vehicle;

use Illuminate\Support\Facades\DB;


class RentalController extends Controller
{
    public function create()
    {
    	$cities = City::all();
    	$car_classes = Car_class::all();
    	$vehicles = Vehicle::where('status', 'available')->groupBy('year')->get();
    	return view('frontend.order_rental', compact('cities', 'car_classes', 'vehicles'));
    }
    
    public function filter(Request $request)
    {
    	//list mobil sesuai filter
    	
    	$jenis_mobil = Car_class::find($request->jenis_mobil);
		$lokasi_mobil = City::find($request->lokasi_mobil_sewa);    	
    	//echo $jenis_mobil->name;
    	//echo $dari_kota->name;
    	
    	$vehicles = Vehicle::whereHas('car', function($q) use ($jenis_mobil){
    		$q->whereHas('car_class', function($q) use ($jenis_mobil){
    			$q->where('name', $jenis_mobil->name);
    		});
    	})
    	->whereHas('partner', function($q) use ($lokasi_mobil) {
    		$q->whereHas('city', function($q) use ($lokasi_mobil){
    			$q->where('name', $lokasi_mobil->name);
    		});
    	})
    	->where('year', $request->tahun_mobil)
    	->get();
    	
    	//$car_class = Car_class::where($request->jenis_mobil)->first();
    	//$vehicles = Vehicle::where('year', $request->tahun_mobil)->where('car_class_id', $car_class->id)->where('status', 'available')->get();
        /*
        $data_mobil = Vehicle::
        		rightJoin('harga_sewa', function ($join) {
        			$join->on('vehicles.zone_id', '=', 'harga_sewa.zone_id');
        			$join->on('vehicles.car_class_id', '=', 'harga_sewa.car_class_id');
        		})
        		*/
        		/*
        		->rightJoin('harga_sewa', 'vehicles.zone_id', '=', 'harga_sewa.zone_id')
        		->rightJoin('harga_sewa', 'vehicles.car_class_id', '=', 'harga_sewa.car_class_id')
        		*/
        		/*
        		->select('vehicles.license_plate', 'vehicles.partner_id', 'vehicles.year', 'vehicles.car_class_id', 'vehicles.zone_id', 'vehicles.status', 'harga_sewa.description', 'harga_sewa.value')
				->where('vehicles.year', $request->tahun_mobil) 
				->where('vehicles.car_class_id', $request->jenis_mobil)
				->where('vehicles.status', 'available')       		
        		->get();
        		*/
       //dd($vehicles);	
        /*
        foreach($data_mobil as $data)
        {
			echo $data->partner->kota_pool->name;        
        }
        */
        
        return view('frontend.order_rental_result', compact('vehicles'));
        
    }
    
    public function store(RentalRequest $request)
    {
    
    }
    
    public function detail($id)
    {
    	$vehicle = Vehicle::find($id);
    	$cities = City::all();
    	return view('frontend.order_rental_detail', compact('vehicle', 'cities'));
    }
}
