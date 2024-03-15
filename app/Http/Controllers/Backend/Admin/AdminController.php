<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Admin;
use App\Models\Company;
use App\Models\Job;
use Session;


class AdminController extends Controller
{
    public function dashboard()
    {
        $activeCompanies = Company::latest()->where('status',1)->count();
        $pendingCompanies = Company::latest()->where('status', '!=', 1)->count();
        $jobs = Job::latest()->get();
        return view('backend.pages.dashboard.dashboard-page',compact('activeCompanies','pendingCompanies','jobs'));
    }

    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function viewAdminProfile()
    {
        $id = Auth::user()->id;
        $adminData = Admin::findOrFail($id);
        return view('backend.pages.profile.view-profile-page',compact('adminData'));
    }

    public function editAdminProfile(){
        $id = Auth::user()->id;
        $editData = Admin::findOrFail($id);
        return view('backend.pages.profile.edit-profile-page',compact('editData'));
    }

    public function updateAdminProfile(Request $request){
        $id = Auth::user()->id;

        $this->validate($request,[
            'name'     => 'required|string|max:20',
            'email'    => 'required|string|email|max:50|unique:admins,email,'.$id,
            'phone'    => 'required|string|max:20',
            'profile_image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ],
        [
            'name.required' => 'Name field is required.',
            'email.required' => 'Email field is required.',
            'phone.required' => 'Phone field is required.',
            'profile_image.mimes' => 'Image must be jpeg,png,jpg format.',
        ]);

        $admin = Admin::findOrFail($id);

        if($request->hasFile('profile_image')) {
            $banner_img_path = base_path('public/upload/admin-profile/banner/');
            $listing_img_path = base_path('public/upload/admin-profile/listing/');

            if(!empty($admin->profile_image)){
                if(file_exists($banner_img_path.$admin->profile_image)){
                  unlink($banner_img_path.$admin->profile_image);
                }
                if(file_exists($listing_img_path.$admin->profile_image)){
                  unlink($listing_img_path.$admin->profile_image);
                }
            }

            $image = $request->file('profile_image');
            $manager = new ImageManager(new Driver());
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);

            $banner_img = $img->resize(1920,200);
            $banner_img = $banner_img->save($banner_img_path.$imageName);

            $listing_img = $img->resize(152,142);
            $listing_img = $listing_img->save($listing_img_path.$imageName);

            $uploadPath = $imageName;
        }else{
            $uploadPath = $admin->profile_image;
        }

        $admin = Admin::findOrFail($id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'profile_image' => $uploadPath,
        ]);

        $notification=array(
            'message'=>'Prifule Updaed Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function changeAdminPassword(){
        return view('backend.pages.profile.change-password-page');
    }

    public function updateAdminChangePassword(Request $request){
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
            $admin = Admin::findOrFail($id)->update([
                'password' => Hash::make($request->input('password'))
            ]);

            Auth::logout();
            $notification=array(
                'message'=>'Password Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('admin.logout');
        }else{
            $notification=array(
                'message'=>'Old Password is Wrong',
                'alert-type'=>'success'
            );
            return redirect()->back();
        }
    }

}