<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	//public $timestamps = false;
    protected $fillable = [
		'name',
    ];
    
    public function users(){
		return $this->belongsToMany(User::class);    
    }
    
    public function permissions(){
		return $this->belongsToMany(Permission::class);    
    }
    
    public function addPermission($permission){
    	if(is_string($permission)) {
			$permission = Permission::where('name', $permission)->first();    	
    	}
    	
    	//return $permission;
    	//return $this->permissions()->sync([4, 5]);
    	return $this->permissions()->attach($permission);
    }
    
    public function removePermission($name){
    	if(is_string($name)) {
			$permission = Permission::where('name', $name)->first();    	
    	}
    	
    	return $this->permissions()->detach($permission);
    }
}
