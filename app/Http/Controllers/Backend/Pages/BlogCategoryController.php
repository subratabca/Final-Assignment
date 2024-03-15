<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $datas = BlogCategory::all();
        return view('backend.pages.blog-category.index-page',compact('datas'));
    }

    public function create(){
        return view('backend.pages.blog-category.create-page');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       =>'required',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ],
        [
            'name.required' => 'The name field is required.',
            'banner_image.required' => 'Please upload banner photo.',
            'banner_image.mimes' => 'Banner photo must be jpeg,png,jpg,webp format.',
        ]);

        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $manager = new ImageManager(new Driver());
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);

            $img->resize(1920,450)->save(base_path('public/upload/blog-category/banner/medium/'.$imageName));
            $img->resize(1700,400)->save(base_path('public/upload/blog-category/banner/small/'.$imageName));

            $uploadBannerPath = $imageName;
        }

        $category = BlogCategory::create([
            'name' => $request->input('name'),
            'banner_image' => $uploadBannerPath,
        ]);

        $notification=array(
            'message'=>'Information Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route("blog.categories")->with($notification); 
    }


    public function edit($id)
    {
        $editData = BlogCategory::findOrFail($id);
        return view('backend.pages.blog-category.edit-page',compact('editData'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        =>'required',
            'banner_image' => 'sometimes|image|mimes:jpeg,png,jpg,webp|max:2048',
        ],
        [
            'name.required' => 'The description field is required.',
            'banner_image.required' => 'Please upload banner photo.',
            'banner_image.mimes' => 'Banner photo must be jpeg,png,jpg,webp format.'
        ]);

        $category = BlogCategory::findOrFail($id);

        if($request->hasFile('banner_image')) {
            $medium_banner_img_path = base_path('public/upload/blog-category/banner/medium/');
            $small_banner_img_path = base_path('public/upload/blog-category/banner/small/');

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

        $category = BlogCategory::findOrFail($id)->update([
            'name' => $request->input('name'),
            'banner_image' => $uploadBannerPath,
        ]);

        $notification=array(
            'message'=>'Information Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('blog.categories')->with($notification);
    }


    public function delete($id)
    {
        $category = BlogCategory::findOrFail($id);

        $medium_banner_img_path = base_path('public/upload/blog-category/banner/medium/');
        $small_banner_img_path = base_path('public/upload/blog-category/banner/small/');

        if(!empty($category->banner_image)){
            if(file_exists($medium_banner_img_path.$category->banner_image)){
              unlink($medium_banner_img_path.$category->banner_image);
            }
            if(file_exists($small_banner_img_path.$category->banner_image)){
              unlink($small_banner_img_path.$category->banner_image);
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
