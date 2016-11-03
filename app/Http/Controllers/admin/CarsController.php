<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\BrandRequest;
use App\Http\Requests\ClassRequest;
use App\Http\Requests\CarRequest;

use App\Models\Car_brand;
use App\Models\Car_class;
use App\Models\Car;


class CarsController extends Controller
{
    public function index()
    {
    	$brands = Car_brand::all();
    	$classes = Car_class::all();
    	$cars = Car::all();
    	return view('backend.admin.cars.index', compact('brands', 'classes', 'cars'));
    }
    
    public function brands_create()
    {
    	return view('backend.admin.cars.brands_create');
    }
    
	public function brands_store(BrandRequest $request)
	{
		Car_brand::create(['name' => $request->name]);
		return redirect()->route('admin.cars.index')->with('success', 'Merek mobil berhasil ditambahkan.');
	}    
    
    public function brands_edit($id)
    {
    	$brand = Car_brand::find($id);
		return view('backend.admin.cars.brands_edit', compact('brand'));    
    }
    
    public function brands_update(BrandRequest $request, $id)
    {
    	$brand = Car_brand::find($id);
    	$brand->name = $request->name;
    	$brand->save();
    	return redirect()->route('admin.cars.index')->with('success', 'Merek mobil berhasil diubah.');
    }
    
    
    public function classes_create()
    {
    	return view('backend.admin.cars.classes_create');
    }
    
    public function classes_store(ClassRequest $request)
    {
		Car_class::create(['name' => $request->name]);
		return redirect()->route('admin.cars.index')->with('success', 'Kelas mobil berhasil ditambahkan.');    
    }
    
    public function classes_edit($id)
    {
    	$class = Car_class::find($id);
		return view('backend.admin.cars.classes_edit', compact('class'));
    }
    
    public function classes_update(ClassRequest $request, $id)
    {
		$class = Car_class::find($id);
		$class->name = $request->name;
		$class->save();
		return redirect()->route('admin.cars.index')->with('success', 'Kelas mobil berhasil diubah.');   
    }
    
    public function cars_create()
    {
    	$brands = Car_brand::all();
    	$classes = Car_class::all();
		return view('backend.admin.cars.cars_create', compact('brands', 'classes'));  
    }
    
    public function cars_store(CarRequest $request)
    {
    	Car::create(['car_class_id' => $request->class_name, 'car_brand_id' => $request->brand_name, 'name' => $request->car_name]);
    	return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil ditambahkan.');
    }
    
    public function cars_edit($id)
    {
    	$car = Car::find($id);
    	$brands = Car_brand::all();
    	$classes = Car_class::all();
    	return view('backend.admin.cars.cars_edit', compact('car', 'brands', 'classes'));
    }
    
    public function cars_update(CarRequest $request, $id)
    {
    	$car = Car::find($id);
    	$car->car_class_id = $request->class_name;
    	$car->car_brand_id = $request->brand_name;
    	$car->name = $request->car_name;
    	$car->save();
    	return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil diubah.');
    }
    
    public function cars_destroy($id)
    {
    	Car::destroy($id);
    	return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil dihapus.');
    }
    
	    
}
