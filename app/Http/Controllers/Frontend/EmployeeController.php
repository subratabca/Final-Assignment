<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\User;
use App\Models\Resume;
use App\Models\Education;
use App\Models\Training;
use App\Models\JobExperience;
use Session;


class EmployeeController extends Controller
{
    public function viewUserProfile()
    {
        $id = Auth::user()->id;
        $userData = User::findOrFail($id);
        return view('frontend.pages.dashboard.profile.view-profile-page',compact('userData'));
    }

    public function editUserProfile()
    {
        $id = Auth::user()->id;
        $editData = User::findOrFail($id);
        return view('frontend.pages.dashboard.profile.edit-profile-page',compact('editData'));
    }

    public function updateUserProfile(Request $request)
    {
        $id = Auth::user()->id;

        $this->validate($request,[
            'name'     => 'required|string|max:20',
            'email'    => 'required|string|email|max:50|unique:users,email,'.$id,
            'phone'    => 'required|string|max:20',
            'profile_image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ],
        [
            'name.required' => 'Name field is required.',
            'email.required' => 'Email field is required.',
            'phone.required' => 'Phone field is required.',
            'profile_image.mimes' => 'Image must be jpeg,png,jpg format.',
        ]);

        $user = User::findOrFail($id);

        if($request->hasFile('profile_image')) {
            $small_img_path = base_path('public/upload/user-profile/small/');
            $medium_img_path = base_path('public/upload/user-profile/medium/');

            if(!empty($user->profile_image)){
                if(file_exists($small_img_path.$user->profile_image)){
                  unlink($small_img_path.$user->profile_image);
                }
                if(file_exists($medium_img_path.$user->profile_image)){
                  unlink($medium_img_path.$user->profile_image);
                }
            }

            $image = $request->file('profile_image');
            $manager = new ImageManager(new Driver());
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);

            $img->resize(85,85)->save($small_img_path.$imageName);
            $img->resize(152,142)->save($medium_img_path.$imageName);

            $uploadPath = $imageName;
        }else{
            $uploadPath = $user->profile_image;
        }

        $user = User::findOrFail($id)->update([
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


    public function changeUserPassword()
    {
        return view('frontend.pages.dashboard.profile.change-password-page');
    }


    public function updateUserChangePassword(Request $request)
    {
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
            $user = User::findOrFail($id)->update([
                'password' => Hash::make($request->input('password'))
            ]);

            Auth::logout();
            $notification=array(
                'message'=>'Password Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('logout');
        }else{
            $notification=array(
                'message'=>'Old Password is Wrong',
                'alert-type'=>'success'
            );
            return redirect()->back();
        }
    }


    public function viewProfileDetails()
    {
        $id = Auth::user()->id;
        $profile = Resume::with('educations','trainings','job_experiences')->where('id',$id)->first();
        //dd($editData);
        return view('frontend.pages.dashboard.profile.view-profile-details-page',compact('profile'));
    }

}