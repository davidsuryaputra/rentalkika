<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateAdminRequest;

use App\Models\User;
use App\Models\Permission;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $admin_users = $users->filter( function($users) {
			if($users->permissions->contains('name', 'access.backend.admin')) {
				return $users;
			}        	
        });
        return view('backend.admin.users.index', compact('admin_users'));
        //return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$permissions = Permission::all();
        return view('backend.admin.users.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAdminRequest $request)
    {
        $user = User::create([
          'full_name' => $request->full_name,
          'email' => $request->email,
          'password' => bcrypt($request->password),
          'address' => $request->address,
          'phone' => $request->phone,
          ]);
          
        $user->permissions()->sync($request->permissions);
        
        return redirect()->route('admin.users.index')->with('success', 'Admin Berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$user = User::find($id);
        return view('backend.admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $permissions = Permission::all();
        $permissionIds = [];
		foreach($user->permissions as $permission){
			$permissionIds[] = $permission->id;	
		} 
		return view('backend.admin.users.edit', compact('user', 'permissions', 'permissionIds'));      
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateAdminRequest $request, $id)
    {
        $user = User::find($id);
        $user->full_name = $request->full_name;
        $user->address = $request->address;
        $user->phone = $request->address;
        $user->password = bcrypt($request->password);
        $user->permissions()->sync($request->permissions);
        $user->save();
        
        return redirect()->route('admin.users.index')->with('success', 'Admin berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->permissions()->sync([]);
        $user->delete();
        
        return redirect()->route('admin.users.index')->with('success', 'Admin berhasil dihapus.');
    }
}
