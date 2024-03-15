<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommonSetting;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\Blog;
use App\Models\About;

class PageController extends Controller
{

    public function aboutPage()
    {
        $about = About::first();
        return view('frontend.pages.about-page',compact('about'));

    }

    public function contactPage()
    {
        $setting = CommonSetting::first();
        return view('frontend.pages.contact-page', compact('setting'));   
    }


    public function storeContactInfo(Request $request)
    {
        $this->validate($request,[
            'name'     => 'required|string|max:50',
            'email'    => 'required|string|email|max:50|unique:contacts',
            'phone'    => 'required|string|max:20',
            'message' =>'required',
        ],
        [
            'name.required' => 'Name field is required.',
            'email.required' => 'Email field is required.',
            'phone.required' => 'Phone field is required.',
            'message.required' => 'Message field is required.',
        ]);

        $contact = Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ]);

        $notification=array(
            'message'=>'Message Send Successfully',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);  
    }



    public function jobDetailsById($id)
    {
        $job = Job::with('company','category')->where('id',$id)->where('status',1)->first();
        return view('frontend.pages.job-details-page',compact('job'));

    }

    public function blogDetailsById($id)
    {
        $blog = Blog::with('category')->where('id',$id)->where('status',1)->first();
        $categories = Category::latest()->get();
        $recentBlogs = Blog::with('category')->latest()->limit(5)->where('id', '!=', $id)->where('status',1)->get();

        $relatedBlogs = Blog::with('category')->where('id', '!=', $id)->where('category_id',$blog->category_id)->where('status',1)->get();

        return view('frontend.pages.blog-details-page',compact('blog','categories','recentBlogs','relatedBlogs'));

    }


    public function allCategories()
    {
        $categories = Category::latest()->paginate(8);
        $bannerTitle = 'All Category';
        return view('frontend.pages.list-category-page',compact('bannerTitle','categories'));
    }


    public function allJobs()
    {
        $jobs = Job::with('company','category')->where('status',1)->paginate(5);
        $bannerTitle = 'All Job Post';
        $categories = Category::with('jobs')->latest()->get();
        return view('frontend.pages.list-job-page',compact('bannerTitle','jobs','categories'));
    }

    public function jobByCategoryId($id)
    {
        $jobs = Job::with('company','category')->where('category_id',$id)->where('status',1)->paginate(5);
        $categories = Category::with('jobs')->latest()->get();
        $bannerTitle = Category::where('id',$id)->pluck('name')->first();
        return view('frontend.pages.list-job-page',compact('bannerTitle','jobs','categories'));
    }

    public function allBlogs()
    {
        $blogs = Blog::with('category')->where('status',1)->paginate(3);
        $categories = Category::with('blogs')->latest()->get();
        $bannerTitle = 'All Blog Post';
        $recentBlogs = Blog::with('category')->latest()->limit(5)->get();
        return view('frontend.pages.list-blog-page',compact('bannerTitle','blogs','categories','recentBlogs'));
    }

    public function blogByCategoryId($id)
    {
        $blogs = Blog::with('category')->where('category_id',$id)->paginate(5);
        $categories = Category::with('blogs')->latest()->get();
        $bannerTitle = Category::where('id',$id)->pluck('name')->first();
        $recentBlogs = Blog::with('category')->latest()->limit(5)->get();
        return view('frontend.pages.list-blog-page',compact('bannerTitle','blogs','categories','recentBlogs'));
    }

    public function search(Request $request)
    {
        $item = $request->search;
        $cat_id = $request->category_id;

        if($item != null){
            $jobs = Job::with('company','category')->where('title','LIKE',"%$item%")->where('status',1)->get();
            $categories = Category::latest()->get();
            $bannerTitle = $item;
            return view('frontend.pages.list-job-page',compact('bannerTitle','jobs','categories'));

        }elseif($cat_id != null){
            $jobs = Job::with('company','category')->where('category_id',$cat_id)->where('status',1)->get();
            $categories = Category::latest()->get();
            $bannerTitle = Category::where('id',$cat_id)->pluck('name')->first();
            return view('frontend.pages.list-job-page',compact('bannerTitle','jobs','categories')); 

        }else{
            $jobs = Job::with('company','category')->where('title','LIKE',"$item")->where('status',1)->get();
            $categories = Category::latest()->get();
            $bannerTitle = "";
            return view('frontend.pages.list-job-page',compact('bannerTitle','jobs','categories'));
        }

    }

}