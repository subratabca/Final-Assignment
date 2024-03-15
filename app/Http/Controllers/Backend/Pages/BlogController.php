<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Category;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $datas = Blog::all();
        return view('backend.pages.blog.index-page',compact('datas'));
    }

    public function create()
    {
        if (Auth::user()->can('blogs.create')) {
        $categories = Category::all();
        return view('backend.pages.blog.create-page',compact('categories'));
        }
        return redirect(route('admin.dashboard'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'blog_category_id' =>'required',
            'title'       =>'required',
            'description' =>'required',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ],
        [
            'blog_category_id.required' => 'The blog category field is required.',
            'title.required' => 'The title field is required.',
            'description.required' => 'The description field is required.',
            'banner_image.required' => 'Please upload banner photo.',
            'banner_image.mimes' => 'Banner photo must be jpeg,png,jpg,webp format.',
        ]);

        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $manager = new ImageManager(new Driver());
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);

            $img->resize(750,375)->save(base_path('public/upload/blog/banner/large/'.$imageName));
            $img->resize(570,324)->save(base_path('public/upload/blog/banner/medium/'.$imageName));
            $img->resize(80,80)->save(base_path('public/upload/blog/banner/small/'.$imageName));

            $uploadBannerPath = $imageName;
        }

        $blog = Blog::create([
            'blog_category_id' => $request->input('blog_category_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'banner_image' => $uploadBannerPath,
        ]);

        $notification=array(
            'message'=>'Information Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route("blogs")->with($notification); 
    }


    public function edit($id)
    {
        if (Auth::user()->can('blogs.update')) {
        $categories = Category::all();
        $editData = Blog::findOrFail($id);
        return view('backend.pages.blog.edit-page',compact('editData','categories'));
        }
        return redirect(route('admin.dashboard'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'blog_category_id' =>'required',
            'title'       =>'required',
            'description' =>'required',
            'banner_image' => 'sometimes|image|mimes:jpeg,png,jpg,webp|max:2048',
        ],
        [
            'blog_category_id.required' => 'The blog category field is required.',
            'title.required' => 'The title field is required.',
            'description.required' => 'The description field is required.',
            'banner_image.required' => 'Please upload banner photo.',
            'banner_image.mimes' => 'Banner photo must be jpeg,png,jpg,webp format.',
        ]);

        $blog = Blog::findOrFail($id);

        if($request->hasFile('banner_image')) {
            $large_banner_img_path = base_path('public/upload/blog/banner/large/');
            $medium_banner_img_path = base_path('public/upload/blog/banner/medium/');
            $small_banner_img_path = base_path('public/upload/blog/banner/small/');

            if(!empty($blog->banner_image)){
                if(file_exists($large_banner_img_path.$blog->banner_image)){
                  unlink($large_banner_img_path.$blog->banner_image);
                }
                if(file_exists($medium_banner_img_path.$blog->banner_image)){
                  unlink($medium_banner_img_path.$blog->banner_image);
                }
                if(file_exists($small_banner_img_path.$blog->banner_image)){
                  unlink($small_banner_img_path.$blog->banner_image);
                }
            }

            $image = $request->file('banner_image');
            $manager = new ImageManager(new Driver());
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);

            $img->resize(750,375)->save($large_banner_img_path.$imageName);
            $img->resize(570,324)->save($medium_banner_img_path.$imageName);
            $img->resize(80,80)->save($small_banner_img_path.$imageName);

            $uploadBannerPath = $imageName;
        }else{
            $uploadBannerPath = $blog->banner_image;
        }

        $blog = Blog::findOrFail($id)->update([
            'blog_category_id' => $request->input('blog_category_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'banner_image' => $uploadBannerPath,
        ]);

        $notification=array(
            'message'=>'Information Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('blogs')->with($notification);
    }


    public function delete($id)
    {
        $blog = Blog::findOrFail($id);

        $large_banner_img_path = base_path('public/upload/blog/banner/large/');
        $medium_banner_img_path = base_path('public/upload/blog/banner/medium/');
        $small_banner_img_path = base_path('public/upload/blog/banner/small/');

        if(!empty($blog->banner_image)){
            if(file_exists($large_banner_img_path.$blog->banner_image)){
              unlink($large_banner_img_path.$blog->banner_image);
            }
            if(file_exists($medium_banner_img_path.$blog->banner_image)){
              unlink($medium_banner_img_path.$blog->banner_image);
            }
            if(file_exists($small_banner_img_path.$blog->banner_image)){
              unlink($small_banner_img_path.$blog->banner_image);
            }
        }
        
        $blog->delete();

        $notification=array(
            'message'=>'Information Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    

    public function inactive($id){
        Blog::findOrFail($id)->update(['status'=> 0]);
        $notification=array(
            'message'=>'Information Successfully Inactive',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }


    public function active($id){
        Blog::findOrFail($id)->update(['status'=> 1]);
        $notification=array(
            'message'=>'Information Successfully Active',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }


}
