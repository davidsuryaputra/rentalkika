<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Support\Facades\DB;
use App\Models\Coupon;
use App\Models\User;
use App\Models\Post;
use App\Models\Role;

class CouponsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     
    use DatabaseMigrations;
    //use WithoutMiddleware;
    use DatabaseTransactions;
    
    protected $adminUser;
    
    public function setUp(){
    	parent::setup();
		$role = factory(Role::class)->create(['name' => 'admin']);
		$this->adminUser = factory(User::class)->create(['role_id' => $role->id]);
    }
     
     
    public function test_index_coupon(){
    	
    	factory(Coupon::class, 5)->create()->toArray();  

    	$this->actingAs($this->adminUser)->visit('admin/coupons')->assertViewHas('coupons');

    }
    
    
    public function test_create_coupon()
    {
    	$this->actingAs($this->adminUser)->visit(route('admin.coupons.create'))->seePageIs('admin/coupons/create')
    	->see('Simpan')
    	->submitForm('Simpan', ['name' => 'HUT 71', 'code' => '#ren71', 'masaberlaku' => '10/10/2016 - 29/10/2016', 'fixedRadios' => 1, 'value' => '10000'])
		->seePageIs(route('admin.coupons.index'))		
		->see('berhasil');    	
    }
}
