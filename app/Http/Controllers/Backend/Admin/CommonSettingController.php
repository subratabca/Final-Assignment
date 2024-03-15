<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CommonSetting;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class CommonSettingController extends Controller
{
    public function index()
    {
        $datas = CommonSetting::all();
        return view('backend.pages.common-setting.index-page',compact('datas'));
    }

    public function create()
    {
        if (Auth::user()->can('settings.create')) {
            return view('backend.pages.common-setting.create-page');
        }
        return redirect(route('admin.dashboard'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        =>'required|string|max:50|unique:companies',
            'title'       =>'required|string|max:50',
            'email'       => 'required|string|email|max:50|unique:companies',
            'phone1'       => 'required|string|max:20',
            'phone2'       => 'required|string|max:20',
            'address'       => 'required|string|max:50',
            'description' =>'required',
            'logo'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'cover_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ],
        [
            'name.required' => 'The name field is required.',
            'title.required' => 'The title field is required.',
            'title.max' => 'Title should be maximum 50 characters.',
            'email.required' => 'The email field is required.',
            'phone1.required' => 'The phone field is required.',
            'phone2.required' => 'The phone field is required.',
            'address.required' => 'The address field is required.',
            'description.required' => 'The description field is required.',
            'description.min' => 'The description should be minimum 10 characters.',
            'description.max' => 'The description should be maximum 500 characters.',
            'logo.required' => 'Please upload logo.',
            'logo.mimes' => 'Logo must be jpeg,png,jpg format.',
            'cover_photo.required' => 'Please upload cover photo.',
            'cover_photo.mimes' => 'Cover photo must be jpeg,png,jpg format.',
        ]);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $manager = new ImageManager(new Driver());
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);

            $img->resize(150,80)->save(base_path('public/upload/common-setting/logo/small/'.$imageName));
            $img->resize(200,150)->save(base_path('public/upload/common-setting/logo/medium/'.$imageName));

            $uploadLogoPath = $imageName;
        }


        if ($request->hasFile('cover_photo')) {
            $image = $request->file('cover_photo');
            $manager = new ImageManager(new Driver());
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);

            $img->resize(1700,250)->save(base_path('public/upload/common-setting/cover_photo/small/'.$imageName));
            $img->resize(1920,200)->save(base_path('public/upload/common-setting/cover_photo/medium/'.$imageName));

            $uploadCoverPath = $imageName;
        }

        $setting = CommonSetting::create([
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'email' => $request->input('email'),
            'phone1' => $request->input('phone1'),
            'phone2' => $request->input('phone2'),
            'address' => $request->input('address'),
            'description' => $request->input('description'),
            'logo' => $uploadLogoPath,
            'cover_photo' => $uploadCoverPath,
        ]);

        $notification=array(
            'message'=>'Information Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route("setting")->with($notification); 
    }


    public function edit($id)
    {
        if (Auth::user()->can('settings.update')) {
            $editData = CommonSetting::findOrFail($id);
            return view('backend.pages.common-setting.edit-page',compact('editData'));
        }
        return redirect(route('admin.dashboard'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        =>'required|string|max:50|unique:companies,name,'.$request->id,
            'title'       =>'required|string|max:50',
            'email'       => 'required|string|email|max:50|unique:companies,email,'.$request->id,
            'phone1'       => 'required|string|max:20',
            'phone2'       => 'required|string|max:20',
            'address'       => 'required|string|max:50',
            'description' =>'required',
            'logo'        => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            'cover_photo' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ],
        [
            'name.required' => 'Name field is required.',
            'title.required' => 'Title field is required.',
            'title.max' => 'Title should be maximum 50 characters.',
            'email.required' => 'Email field is required.',
            'phone1.required' => 'The phone field is required.',
            'phone2.required' => 'The phone field is required.',
            'address.required' => 'The address field is required.',
            'description.required' => 'Description field is required.',
            'description.min' => 'Description should be minimum 10 characters.',
            'description.max' => 'Description should be maximum 500 characters.',
            'logo.required' => 'Please upload logo.',
            'logo.mimes' => 'Logo must be jpeg,png,jpg format.',
            'cover_photo.required' => 'Please upload cover photo.',
            'cover_photo.mimes' => 'Cover photo must be jpeg,png,jpg format.',
        ]);

        $setting = CommonSetting::findOrFail($id);

        if($request->hasFile('logo')) {
            $small_logo_path = base_path('public/upload/common-setting/logo/small/');
            $medium_logo_path = base_path('public/upload/common-setting/logo/medium/');

            if(!empty($setting->logo)){
                if(file_exists($small_logo_path.$setting->logo)){
                    unlink($small_logo_path.$setting->logo);
                }
                if(file_exists($medium_logo_path.$setting->logo)){
                    unlink($medium_logo_path.$setting->logo);
                }
            }

            $image = $request->file('logo');
            $manager = new ImageManager(new Driver());
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);

            $img->resize(150,80)->save($small_logo_path.$imageName);
            $img->resize(200,150)->save($medium_logo_path.$imageName);

            $uploadLogoPath = $imageName;
        }else{
            $uploadLogoPath = $setting->logo;
        }

        if($request->hasFile('cover_photo')) {
            $small_banner_path = base_path('public/upload/common-setting/cover_photo/small/');
            $medium_banner_path = base_path('public/upload/common-setting/cover_photo/medium/');

            if(!empty($setting->cover_photo)){
                if(file_exists($small_banner_path.$setting->cover_photo)){
                    unlink($small_banner_path.$setting->cover_photo);
                }
                if(file_exists($medium_banner_path.$setting->cover_photo)){
                    unlink($medium_banner_path.$setting->cover_photo);
                }
            }

            $image = $request->file('cover_photo');
            $manager = new ImageManager(new Driver());
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);

            $img->resize(1700,250)->save($small_banner_path.$imageName);
            $img->resize(1920,200)->save($medium_banner_path.$imageName);

            $uploadCoverPath = $imageName;
        }else{
            $uploadCoverPath = $setting->cover_photo;
        }

        $setting = CommonSetting::findOrFail($id)->update([
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'email' => $request->input('email'),
            'phone1' => $request->input('phone1'),
            'phone2' => $request->input('phone2'),
            'address' => $request->input('address'),
            'description' => $request->input('description'),
            'logo' => $uploadLogoPath,
            'cover_photo' => $uploadCoverPath,
        ]);

        $notification=array(
            'message'=>'Information Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('setting')->with($notification);
    }


    public function delete($id)
    {
        $setting = CommonSetting::findOrFail($id);

        $small_logo_path = base_path('public/upload/common-setting/logo/small/');
        $medium_logo_path = base_path('public/upload/common-setting/logo/medium/');

        if(!empty($setting->logo)){
            if(file_exists($small_logo_path.$setting->logo)){
                unlink($small_logo_path.$setting->logo);
            }
            if(file_exists($medium_logo_path.$setting->logo)){
                unlink($medium_logo_path.$setting->logo);
            }
        }

        $small_banner_path = base_path('public/upload/common-setting/cover_photo/small/');
        $medium_banner_path = base_path('public/upload/common-setting/cover_photo/medium/');

        if(!empty($setting->cover_photo)){
            if(file_exists($small_banner_path.$setting->cover_photo)){
                unlink($small_banner_path.$setting->cover_photo);
            }
            if(file_exists($medium_banner_path.$setting->cover_photo)){
                unlink($medium_banner_path.$setting->cover_photo);
            }
        }

        $setting->delete();

        $notification=array(
            'message'=>'Information Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }


}
