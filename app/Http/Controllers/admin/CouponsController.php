<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Coupon;
use App\Http\Requests\CreateCouponRequest;
use Illuminate\Support\Facades\Session;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$coupons = Coupon::all();
    	//$age = '17';
    	//Session::flash('success', 'halox');
        return view('backend.admin.coupons.index', compact('coupons'));
        //return view('welcome', compact('coupons', 'age'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('backend.admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCouponRequest $request)
    {
    	$date = explode(" - ", $request->masaberlaku);
		//echo $date[0];
		//echo $date[1];
		//echo date('Y-m-d', strtotime(strtr($date[0], '/', '-')));
		//echo date('Y-m-d', strtotime($date[1]));
		//dd($date." ".)." ".date('Y-m-d', strtotime($date[1])));    	
    	
        Coupon::create([
        	'name' => $request->name,
        	'code' => $request->code,
        	'value' => $request->value,
        	'start_date' => date('Y-m-d', strtotime(strtr($date[0], '/', '-'))),
        	'expired_date' => date('Y-m-d', strtotime(strtr($date[1], '/', '-'))),
        	'is_fixed' => $request->fixedRadios,
        ]);
        
        return redirect()->route('admin.coupons.index')->with('success', 'Kupon berhasil ditambahkan.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$coupon = Coupon::find($id);
    	$masaberlaku = date('d/m/Y', strtotime($coupon->start_date))." - ".date('d/m/Y', strtotime($coupon->expired_date)); 
        return view('backend.admin.coupons.edit', compact('coupon', 'masaberlaku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCouponRequest $request, $id)
    {
    	$date = explode(" - ", $request->masaberlaku);
    	
        $coupon = Coupon::find($id);
        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->start_date = date('Y-m-d', strtotime(strtr($date[0], '/', '-')));
        $coupon->expired_date = date('Y-m-d', strtotime(strtr($date[1], '/', '-')));
        $coupon->is_fixed = $request->fixedRadios;
        $coupon->value = $request->value;
        $coupon->save();
        
        return redirect()->route('admin.coupons.index')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coupon::destroy($id);
        return \Redirect::route('admin.coupons.index')->with('success', 'Data berhasil dihapus.');
    }
}
