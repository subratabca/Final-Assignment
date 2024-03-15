<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\Permission;
use App\Models\PermissionFor;
use Session;


class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('backend.permission.role.index',compact('roles'));
    }


    public function create()
    {
        if (Auth::user()->can('roles.create')) {
            $permissions = Permission::all();
            $permissionFors = PermissionFor::all();
            return view('backend.permission.role.create',compact('permissions','permissionFors'));
        }
        return redirect(route('admin.dashboard'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>'required|max:50|unique:roles'
        ]);

        $role = new role;
        $role->name = $request->name;    
        $role->save();
        $role->permissions()->sync($request->permission);
        $notification=array(
            'message'=>'Information Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('role')->with($notification);
    }


    public function edit($id)
    {
        if (Auth::user()->can('roles.update')) {
            $role =Role::find($id);
            $permissions = Permission::all();
            $permissionFors = PermissionFor::all();
            return view('backend.permission.role.edit',compact('role','permissions','permissionFors'));
        }
        return redirect(route('admin.dashboard'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:20|unique:roles,name,'.$request->id,
        ]);

        $role = Role::find($id);
        $role->name = $request->name;    
        $role->save();
        $role->permissions()->sync($request->permission);
        $notification=array(
            'message'=>'Information Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('role')->with($notification);
    }


    public function delete($id)
    {
        Role::where('id',$id)->delete();
        $notification=array(
            'message'=>'Information Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


}
