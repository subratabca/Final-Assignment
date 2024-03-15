<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Permission;
use App\Models\PermissionFor;



class PermissionController extends Controller
{
    public function index()
    {

        $permissions = Permission::all();
        $permissionFors = PermissionFor::all();
        return view('backend.permission.permission.index',compact('permissions','permissionFors'));
    }

    public function create()
    {
        if (Auth::user()->can('permissions.create')) {
            $permissionFors = PermissionFor::all();
            return view('backend.permission.permission.create',compact('permissionFors'));
        }
        return redirect(route('admin.dashboard'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>'required|max:50|unique:permissions',
            'for' =>'required',
        ]);

        $permission = new Permission;
        $permission->name = $request->name;   
        $permission->for = $request->for; 
        $permission->save();
        $notification=array(
            'message'=>'Information Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route("permission")->with($notification); 
    }


    public function edit($id)
    {
        if (Auth::user()->can('permissions.update')) {
            $permissionFors = PermissionFor::all();
            $permission =Permission::where('id',$id)->first();
            return view('backend.permission.permission.edit',compact('permission','permissionFors'));
        }
        return redirect(route('admin.dashboard'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' =>'required|max:20|unique:permissions,name,'.$request->id,
            'for' =>'required',
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->name; 
        $permission->for = $request->for;   
        $permission->save();
        $notification=array(
            'message'=>'Information Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('permission')->with($notification);
    }


    public function delete($id)
    {
        Permission::where('id',$id)->delete();
        $notification=array(
            'message'=>'Information Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('permission')->with($notification);
    }


}
