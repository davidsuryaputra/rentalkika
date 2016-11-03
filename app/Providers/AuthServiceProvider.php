<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('access.backend.admin', function ($user){
			foreach($user->permissions as $permission){
				if($permission->name == 'access.backend.admin'){
					return true;				
				}			
			}
			return false;       
        });
        
        $gate->define('access.backend.customer', function ($user){
			foreach($user->permissions as $permission){
				if($permission->name == 'access.backend.customer'){
					return true;				
				}			
			}
			return false;       
        });
        
        $gate->define('access.backend.partner', function ($user){
			foreach($user->permissions as $permission){
				if($permission->name == 'access.backend.partner'){
					return true;				
				}			
			}
			return false;       
        });
        
    }
    
    public function getPermissions()
    {
    	return Permission::all();
    }
}
