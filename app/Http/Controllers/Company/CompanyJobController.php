<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewJobPostingNotification;
use App\Models\Admin;
use App\Models\Company;
use App\Models\Category;
use App\Models\Job;


class CompanyJobController extends Controller
{
    public function index()
    {
        $company_id = Auth::user()->id;
        $datas = Job::with('company','category','job_applications')->where('company_id',$company_id)->get();
        return view('company.pages.job.index-page',compact('datas'));
    }

    public function create(){
        $categories = Category::all();
        return view('company.pages.job.create-page',compact('categories'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'title'       =>'required|string|max:200',
            'category_id'       => 'required',
            'vacancy'       => 'required|string|max:10',
            'deadline'       => 'required|string|max:50',
            'education'       => 'required|string|max:200',
            'job_nature'       => 'required|string|max:100',
            'skills'       => 'required|string|max:100',
            'job_type'       => 'required|string|max:100',
            'salary'       => 'required|string|max:100',

            'address'       => 'required|string|max:200',
            'city'       => 'required|string|max:100',
            'country'       => 'required|string|max:100',
            'zip_code'       => 'required|string|max:100',

            'requirements'        => 'required',
            'responsibility' => 'required',
            'benefits' => 'required',
            'company_description' => 'required',
            
        ],
        [
            'title.required' => 'Title field is required.',
            'title.max' => 'Title should be maximum 100 characters.',
            'category_id.required' => 'Category field is required.',
            'vacancy.required' => 'Vacancy field is required.',
            'deadline.required' => 'Deadline field is required.',
            'education.required' => 'Education field is required.',
            'job_nature.required' => 'Job nature field is required.',
            'job_type.required' => 'Job type field is required.',
            'salary.required' => 'Salary field is required.',
            'skills.required' => 'Skills field is required.',

            'address'       => 'Address field is required.',
            'city'       => 'City field is required.',
            'country'       => 'Country field is required.',
            'zip_code'       => 'Zip code field is required.',

            'requirements.required' => 'The requirements field is required.',
            'responsibility.required' => 'The responsibility field is required.',
            'benefits.required' => 'The benefits field is required.',
            'company_description.required' => 'Company description field is required.',
        ]);

        $company_id = Auth::user()->id;

        $job = Job::create([
            'company_id' => $company_id ,
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'vacancy' => $request->input('vacancy'),
            'deadline' => $request->input('deadline'),
            'education' => $request->input('education'),
            'job_nature' => $request->input('job_nature'),
            'skills' => $request->input('skills'),
            'job_type' => $request->input('job_type'),
            'salary' => $request->input('salary'),

            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'zip_code' => $request->input('zip_code'),

            'description' => $request->input('description'),
            'requirements' => $request->input('requirements'),
            'responsibility' => $request->input('responsibility'),
            'benefits' => $request->input('benefits'),
            'company_description' => $request->input('company_description'),
        ]);

        $notification=array(
            'message'=>'Job Posted Successfully',
            'alert-type'=>'success'
        );

        $company_name = Company::where('id',$company_id )->pluck('name')->first();
        $job_title = $request->input('title');

        $admin = Admin::where('id',1)->first();

        Notification::send($admin, new NewJobPostingNotification($company_name,$job_title));
        return redirect()->route("jobs")->with('success','Job posted successfully, You will get notification after job publish.');
    }


    public function view($id)
    {
        $job = Job::with('company','category')->where('id',$id)->first();
        return view('company.pages.job.view-page',compact('job'));
    }


    public function edit($id)
    {
        $categories = Category::all();
        $editData = Job::findOrFail($id);
        return view('company.pages.job.edit-page',compact('editData','categories'));
    }


    public function update(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'title'       =>'required|string|max:200',
            'category_id'       => 'required',
            'vacancy'       => 'required|string|max:10',
            'deadline'       => 'required|string|max:50',
            'education'       => 'required|string|max:200',
            'job_nature'       => 'required|string|max:100',
            'skills'       => 'required|string|max:100',
            'job_type'       => 'required|string|max:100',
            'salary'       => 'required|string|max:100',

            'address'       => 'required|string|max:200',
            'city'       => 'required|string|max:100',
            'country'       => 'required|string|max:100',
            'zip_code'       => 'required|string|max:100',

            'requirements'        => 'required',
            'responsibility' => 'required',
            'benefits' => 'required',
            'company_description' => 'required',
        ],
        [
            'title.required' => 'Title field is required.',
            'title.max' => 'Title should be maximum 100 characters.',
            'category_id.required' => 'Category field is required.',
            'vacancy.required' => 'Vacancy field is required.',
            'deadline.required' => 'Deadline field is required.',
            'education.required' => 'Education field is required.',
            'job_nature.required' => 'Job nature field is required.',
            'job_type.required' => 'Job type field is required.',
            'salary.required' => 'Salary field is required.',
            'skills.required' => 'Skills field is required.',

            'address'       => 'Address field is required.',
            'city'       => 'City field is required.',
            'country'       => 'Country field is required.',
            'zip_code'       => 'Zip code field is required.',

            'requirements.required' => 'The requirements field is required.',
            'responsibility.required' => 'The responsibility field is required.',
            'benefits.required' => 'The benefits field is required.',
            'company_description.required' => 'Company description field is required.',
        ]);

        $category_id = $request->input('category_id');

        $job = Job::findOrFail($id); 
        $job->category_id = $category_id;
        $job->title = $request->input('title');
        $job->vacancy = $request->input('vacancy');
        $job->deadline = $request->input('deadline');
        $job->education = $request->input('education');
        $job->job_nature = $request->input('job_nature');
        $job->skills = $request->input('skills');
        $job->job_type = $request->input('job_type');
        $job->salary = $request->input('salary');

        $job->address = $request->input('address');
        $job->city = $request->input('city');
        $job->country = $request->input('country');
        $job->zip_code = $request->input('zip_code');


        $job->description = $request->input('description');
        $job->requirements = $request->input('requirements');
        $job->responsibility = $request->input('responsibility');
        $job->benefits = $request->input('benefits');
        $job->company_description = $request->input('company_description');

        $updated = $job->save();

        // Check if the update was successful
        if ($updated) {
            $notification = [
                'message' => 'Information Updated Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route('jobs')->with($notification);
        } else {
            $notification = [
                'message' => 'Failed to Update Information',
                'alert-type' => 'error',
            ];
            return redirect()->back()->with($notification);
        }

    }


    public function delete($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        $notification=array(
            'message'=>'Information Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }


}
