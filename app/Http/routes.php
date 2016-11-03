<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'GuestController@index');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::get('/register_company', 'Auth\AuthController@showRegistrationCompanyForm');
    Route::post('/register_company', 'Auth\AuthController@postRegistrationCompany');
   
    Route::get('/register_partner', 'Auth\AuthController@showRegistrationPartnerForm');
    Route::post('/register_partner', 'Auth\AuthController@postRegistraionPartner');
    
    Route::get('/activation/{code}', 'Auth\AuthController@activation')->name('activation');
	Route::get('/home', 'HomeController@index');
	
	//customer
	Route::group(['prefix' => 'customer', 'middleware' => ['auth', 'role:access.backend.customer']], function () {
		
		Route::get('/order_rental', 'customer\RentalController@create')->name('customer.order_rental');
		Route::post('/order_rental/store', 'customer\RentalController@store')->name('customer.order_rental.store');
		Route::get('/order_antar_jemput', 'customer\AntarJController@create')->name('customer.order_antar_jemput');
		Route::post('/order_antar_jemput/store', 'customer\AntarJController@store')->name('customer.order_antar_jemput');
				
		Route::get('/transactions', 'customer\TransactionsController@index')->name('customer.transactions');		
		
		Route::get('/', function (){
			$user = Auth::loginUsingId(3);
			if(Gate::check('create.post')){
				return 'halo kamu dapat akses create post';	
			}
			return 'gk isa bro';
		});
	});

	//partner
	Route::group(['prefix' => 'partner', 'middleware' => ['auth', 'role:access.backend.partner']], function () {
		Route::get('/', function () {
			return 'Partner Login Success.';	
		});
		
		Route::group(['prefix' => 'vehicles'], function () {
			Route::get('/', 'partner\VehiclesController@index')->name('partner.vehicles.index');
			Route::get('/create', 'partner\VehiclesController@create')->name('partner.vehicles.create');
			Route::get('/{id}/edit', 'partner\VehiclesController@edit')->name('partner.vehicles.edit');
			Route::get('/{id}/destroy', 'partner\VehiclesController@destroy')->name('partner.vehicles.destroy');
			Route::post('/store', 'partner\VehiclesController@store')->name('partner.vehicles.store');
			Route::post('/{id}/update', 'partner\VehiclesController@update')->name('partner.vehicles.update');		
		});
	});

	//admin
	Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:access.backend.admin']], function () {
		
		Route::group(['prefix' => 'cars'], function () {
			Route::get('/', 'admin\CarsController@index')->name('admin.cars.index');
			Route::get('/brands/create', 'admin\CarsController@brands_create')->name('admin.brands.create');
			Route::get('/brands/{id}/edit', 'admin\CarsController@brands_edit')->name('admin.brands.edit');
			//Route::get('/brands/{id}/destroy', 'admin\CarsController@brands_destroy')->name('admin.brands.destroy');
			Route::post('/brands/store', 'admin\CarsController@brands_store')->name('admin.brands.store');
			Route::post('/brands/{id}/update', 'admin\CarsController@brands_update')->name('admin.brands.update');
			
			Route::get('/classes/create', 'admin\CarsController@classes_create')->name('admin.classes.create');
			Route::get('/classes/{id}/edit', 'admin\CarsController@classes_edit')->name('admin.classes.edit');
			//Route::get('/classes/{id}/destroy', 'admin\CarsController@classes_destroy')->name('admin.classes.destroy');
			Route::post('/classes/store', 'admin\CarsController@classes_store')->name('admin.classes.store');
			Route::post('/classes/{id}/update', 'admin\CarsController@classes_update')->name('admin.classes.update');
			
			Route::get('/cars/create', 'admin\CarsController@cars_create')->name('admin.cars.create');
			Route::get('/cars/{id}/edit', 'admin\CarsController@cars_edit')->name('admin.cars.edit');
			Route::get('/cars/{id}/destroy', 'admin\CarsController@cars_destroy')->name('admin.cars.destroy');
			Route::post('/cars/store', 'admin\CarsController@cars_store')->name('admin.cars.store');
			Route::post('/cars/{id}/update', 'admin\CarsController@cars_update')->name('admin.cars.update');
		});
		
		Route::group(['prefix' => 'banks'], function () {
			Route::get('/', 'admin\BanksController@index')->name('admin.banks.index');
			Route::get('/create', 'admin\BanksController@create')->name('admin.banks.create');
			Route::get('/{id}/edit', 'admin\BanksController@edit')->name('admin.banks.edit');
			Route::get('/{id}/destroy', 'admin\BanksController@destroy')->name('admin.banks.destroy');
			Route::post('/store', 'admin\BanksController@store')->name('admin.banks.store');
			Route::post('/{id}/update', 'admin\BanksController@update')->name('admin.banks.update');
		});
		
		Route::group(['prefix' => 'taxes'], function () {
			Route::get('/', 'admin\TaxesController@index')->name('admin.taxes.index');
			Route::get('/create', 'admin\TaxesController@create')->name('admin.taxes.create');
			Route::get('/{id}/edit', 'admin\TaxesController@edit')->name('admin.taxes.edit');
			Route::get('/{id}/destroy', 'admin\TaxesController@destroy')->name('admin.taxes.destroy');
			Route::post('/store', 'admin\TaxesController@store')->name('admin.taxes.store');
			Route::post('/{id}/update', 'admin\TaxesController@update')->name('admin.taxes.update');
		});		
			
		Route::group(['prefix' => 'posts'], function () {
			Route::get('/', 'admin\PostsController@index')->name('admin.posts.index');
			Route::get('/create', 'admin\PostsController@create')->name('admin.posts.create');
			Route::get('/{id}/edit', 'admin\PostsController@edit')->name('admin.posts.edit');
			Route::get('/{id}/show', 'admin\PostsController@show')->name('admin.posts.show');
			Route::get('/{id}/destroy', 'admin\PostsController@destroy')->name('admin.posts.destroy');
			Route::post('/store', 'admin\PostsController@store')->name('admin.posts.store');
			Route::post('/{id}/update', 'admin\PostsController@update')->name('admin.posts.update');
		});	
		
		Route::group(['prefix' => 'coupons'], function () {
			Route::get('/', 'admin\CouponsController@index')->name('admin.coupons.index');
			Route::get('/create', 'admin\CouponsController@create')->name('admin.coupons.create');
			Route::get('/{id}/edit', 'admin\CouponsController@edit')->name('admin.coupons.edit');
			Route::get('/{id}/destroy', 'admin\CouponsController@destroy')->name('admin.coupons.destroy');
			Route::post('/store', 'admin\CouponsController@store')->name('admin.coupons.store');
			Route::post('/{id}/update', 'admin\CouponsController@update')->name('admin.coupons.update');
		});
		
		Route::group(['prefix' => 'pricings'], function () {
			Route::get('/', 'admin\PricingsController@zone_index')->name('admin.pricings.zone_index');
			Route::get('/create', 'admin\PricingsController@zone_create')->name('admin.pricings.zone_create');		
			Route::get('/{id}/edit', 'admin\PricingsController@zone_edit')->name('admin.pricings.zone_edit');		
			Route::post('/store', 'admin\PricingsController@zone_store')->name('admin.pricings.zone_store');		
			Route::post('/{id}/update', 'admin\PricingsController@zone_update')->name('admin.pricings.zone_update');
			
			//detail tarif
			Route::get('/{zone_id}/detail', 'admin\PricingsController@show')->name('admin.pricings.show');
			
			//feeder controller
			Route::get('/{zone_id}/feeder_create', 'admin\PricingsController@feeder_create')->name('admin.pricings.feeder_create');
			Route::get('/{zone_id}/feeder_edit/{feeder_pricing_id}', 'admin\PricingsController@feeder_edit')->name('admin.pricings.feeder_edit');
			Route::get('/{zone_id}/feeder_destroy/{feeder_pricign_id}', 'admin\PricingsController@feeder_destroy')->name('admin.pricings.feeder_destroy');			
			Route::post('/{zone_id}/feeder_store', 'admin\PricingsController@feeder_store')->name('admin.pricings.feeder_store');
			Route::post('/{zone_id}/feeder_update/{feeder_pricing_id}', 'admin\PricingsController@feeder_update')->name('admin.pricings.feeder_update');
		
			//rent car controller
			Route::post('/{zone_id}/rentcar_store', 'admin\PricingsController@rentcar_store')->name('admin.pricings.rentcar_store');		
			Route::post('/{zone_id}/rentcar_update', 'admin\PricingsController@rentcar_update')->name('admin.pricings.rentcar_update');
			Route::get('/{zone_id}/rentcar_destroy', 'admin\PricingsController@rentcar_destroy')->name('admin.pricings.rentcar_destroy');
		
		});
		
		Route::group(['prefix' => 'users'], function () {
			Route::get('/', 'admin\UsersController@index')->name('admin.users.index');
			Route::get('/create', 'admin\UsersController@create')->name('admin.users.create');
			Route::get('/{id}/show', 'admin\UsersController@show')->name('admin.users.show');
			Route::get('/{id}/edit', 'admin\UsersController@edit')->name('admin.users.edit');
			Route::get('/{id}/destroy', 'admin\UsersController@destroy')->name('admin.users.destroy');
			Route::post('/store', 'admin\UsersController@store')->name('admin.users.store');
			Route::post('/{id}/update', 'admin\UsersController@update')->name('admin.users.update');		
		});
		
	});
});

