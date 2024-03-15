<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PermissionFor;

class PermissionForController extends Controller
{
  public function index()
  {
    $permissions = PermissionFor::all();
    return view('backend.permission.permission-for.index',compact('permissions'));
  }

  public function create()
  {
    if (Auth::user()->can('permissionFors.create')) {
      return view('backend.permission.permission-for.create');
    }
    return redirect(route('admin.dashboard'));
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'for' =>'required|max:20|unique:permission_fors',
    ]);

    $permission = new PermissionFor; 
    $permission->for = $request->for; 
    $permission->save();
    $notification=array(
      'message'=>'Information Inserted Successfully',
      'alert-type'=>'success'
    );
    return Redirect()->route('permissionfor')->with($notification);
  }


  public function edit($id)
  {
    if (Auth::user()->can('permissionFors.update')) {
      $permission =PermissionFor::where('id',$id)->first();
      return view('backend.permission.permission-for.edit',compact('permission'));
    }
    return redirect(route('admin.dashboard'));
  }


  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'for' =>'required|max:20|unique:permission_fors,for,'.$request->id,
    ]);

    $permission = PermissionFor::find($id);     
    $permission->for = $request->for;   
    $permission->save();
    $notification=array(
      'message'=>'Information Updated Successfully',
      'alert-type'=>'success'
    );
    return Redirect()->route('permissionfor')->with($notification);
  }


  public function delete($id)
  {
    PermissionFor::where('id',$id)->delete();
    $notification=array(
      'message'=>'Information Deleted Successfully',
      'alert-type'=>'success'
    );
    return Redirect()->route('permissionfor')->with($notification);
  }


}
