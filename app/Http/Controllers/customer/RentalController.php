<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Htpp\Requests\RentalRequest;

use App\Models\City;
use App\Models\Car_class;
use App\Models\Vehicle;
use App\Models\tr_sewa;
use App\Models\Tax;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
    	->where('status', 'available')
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
    
    public function store(Request $request, $id)
    {
    	$tanggal_sewa = Carbon::createFromFormat('d/m/Y H.i', $request->tanggal_sewa);
    	$tanggal_pengembalian = Carbon::createFromFormat('d/m/Y H.i', $request->tanggal_pengembalian);
    	
    	$lama_sewa = $tanggal_sewa->diffInHours($tanggal_pengembalian);

		$harga_sewa_ids = [];    	
    	
    	$dasar = Vehicle::hargaSewa()
    	->select('vehicles.license_plate', 'harga_sewa.id', 'harga_sewa.value')
    	->where('harga_sewa.description', '=', 'dasar')
    	->where('vehicles.id', $id)
    	->first();
		
		$harga_sewa_ids[] = $dasar->id;    	
    	
    	if($request->sopir_sewa != 0) {
    		$sopir = Vehicle::hargaSewa()
    		->select('vehicles.license_plate', 'harga_sewa.id', 'harga_sewa.value')
    		->where('harga_sewa.description', '=', 'sopir')
    		->where('vehicles.id', $id)
    		->first();
    		
    		$harga_sewa_ids[] = $sopir->id;
    	}
    	
    	if($request->luar_kota != 0) {
			$luar_kota = Vehicle::hargaSewa()
			->select('vehicles.license_plate', 'harga_sewa.id', 'harga_sewa.value')
			->where('harga_sewa.description', '=', 'luar kota')
			->where('vehicles.id', $id)
			->first();
			
			$harga_sewa_ids[] = $luar_kota->id;    	
    	}
				
		
		
		$kendaraan = Vehicle::find($id);
		$tujuan_sewa = City::where('name', $request->tujuan_sewa)->first();
		
		$ppn = Tax::where('name', 'ppn')->first();
		$pph = Tax::where('name', 'pph')->first(); 
		
		Auth::loginUsingId(1);		
		
		$tr_sewa = new tr_sewa();
		$tr_sewa->partner_id = $kendaraan->partner->id;
		$tr_sewa->client_id = Auth::user()->id;
		$tr_sewa->vehicle_id = $kendaraan->id;
		$tr_sewa->from_city_id = $kendaraan->partner->city->id;
		$tr_sewa->to_city_id =  $tujuan_sewa->id;
		$tr_sewa->take_at_pool = $request->ambil_pool;
		$tr_sewa->status = 'waiting';
		$tr_sewa->total = $request->total;
		$tr_sewa->rent_start = $tanggal_sewa;
		$tr_sewa->rent_expired = $tanggal_pengembalian;
		$tr_sewa->alamat_pengiriman = $request->alamat_pengiriman;
		$tr_sewa->ppn = $ppn->id;
		$tr_sewa->pph = $pph->id;
		$tr_sewa->save();
		
		foreach($harga_sewa_ids as $harga_sewa_id){
			$tr_sewa->harga_sewa()->attach($harga_sewa_id);
		}
		
		
		//kendaraan plat
		//partner name
		//dari kota, ke kota
		//total
		//status
		//tanggal sewa & pengembalian
		//rekening
				
    	return view('frontend.order_rental_summary');
    	
    }
    
    public function cek_harga(Request $request, $id)
    {
    	$dasar = Vehicle::hargaSewa()
    	->select('vehicles.license_plate', 'harga_sewa.value')
    	->where('harga_sewa.description', 'dasar')
    	->where('vehicles.id', $id)
    	->first();
    	
    	$luar_kota = Vehicle::hargaSewa()
    	->select('vehicles.license_plate', 'harga_sewa.value')
    	->where('harga_sewa.description', 'luar kota')
    	->where('vehicles.id', $id)
    	->first();
    	
    	$overtime = Vehicle::hargaSewa()
    	->select('vehicles.license_plate', 'harga_sewa.value')
    	->where('harga_sewa.description', 'overtime')
    	->where('vehicles.id', $id)
    	->first();
    	
    	$sopir = Vehicle::hargaSewa()
    	->select('vehicles.license_plate', 'harga_sewa.value')
    	->where('harga_sewa.description', 'sopir')
    	->where('vehicles.id', $id)
    	->first();
    	
    	$dasar = $dasar->value;
    	$luar_kota = $luar_kota->value;
    	$overtime = $overtime->value;
    	$sopir = $sopir->value;
    	
    	$kendaraan = Vehicle::find($id);
    	$lokasi_mobil = $kendaraan->partner->city;
    	$tujuan_sewa = $request->tujuan_sewa;
    	
    	//echo $request->tanggal_sewa;
    	//echo $request->tanggal_pengembalian;
    	
    	$tanggal_sewa = Carbon::createFromFormat('d/m/Y H.i', $request->tanggal_sewa);
		    	
    	$tanggal_pengembalian = Carbon::createFromFormat('d/m/Y H.i', $request->tanggal_pengembalian);
		$lama_sewa = $tanggal_sewa->diffInHours($tanggal_pengembalian);    	
    	
    	$luar_kota_sewa = '0';
    	$is_luar_kota = '0';
    	
    	if($lokasi_mobil->id != $tujuan_sewa) {
    		$is_luar_kota = '1';
    		$luar_kota_sewa = $luar_kota * $lama_sewa;
    	}
		$tujuan_sewa = City::find($request->tujuan_sewa);    	
    	
    	/*
    	$is_ambil_di_pool = $request->ambil_pool;
		$alamat_pool = '';    	
    	if($is_ambil_di_pool == '1') {
			$alamat_pool = $kendaraan->partner->lokasi_pool;
    	}
    	*/
    	
    	$is_sopir = $request->pakai_sopir;
		$sopir_sewa = '0';		
		if($is_sopir == '1'){
			$sopir_sewa = $sopir * $lama_sewa;		
		}
		
    	//luar kota = lokasi mobil != tujuan
    	$dasar_sewa = ($lama_sewa / 14) * $dasar;
    	$total = $dasar_sewa + $luar_kota_sewa + $sopir_sewa;
    	
    	//$tujuan_sewa = City::find($tujuan_sewa); 
    	
    	return view('frontend.order_rental_cek_harga', compact('total', 'tanggal_sewa', 'overtime', 'tanggal_pengembalian', 'dasar', 'sopir', 'luar_kota', 'dasar_sewa', 'luar_kota_sewa', 'sopir_sewa', 'is_sopir', 'is_luar_kota', 'lama_sewa', 'lokasi_mobil', 'tujuan_sewa', 'kendaraan'));
    	
    	//$tanggal berapa dan jam berapa harus dikembalikan
    	//$tanggal_jam_pengembalian = $tanggal_sewa->addHours(14 * $lama_sewa);
    	//$tangagl & jam sewa + 14 x hari sewa
    	//tampilkan harga sewa, luar kota, overtime, sopir
    }
    
    public function detail($id)
    {
    	$vehicle = Vehicle::find($id);
    	$cities = City::all();
    	return view('frontend.order_rental_detail', compact('vehicle', 'cities'));
    }
}
