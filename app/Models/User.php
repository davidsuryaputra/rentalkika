<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'full_name',
        'address',
        'phone',
        'family_name',
        'family_address',
        'family_phone',
        'idcard',
        'status',
        'balance',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function roles(){
		return $this->belongsToMany(Role::class);
	}
	
	
	public function permissions()
	{
		return $this->belongsToMany(Permission::class);	
	}
	

	public function personal()
	{
		return $this->hasOne(User_personal::class);	
	}	
	
	public function company()
	{
		return $this->hasOne(User_company::class);	
	}
	
	public function partner()
	{
		return $this->hasOne(Partner::class);	
	}
	
	public function status()
	{
		return $this->belongsTo(User_statuses::class);	
	}
	
	public function tambahPermission($permission){
		if(is_string($permission)){
			$permission = Permission::where('name', $permission)->first();		
		}
		
		//return $permission;		
		return $this->permissions()->attach($permission);
	}
	
	/*
	public function hasRole($name){
		foreach($this->roles as $role){
			if($role->name == $name){
				return true;			
			}		
		}
		return false;	
	}
	*/
	
	public function assignRole($name){
		if(is_string($name)){
			$role = Role::where('name', $name)->first();		
		}
		
		return $this->roles()->attach($role);
	}
	
	public function revokeRole($name){
		if(is_string($name)){
			$role = Role::where('name', $name)->first();		
		}
		
		return $this->roles()->dettach($role);
	
	}	
	/*
	public function abilities(){
		return $this->belongsToMany(Abilities::class);
	}
	*/
	
	public function posts(){
		return $this->hasMany(Post::class);
	}

}
