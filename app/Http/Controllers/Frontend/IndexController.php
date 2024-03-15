<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommonSetting;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\Blog;

class IndexController extends Controller
{

    public function index()
    {
        $category8 = Category::latest()->limit(8)->get();
        $jobs = Job::with('company')->latest()->where('status',1)->limit(5)->get();
        $blogs = Blog::latest()->where('status',1)->get();
        return view('frontend.pages.home-page',compact('category8','jobs','blogs'));
    }


}