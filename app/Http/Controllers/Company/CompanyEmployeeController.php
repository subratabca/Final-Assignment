<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\CompanyEmployee;

class CompanyEmployeeController extends Controller
{

    public function index()
    {
        $company = Company::where('id', auth()->user()->id)->where('company_id',null)->first();
        $employees = Company::where('company_id',$company->id)->get();
//dd($employees);
        return view('company.pages.employee.index',compact('employees'));
    }


    public function create()
    {
        return view('company.pages.employee.create');
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

        $request['company_id'] = Auth::user()->id;
        $request['status'] = 1;
        $request['password'] = bcrypt($request->password);
        $company = Company::create($request->all());

        $notification=array(
            'message'=>'Employee Information Inserted Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('company.employee')->with($notification);
    }


    public function edit($id)
    {
        $company = Company::where('id',$id)->first();
        return view('company.pages.employee.edit',compact('company'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|string|email|max:50|unique:companies,email,'.$id,
            'phone'    => 'required|string|max:20',
        ],
        [
            'name.required' => 'Name field is required.',
            'email.required' => 'Email field is required.',
            'phone.required' => 'Phone field is required.',
        ]);

        $company = Company::findOrFail($id); 
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->phone = $request->input('phone');

        $company->save();

        $notification=array(
            'message'=>'Employee Information Updated Successfully.',
            'alert-type'=>'success'
        );
        return redirect()->route('company.employee')->with($notification);
    }

    public function delete($id)
    {
        $data = Company::where('id',$id)->delete();
        $notification=array(
            'message'=>'Employee Deleted Successfully.',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
