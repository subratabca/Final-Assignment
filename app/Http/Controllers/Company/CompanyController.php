<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Company;
use App\Models\JobApplication;
use App\Models\Job;
use Session;


class CompanyController extends Controller
{

    public function dashboard()
    {

        $company = Company::where('id', auth()->user()->id)->where('company_id',null)->first();

        if(!empty($company)){
            $company_id = Auth::user()->id;
        }else{
           $company_id = Auth::user()->company_id; 
           //dd($company_id);
        }

        $jobPostCount = Job::where('id',$company_id)->count();
        $employeeCount = Company::where('company_id',$company_id)->count();
        //dd($employeeCount);
        return view('company.pages.dashboard.dashboard-page',compact('jobPostCount','employeeCount'));
    }

    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('company.login');
    }

    public function viewCompanyProfile()
    {
        $id = Auth::user()->id;
        $companyData = Company::findOrFail($id);
        return view('company.pages.profile.view-profile-page',compact('companyData'));
    }

    public function editCompanyProfile(){
        $id = Auth::user()->id;
        $editData = Company::findOrFail($id);
        return view('company.pages.profile.edit-profile-page',compact('editData'));
    }

    public function updateCompanyProfile(Request $request){
        $id = Auth::user()->id;

        $this->validate($request,[
            'name'     => 'required|string|max:100',
            'email'    => 'required|string|email|max:50|unique:companies,email,'.$id,
            'phone'    => 'required|string|max:20',
            'address'    => 'required|string|max:200',
            'logo' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ],
        [
            'name.required' => 'Name field is required.',
            'email.required' => 'Email field is required.',
            'phone.required' => 'Phone field is required.',
            'address.required' => 'Address field is required.',
            'logo.mimes' => 'Image must be jpeg,png,jpg format.',
        ]);

        $company = Company::findOrFail($id);

        if($request->hasFile('logo')) {
            $small_img_path = base_path('public/upload/company/logo/small/');
            $medium_img_path = base_path('public/upload/company/logo/medium/');


            if(!empty($company->logo)){
                if(file_exists($small_img_path.$company->logo)){
                  unlink($small_img_path.$company->logo);
                }
                if(file_exists($medium_img_path.$company->logo)){
                  unlink($medium_img_path.$company->logo);
                }
            }

            $image = $request->file('logo');
            $manager = new ImageManager(new Driver());
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);

            $img->resize(85,85)->save($small_img_path.$imageName);
            $img->resize(200,200)->save($medium_img_path.$imageName);

            $uploadPath = $imageName;
        }else{
            $uploadPath = $company->logo;
        };

        $company = Company::findOrFail($id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'logo' => $uploadPath,
        ]);

        $notification=array(
            'message'=>'Information Updaed Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function changeCompanyPassword(){
        return view('company.pages.profile.change-password-page');
    }

    public function updateCompanyPassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ],
        [
            'oldpassword.required' => 'Password field is required.',
            'password.min' => 'Password should be min 6 characters',
            'password.confirmed' => 'Password & Confirm Password does not match.',
        ]);

        $id = Auth::Id();
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)) {
            $company = Company::findOrFail($id)->update([
                'password' => Hash::make($request->input('password'))
            ]);

            Auth::logout();
            $notification=array(
                'message'=>'Password Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('company.logout');
        }else{
            $notification=array(
                'message'=>'Old Password is Wrong',
                'alert-type'=>'success'
            );
            return redirect()->back();
        }
    }


    public function candidateJobList(Request $request)
    {
        $company_id = Auth::user()->id;
        $jobs = JobApplication::with('user','job')->latest()->where('company_id',$company_id)->get();
        //dd($jobs);
        return view('company.pages.dashboard.candidate-job-list-page',compact('jobs'));
    }


    public function candidateJobDetails($id)
    {
        $data = JobApplication::with('user','job')->where('id',$id)->first();
        return view('company.pages.dashboard.candidate-job-detail-page',compact('data'));
    }

    public function deleteCandidateJobList($id)
    {
        $data = JobApplication::where('id',$id)->delete();
        $notification=array(
            'message'=>'Job Application Deleted Successfully.',
            'alert-type'=>'success'
        );
        return redirect()->back();
    }


}