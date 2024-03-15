<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $datas = About::all();
        return view('backend.pages.about.index-page',compact('datas'));
    }

    public function create()
    {
        if (Auth::user()->can('abouts.create')) {
            return view('backend.pages.about.create-page');
        }
        return redirect(route('admin.dashboard'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:200',
            'history'        =>'required',
            'vision'       =>'required',
            'image'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ],
        [
            'title.required' => 'Title field is required.',
            'history.required' => 'The description field is required.',
            'vision.required' => 'The vision field is required.',

            'image.required' => 'Please upload image.',
            'image.mimes' => 'Logo must be jpeg,png,jpg format.',
            'banner_image.required' => 'Please upload banner photo.',
            'banner_image.mimes' => 'Banner photo must be jpeg,png,jpg format.',
        ]);

        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $manager = new ImageManager(new Driver());
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);

            $img->resize(1920,450)->save(base_path('public/upload/about/banner/medium/'.$imageName));
            $img->resize(1700,400)->save(base_path('public/upload/about/banner/small/'.$imageName));

            $uploadBannerPath = $imageName;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);

            $img->resize(530,731)->save(base_path('public/upload/about/image/medium/'.$imageName));
            $img->resize(400,500)->save(base_path('public/upload/about/image/small/'.$imageName));

            $uploadImagePath = $imageName;
        }

        $about = About::create([
            'title' => $request->input('title'),
            'history' => $request->input('history'),
            'vision' => $request->input('vision'),
            'image' => $uploadImagePath,
            'banner_image' => $uploadBannerPath,
        ]);

        $notification=array(
            'message'=>'Information Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route("about")->with($notification); 
    }


    public function edit($id)
    {
        if (Auth::user()->can('abouts.update')) {
            $editData = About::findOrFail($id);
            return view('backend.pages.about.edit-page',compact('editData'));
        }
        return redirect(route('admin.dashboard'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:200',
            'history'        =>'required',
            'vision'       =>'required',
            'image'        => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            'banner_image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ],
        [
            'title.required' => 'Title field is required.',
            'history.required' => 'The description field is required.',
            'vision.required' => 'The vision field is required.',
            'image.required' => 'Please upload image.',
            'image.mimes' => 'Logo must be jpeg,png,jpg format.',
            'banner_image.required' => 'Please upload banner photo.',
            'banner_image.mimes' => 'Banner photo must be jpeg,png,jpg format.'
        ]);

        $about = About::findOrFail($id);

        if($request->hasFile('banner_image')) {
            $medium_banner_img_path = base_path('public/upload/about/banner/medium/');
            $small_banner_img_path = base_path('public/upload/about/banner/small/');

            if(!empty($about->banner_image)){
                if(file_exists($medium_banner_img_path.$about->banner_image)){
                    unlink($medium_banner_img_path.$about->banner_image);
                }
                if(file_exists($small_banner_img_path.$about->banner_image)){
                    unlink($small_banner_img_path.$about->banner_image);
                }
            }

            $image = $request->file('banner_image');
            $manager = new ImageManager(new Driver());
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);

            $img->resize(1920,450)->save($medium_banner_img_path.$imageName);
            $img->resize(1700,400)->save($small_banner_img_path.$imageName);

            $uploadBannerPath = $imageName;
        }else{
            $uploadBannerPath = $about->banner_image;
        }


        if($request->hasFile('image')) {
            $medium_img_path = base_path('public/upload/about/image/medium/');
            $small_img_path = base_path('public/upload/about/image/small/');

            if(!empty($about->image)){
                if(file_exists($medium_img_path.$about->image)){
                    unlink($medium_img_path.$about->image);
                }
                if(file_exists($small_img_path.$about->image)){
                    unlink($small_img_path.$about->image);
                }
            }

            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);

            $img->resize(530,731)->save($medium_img_path.$imageName);
            $img->resize(400,500)->save($small_img_path.$imageName);

            $uploadImagePath = $imageName;
        }else{
            $uploadImagePath = $about->image;
        }

        $about = About::findOrFail($id)->update([
            'title' => $request->input('title'),
            'history' => $request->input('history'),
            'vision' => $request->input('vision'),
            'image' => $uploadImagePath,
            'banner_image' => $uploadBannerPath,
        ]);

        $notification=array(
            'message'=>'Information Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('about')->with($notification);
    }


    public function delete($id)
    {
        $about = About::findOrFail($id);

        $medium_banner_img_path = base_path('public/upload/about/banner/medium/');
        $small_banner_img_path = base_path('public/upload/about/banner/small/');

        if(!empty($about->banner_image)){
            if(file_exists($medium_banner_img_path.$about->banner_image)){
                unlink($medium_banner_img_path.$about->banner_image);
            }
            if(file_exists($small_banner_img_path.$about->banner_image)){
                unlink($small_banner_img_path.$about->banner_image);
            }
        }


        $medium_img_path = base_path('public/upload/about/image/medium/');
        $small_img_path = base_path('public/upload/about/image/small/');

        if(!empty($about->image)){
            if(file_exists($medium_img_path.$about->image)){
                unlink($medium_img_path.$about->image);
            }
            if(file_exists($small_img_path.$about->image)){
                unlink($small_img_path.$about->image);
            }
        }

        $about->delete();

        $notification=array(
            'message'=>'Information Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }


}
