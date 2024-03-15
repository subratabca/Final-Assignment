<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewJobPublishgNotification;
use App\Models\Company;
use App\Models\Job;


class JobListController extends Controller
{
    public function index()
    {
        $datas = Job::with('company','category')->latest()->get();
        return view('backend.pages.job-list-by-company.index-page',compact('datas'));
    }


    public function view($id)
    {
        if (Auth::user()->can('jobs.update')) {
            $job = Job::with('company','category')->where('id',$id)->first();
            return view('backend.pages.job-list-by-company.view-page',compact('job'));
        }
        return redirect(route('admin.dashboard'));
    }


    public function delete($id)
    {
        $company = Job::where('id',$id)->delete();

        $notification=array(
            'message'=>'Information Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        if (Auth::user()->can('jobs.create')) {
            Job::findOrFail($id)->update(['status'=> 0]);
            $notification=array(
                'message'=>'Information Successfully Inactive',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        return redirect(route('admin.dashboard'));
    }


    public function active($id)
    {
        if (Auth::user()->can('jobs.create')) {
            Job::findOrFail($id)->update(['status'=> 1]);
            $notification=array(
                'message'=>'Job Published Successfully',
                'alert-type'=>'success'
            );

            $job = Job::where('id',$id)->first();
            $company = Company::where('id',$job->company_id)->first();

            $company_name = $company->name;
            $job_title = $job->title;

            Notification::send($company, new NewJobPublishgNotification($company_name,$job_title));
            return redirect()->back()->with($notification);
        }
        return redirect(route('admin.dashboard'));
    }


}
