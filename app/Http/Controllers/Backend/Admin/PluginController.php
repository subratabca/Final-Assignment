<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\Plugin;

class PluginController extends Controller
{
    public function index()
    {
        $companies = Company::where('status',1)->where('company_id',null)->get();
//dd($datas);
        return view('backend.pages.plugin.index-page',compact('companies'));
    }

    public function inactiveBlog($id)
    {

        Company::findOrFail($id)->update(['blog'=> 0]);
        $notification=array(
            'message'=>'Blog Successfully Inactive',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }


    public function activeBlog($id)
    {
        Company::findOrFail($id)->update(['blog'=> 1]);
        $notification=array(
            'message'=>'Blog Published Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }


    public function inactiveEmployee($id)
    {
        Company::findOrFail($id)->update(['employee'=> 0]);
        $notification=array(
            'message'=>'Employee Successfully Inactive',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }


    public function activeEmployee($id)
    {
        Company::findOrFail($id)->update(['employee'=> 1]);
        $notification=array(
            'message'=>'Employee Published Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }


    public function inactivePage($id)
    {
        Company::findOrFail($id)->update(['page'=> 0]);
        $notification=array(
            'message'=>'Page Successfully Inactive',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }


    public function activePage($id)
    {
        Company::findOrFail($id)->update(['page'=> 1]);
        $notification=array(
            'message'=>'Page Published Successfully',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);
    }

}