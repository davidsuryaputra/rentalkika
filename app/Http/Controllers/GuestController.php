<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
	
    public function index(){
	  
	  
	  //$role = \App\Models\Role::find(3);
	  //$role->addPermission('index.post');
	 // return $role;  
	  
	  
	  //$user = \App\Models\User::find(3);
	  //$user = Auth::loginUsingId(3);
	  //foreach(Auth::user()->roles as $role)
	  //{
	//	echo $role->name;	  
	  //}	  
	  //$user->tambahPermission('index.post');
	  //dd(Auth::check());      
      
      return view('frontend.index');
	  //dd(Auth::check());      
      /*foreach(Auth::user()->roles as $role){
		echo $role->name;      
      }*/
    }
}
