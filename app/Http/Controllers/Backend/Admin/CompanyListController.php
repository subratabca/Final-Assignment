<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\NewCompanyRegistrationActivationMail;
use App\Mail\CompanyRegistrationDeactivationMail;
use App\Models\Company;


class CompanyListController extends Controller
{
    public function index()
    {
        $datas = Company::latest()->where('company_id',null)->get();
        return view('backend.pages.company-list.index-page',compact('datas'));
    }


    public function view($id)
    {
        if (Auth::user()->can('companies.update')) {
            $editData = Company::findOrFail($id);
            return view('backend.pages.company-list.view-page',compact('editData'));
        }
        return redirect(route('admin.dashboard'));
    }


    public function delete($id)
    {
        $company = Company::findOrFail($id);

        $banner_img_path = base_path('public/upload/company-logo/banner/');
        $listing_img_path = base_path('public/upload/company-logo/listing/');

        if(!empty($company->logo)){
            if(file_exists($banner_img_path.$company->logo)){
                unlink($banner_img_path.$company->logo);
            }
            if(file_exists($listing_img_path.$company->logo)){
                unlink($listing_img_path.$company->logo);
            }
        }

        $company->delete();

        $notification=array(
            'message'=>'Information Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        if (Auth::user()->can('companies.create')) {
            Company::findOrFail($id)->update(['status'=> 0]);
            $notification=array(
                'message'=>'Registration Deactivated Successfully',
                'alert-type'=>'success'
            );

            $company = Company::where('id',$id)->first();
            $company_name = $company->name;
            $company_email = $company->email;

            Mail::to($company_email)->send(new CompanyRegistrationDeactivationMail($company_name,$company_email));
            return redirect()->back()->with($notification);
        }
        return redirect(route('admin.dashboard'));
    }


    public function active($id)
    {
        if (Auth::user()->can('companies.update')) {
            $company = Company::findOrFail($id)->update(['status'=> 1]);
            $notification=array(
                'message'=>'Registration Successfully Activated',
                'alert-type'=>'success'
            );
            $company = Company::where('id',$id)->first();
            $company_name = $company->name;
            $company_email = $company->email;

            Mail::to($company_email)->send(new NewCompanyRegistrationActivationMail($company_name,$company_email));
            return redirect()->back()->with($notification);
        }
        return redirect(route('admin.dashboard'));
    }


}
