<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        $users = Admin::all();
        return view('backend.permission.user.index',compact('users'));
    }


    public function create()
    {
        if (Auth::user()->can('users.create')) {
            $roles =Role::all();
            return view('backend.permission.user.create',compact('roles'));
        }
        return redirect(route('admin.dashboard'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name'     => 'required|string|max:50',
            'email'    => 'required|string|email|max:50|unique:admins',
            'phone'    => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ],
        [
            'name.required' => 'Please give a name',
            'email.required' => 'Please give an email',
            'phone.required' => 'Please give a phone number',
            'password.required' => 'Please give a password',
            'password.min' => 'Password should be min 6 characters',
            'password_confirmation.required' => 'Confirm Password Required',
        ]);

        $request['password'] = bcrypt($request->password);
        $user = Admin::create($request->all());
        $user->roles()->sync($request->role);

        $notification=array(
            'message'=>'User Created Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('user')->with($notification);
    }


    public function edit($id)
    {
        if (Auth::user()->can('users.update')) {
            $user = Admin::find($id);
            $roles =Role::all();
            return view('backend.permission.user.edit',compact('user','roles'));
        }
        return redirect(route('admin.dashboard'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'     => 'required|string|max:50',
            'email'    => 'required|string|email|max:50|unique:users,email,'.$request->id,
            'phone'    => 'required|string|max:20',
        ],
        [
            'name.required' => 'Please provide your name.',
            'email.required' => 'Please provide your email.',
            'phone.required' => 'Please provide your phone.',
        ]);

        $request->status? : $request['status']= 0;
        $user = Admin::where('id',$id)->update($request->except('_token','_method','role'));
        Admin::find($id)->roles()->sync($request->role);

        $notification=array(
            'message'=>'User Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('user')->with($notification);
    }

    public function delete($id)
    {
        Admin::where('id',$id)->delete();
        $notification=array(
            'message'=>'User Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


}
