<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('categories.create')) {
            $datas = Category::all();
            return view('backend.pages.category.index-page',compact('datas'));
        }
        return redirect(route('admin.dashboard'));
    }

    public function create()
    {
        if (Auth::user()->can('categories.create')) {
            return view('backend.pages.category.create-page');
        }
        return redirect(route('admin.dashboard'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:50',
            'icon' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ],
        [
            'name.required' => 'Name field is required.',
            'icon.required' => 'Icon image field is required.',
            'icon.mimes' => 'Icon image must be jpeg,png,jpg format.',
            'banner_image.required' => 'Please upload banner photo.',
            'banner_image.mimes' => 'Banner photo must be jpeg,png,jpg format.',
        ]);

        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $manager = new ImageManager(new Driver());
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);

            $img->resize(1920,450)->save(base_path('public/upload/category/banner/medium/'.$imageName));
            $img->resize(1700,400)->save(base_path('public/upload/category/banner/small/'.$imageName));

            $uploadBannerPath = $imageName;
        }

        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $manager = new ImageManager(new Driver());
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);

            $img->resize(80,80)->save(base_path('public/upload/category/icon/medium/'.$imageName));
            $img->resize(70,80)->save(base_path('public/upload/category/icon/small/'.$imageName));

            $uploadIconPath = $imageName;
        }

        $category = Category::create([
            'name' => $request->input('name'),
            'icon' => $uploadIconPath,
            'banner_image' => $uploadBannerPath,
        ]);

        $notification=array(
            'message'=>'Information Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route("categories")->with($notification); 
    }


    public function edit($id)
    {
        if (Auth::user()->can('categories.update')) {
            $editData = Category::findOrFail($id);
            return view('backend.pages.category.edit-page',compact('editData'));
        }
        return redirect(route('admin.dashboard'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'       => 'required|string|max:50',
            'icon' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            'banner_image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ],
        [
            'name.required' => 'Name field is required.',
            'icon.required' => 'Icon image field is required.',
            'icon.mimes' => 'Icon image must be jpeg,png,jpg format.',
            'banner_image.required' => 'Please upload banner photo.',
            'banner_image.mimes' => 'Banner photo must be jpeg,png,jpg format.'
        ]);

        $category = Category::findOrFail($id);

        if($request->hasFile('banner_image')) {
            $medium_banner_img_path = base_path('public/upload/category/banner/medium/');
            $small_banner_img_path = base_path('public/upload/category/banner/small/');

            if(!empty($category->banner_image)){
                if(file_exists($medium_banner_img_path.$category->banner_image)){
                    unlink($medium_banner_img_path.$category->banner_image);
                }
                if(file_exists($small_banner_img_path.$category->banner_image)){
                    unlink($small_banner_img_path.$category->banner_image);
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
            $uploadBannerPath = $category->banner_image;
        }


        if($request->hasFile('icon')) {
            $medium_icon_img_path = base_path('public/upload/category/icon/medium/');
            $small_icon_img_path = base_path('public/upload/category/icon/small/');

            if(!empty($category->icon)){
                if(file_exists($medium_icon_img_path.$category->icon)){
                    unlink($medium_icon_img_path.$category->icon);
                }
                if(file_exists($small_icon_img_path.$category->icon)){
                    unlink($small_icon_img_path.$category->icon);
                }
            }

            $image = $request->file('icon');
            $manager = new ImageManager(new Driver());
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);

            $img->resize(80,80)->save($medium_icon_img_path.$imageName);
            $img->resize(70,80)->save($small_icon_img_path.$imageName);

            $uploadIconPath = $imageName;
        }else{
            $uploadIconPath = $category->banner_image;
        }

        $category = Category::findOrFail($id)->update([
            'name' => $request->input('name'),
            'icon' => $uploadIconPath,
            'banner_image' => $uploadBannerPath,
        ]);

        $notification=array(
            'message'=>'Information Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('categories')->with($notification);
    }


    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $medium_banner_img_path = base_path('public/upload/category/banner/medium/');
        $small_banner_img_path = base_path('public/upload/category/banner/small/');

        $medium_icon_img_path = base_path('public/upload/category/icon/medium/');
        $small_icon_img_path = base_path('public/upload/category/icon/small/');

        if(!empty($category->banner_image)){
            if(file_exists($medium_banner_img_path.$category->banner_image)){
                unlink($medium_banner_img_path.$category->banner_image);
            }
            if(file_exists($small_banner_img_path.$category->banner_image)){
                unlink($small_banner_img_path.$category->banner_image);
            }
        }

        if(!empty($category->icon)){
            if(file_exists($medium_icon_img_path.$category->icon)){
                unlink($medium_icon_img_path.$category->icon);
            }
            if(file_exists($small_icon_img_path.$category->icon)){
                unlink($small_icon_img_path.$category->icon);
            }
        }

        $category->delete();

        $notification=array(
            'message'=>'Information Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }


}
