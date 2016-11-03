<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateZoneRequest;
use App\Http\Requests\CreatePricingFeederRequest;
use App\Http\Requests\CreatePricingRentcarRequest;

use App\Models\Zone;
use App\Models\City;
use App\Models\Pricing;
use App\Models\Pricing_option;
use App\Models\Route;

class PricingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function zone_index()
    {
    	$zones = Zone::all();
        return view('backend.admin.pricings.zone_index', compact('zones')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function zone_create()
    {
    	$cities = City::where('zone_id', null)->get();
        return view('backend.admin.pricings.zone_create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function zone_store(CreateZoneRequest $request)
    {
    	$zone = Zone::create(['name' => $request->zone_name]);
    	foreach($request->cities as $city){
    		$assignCity = City::find($city);
    		$assignCity->zone()->associate($zone);
    		$assignCity->save();
    	}
    	return redirect()->route('admin.pricings.zone_index')->with('success', 'Zona berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //detail tarif
    public function show($zoneid)
    {
    	$rentcar_pricing = Pricing::where('zone_id', $zoneid)->where('is_service_feeder', 0)->get();
    	$rentcar_pricing_option = Pricing_option::where('zone_id', $zoneid)->get();
		$rentcar_pricing_exist = false;    	
    	if(!$rentcar_pricing->isEmpty() && !$rentcar_pricing_option->isEmpty())
    	{
			$rentcar_pricing_exist = true;
			$short_time = Pricing::where('zone_id', $zoneid)->where('is_service_feeder', 0)->where('is_short_time', 1)->first();
			$normal_time = Pricing::where('zone_id', $zoneid)->where('is_service_feeder', 0)->where('is_short_time', 0)->first();
			$driver = Pricing_option::where('zone_id', $zoneid)->where('name', 'driver')->first();
			$out_of_town = Pricing_option::where('zone_id', $zoneid)->where('name', 'out of town')->first();
			$overtime = Pricing_option::where('zone_id', $zoneid)->where('name', 'overtime')->first();
			    	
    	}
    	$pricing_feeders = Pricing::where('is_service_feeder', 1)->where('zone_id', $zoneid)->get();
        $zone = Zone::find($zoneid);
		if($rentcar_pricing_exist){
	        return view('backend.admin.pricings.show', compact('rentcar_pricing_exist', 'zone', 'pricing_feeders', 'short_time', 'normal_time', 'driver', 'out_of_town', 'overtime'));
		}        
        return view('backend.admin.pricings.show', compact('rentcar_pricing_exist', 'zone', 'pricing_feeders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function zone_edit($id)
    {
    	$zoneCityIds = [];
        $zone = Zone::find($id);
        $cities = City::all();
		foreach($zone->cities as $zoneCity)
		{
			$zoneCityIds[] = $zoneCity->id;
		}        
        
        return view('backend.admin.pricings.zone_edit', compact('zone', 'cities', 'zoneCityIds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function zone_update(CreateZoneRequest $request, $id)
    {
        $zone = Zone::find($id);
        $zone->name = $request->zone_name;
        $zone->save();
        foreach($request->cities as $city)
        {
			$city = City::find($city);
			$city->zone()->associate($zone);
			$city->save();        
        }
        
        return redirect()->route('admin.pricings.zone_index')->with('success', 'Zona berhasil diupdate.');
    }
    
    public function feeder_create($zoneid)
    {
    	$zone = Zone::find($zoneid);
    	return view('backend.admin.pricings.feeder_create', compact('zone'));
    }
    
    public function feeder_edit($zoneid, $pricingfeederid)
    {
    	$pricing_feeder = Pricing::find($pricingfeederid)->where('zone_id', $zoneid)->where('is_service_feeder', 1)->first();
    	$RouteCityIds = [$pricing_feeder->route->from_city->id, $pricing_feeder->route->to_city->id];
    	return view('backend.admin.pricings.feeder_edit', compact('pricing_feeder', 'RouteCityIds'));
    }
    
    public function feeder_store(CreatePricingFeederRequest $request, $zoneid)
    {
    	$route = Route::firstOrNew(['from_city_id' => $request->dari_kota, 'to_city_id' => $request->ke_kota]);
    	$route->zone()->associate($zoneid);
    	if($request->dari_kota && $request->ke_kota){
			$in_the_city = 1;    	
    	}else{
			$in_the_city = 0;    	
    	}
    	$route->is_in_the_city = $in_the_city;
    	$route->save();
    	
    	$pricing_feeder = new Pricing();
    	$pricing_feeder->zone()->associate($zoneid);
    	$pricing_feeder->is_short_time = 0;
    	$pricing_feeder->is_service_feeder = 1;
    	$pricing_feeder->route()->associate($route);
    	$pricing_feeder->value = $request->tarif;
    	$pricing_feeder->save();
    	
    	return redirect()->route('admin.pricings.show', $zoneid)->with('success', 'Tarif feeder berhasil dibuat.');
    	
    }
    
    public function feeder_update(CreatePricingFeederRequest $request, $zoneid, $pricingfeederid)
    {
    	//ubah tarif
    	$pricing_feeder = Pricing::find($pricingfeederid);
    	$pricing_feeder->value = $request->tarif;
    	$pricing_feeder->save();
    	
    	//ubah route
    	$route = Route::find($pricing_feeder->route_id);
    	$route->from_city_id = $request->dari_kota;
    	$route->to_city_id = $request->ke_kota;
    	if($request->dari_kota && $request->ke_kota){
			$in_the_city = 1;    	
    	}else{
			$in_the_city = 0;    	
    	}
    	$route->is_in_the_city = $in_the_city;
    	$route->save();
    	
    	return redirect()->route('admin.pricings.show', $zoneid)->with('success', 'Tarif feeder berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function feeder_destroy($zoneid, $pricingfeederid)
    {
        $pricing_feeder = Pricing::find($pricingfeederid)->where('zone_id', $zoneid)->where('is_service_feeder', 1)->first();
        $pricing_feeder->route->delete();
        $pricing_feeder->delete();
        
        return redirect()->route('admin.pricings.show', $zoneid)->with('success', 'Tarif feeder berhasil dihapus.');
    }
    
    public function rentcar_store(CreatePricingRentcarRequest $request, $zoneid)
    {
    	$zone = Zone::find($zoneid);
		//short pricing
		$rentcar_pricing = new Pricing();
    	$rentcar_pricing->zone()->associate($zone);
    	$rentcar_pricing->is_short_time = 1;
    	$rentcar_pricing->is_service_feeder = 0;
    	$rentcar_pricing->value = $request->short_time;
    	$rentcar_pricing->save();
		
    	//normal pricing
    	$rentcar_pricing = new Pricing();
    	$rentcar_pricing->zone()->associate($zone);
    	$rentcar_pricing->is_short_time = 0;
    	$rentcar_pricing->is_service_feeder = 0;
    	$rentcar_pricing->value = $request->normal_time;
    	$rentcar_pricing->save();
    	
    	//out of town
		$rentcar_pricing_option = new Pricing_option();
		$rentcar_pricing_option->zone()->associate($zone);
		$rentcar_pricing_option->name = 'out of town';
		$rentcar_pricing_option->value = $request->out_of_town;
		$rentcar_pricing_option->save();
    	
    	//overtime
    	$rentcar_pricing_option = new Pricing_option();
		$rentcar_pricing_option->zone()->associate($zone);
		$rentcar_pricing_option->name = 'overtime';
		$rentcar_pricing_option->value = $request->overtime;
		$rentcar_pricing_option->save();
    	
    	//driver
    	$rentcar_pricing_option = new Pricing_option();
		$rentcar_pricing_option->zone()->associate($zone);
		$rentcar_pricing_option->name = 'driver';
		$rentcar_pricing_option->value = $request->driver;
		$rentcar_pricing_option->save();
		
		return redirect()->route('admin.pricings.show', $zone->id)->with('success', 'Tarif Rentcar berhasil dibuat.');
    }
    
    public function rentcar_update(CreatePricingRentcarRequest $request, $zoneid)
    {
    	//short pricing
		$rentcar_pricing = Pricing::where('zone_id', $zoneid)->where('is_short_time', 1)->first();
    	$rentcar_pricing->value = $request->short_time;
    	$rentcar_pricing->save();
		    	
    	//normal pricing
    	$rentcar_pricing = Pricing::where('zone_id', $zoneid)->where('is_short_time', 0)->first();
    	$rentcar_pricing->value = $request->normal_time;
    	$rentcar_pricing->save();
    	
    	//out of town
		$rentcar_pricing_option = Pricing_option::where('zone_id', $zoneid)->where('name', 'out of town')->first();
		$rentcar_pricing_option->value = $request->out_of_town;
		$rentcar_pricing_option->save();
    	
    	//overtime
    	$rentcar_pricing_option = Pricing_option::where('zone_id', $zoneid)->where('name', 'overtime')->first();
		$rentcar_pricing_option->value = $request->overtime;
		$rentcar_pricing_option->save();
    	
    	//driver
    	$rentcar_pricing_option = Pricing_option::where('zone_id', $zoneid)->where('name', 'driver')->first();
		$rentcar_pricing_option->value = $request->driver;
		$rentcar_pricing_option->save();
		
		return redirect()->route('admin.pricings.show', $zoneid)->with('success', 'Tarif Rentcar berhasil diupdate.');

    
    }
    
    public function rentcar_destroy($zoneid)
    {
    	Pricing::where('zone_id', $zoneid)->where('is_service_feeder', 0)->delete();
    	Pricing_option::where('zone_id', $zoneid)->delete();
    	return redirect()->route('admin.pricings.show', $zoneid)->with('success', 'Tarif Rentcar berhasil dihapus.');
    }
}
