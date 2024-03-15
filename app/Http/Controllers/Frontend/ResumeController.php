<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Resume;
use App\Models\Education;
use App\Models\Training;
use App\Models\JobExperience;


class ResumeController extends Controller
{
    public function index()
    {
        $datas = Resume::all();
        return view('frontend.pages.dashboard.resume.index-page',compact('datas'));
    }

    public function create(){
        return view('frontend.pages.dashboard.resume.create-page');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name'        =>'required|string|max:50',
            'fathers_name'       =>'required|string|max:50',
            'mothers_name'       =>'required|string|max:50',
            'email'       => 'required|string|email|max:50|unique:resumes',
            'dob'       => 'required|string|max:20',
            'present_address'       => 'required|string|max:255',
            'permanent_address'       => 'required|string|max:255',
            'blood_group' => 'required|string|max:50',
            'nid'       => 'required|string|max:50',
            'passport'       => 'required|string|max:50',
            'phone'       => 'required|string|max:20',
            'emergency_contact_no'       => 'required|string|max:50',
            'emergency_contact_no'       => 'required|string|max:50',
            'carrer_objective' =>'required',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',

            'present_salary'       => 'required|string|max:20',
            'expected_salary'       => 'required|string|max:20',
            'skills'       => 'required|string|max:50',
            'hobbies' => 'required|string|max:50',

            'whatsapp'       => 'required|string|max:50',
            'linkedin'       => 'required|string|max:50',
            'facebook' => 'required|string|max:50',
            'github'       => 'required|string|max:50',
            'behance'       => 'required|string|max:50',
            'portfolio_website'       => 'required|string|max:50',

            'degree.*' => 'required_with:institute.*,department.*,passing_year.*,result.*|string|max:255',
            'institute.*' => 'required_with:degree.*|string|max:255',
            'department.*' => 'required_with:degree.*|string|max:255',
            'passing_year.*' => 'required_with:degree.*|integer|digits:4|min:1900|max:' . date('Y'),
            'result.*' => 'required_with:degree.*|string|max:255',

            'organization.*' => 'required_with:subject.*,duration.*,completion_year.*|string|max:255',
            'subject.*' => 'required_with:organization.*|string|max:255',
            'duration.*' => 'required_with:organization.*|string|max:255',
            'completion_year.*' => 'required_with:organization.*|integer|digits:4|min:1900|max:' . date('Y'),

            'company_name.*' => 'required_with:designation.*,joining_date.*,departure_date.*|string|max:255',
            'designation.*' => 'required_with:company_name.*|string|max:255',
            'joining_date.*' => 'required_with:company_name.*|date',
            'departure_date.*' => 'required_with:company_name.*|date|after_or_equal:joining_date.*',
        
        ],[
            'profile_picture.required' => 'profile picture is required.',
            'profile_picture.image' => 'profile picture must be an image.',
            'profile_picture.mimes' => 'profile picture must be a file of type: jpeg, png, jpg, gif.',
            'profile_picture.max' => 'profile picture may not be greater than 2048 kilobytes.',

            'degree.*.required_with' => 'If providing a degree, all other fields are required.',
            'institute.*.required_with' => 'If providing an institute, a degree is required.',
            'department.*.required_with' => 'If providing a department, a degree is required.',
            'passing_year.*.required_with' => 'If providing a passing year, a degree is required.',
            'result.*.required_with' => 'If providing a result, a degree is required.',

            'organization.*.required_with' => 'If providing an organization name, all other fields are required.',
            'subject.*.required_with' => 'If providing a subject name, an organization name is required.',
            'duration.*.required_with' => 'If providing a course duration, an organization name is required.',
            'completion_year.*.required_with' => 'If providing a completion year, an organization name is required.',

            'company_name.*.required_with' => 'If providing a company name, all other fields are required.',
            'designation.*.required_with' => 'If providing a designation, a company name is required.',
            'joining_date.*.required_with' => 'If providing a joining date, a company name is required.',
            'departure_date.*.required_with' => 'If providing a departure date, a company name is required and must be after or equal to the joining date.'


        ]);

        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('upload/resume'), $imageName);
            $uploadPathProfilePicture  = 'upload/resume/'.$imageName;
        }

        $resume = Resume::create([
            'name' => $request->input('name'),
            'fathers_name' => $request->input('fathers_name'),
            'mothers_name' => $request->input('mothers_name'),
            'email' => $request->input('email'),
            'dob' => $request->input('dob'),
            'present_address' => $request->input('present_address'),
            'permanent_address' => $request->input('permanent_address'),
            'blood_group' => $request->input('blood_group'),
            'nid' => $request->input('nid'),
            'passport' => $request->input('passport'),
            'phone' => $request->input('phone'),
            'emergency_contact_no' => $request->input('emergency_contact_no'),
            'carrer_objective' => $request->input('carrer_objective'),
            'profile_picture' => $uploadPathProfilePicture ,

            'present_salary' => $request->input('present_salary'),
            'expected_salary' => $request->input('expected_salary'),
            'skills' => $request->input('skills'),
            'hobbies' => $request->input('hobbies'),

            'whatsapp' => $request->input('whatsapp'),
            'linkedin' => $request->input('linkedin'),
            'facebook' => $request->input('facebook'),
            'github' => $request->input('github'),
            'behance' => $request->input('behance'),
            'portfolio_website' => $request->input('portfolio_website'),
        ]);

            $resumeId = $resume->id;

            $degreeNames = $request->input('degree');
            $instituteNames = $request->input('institute');
            $departmentNames = $request->input('department');
            $passingYearNames = $request->input('passing_year');
            $resultNames = $request->input('result');

            foreach ($degreeNames as $key => $degreeName) {
                Education::create([
                    'resume_id' => $resumeId,
                    'degree' => $degreeName,
                    'institute' => $instituteNames[$key],
                    'department' => $departmentNames[$key],
                    'passing_year' => $passingYearNames[$key],
                    'result' => $resultNames[$key],
                ]);
            }


            $organizationNames = $request->input('organization');
            $subjectNames = $request->input('subject');
            $durationNames = $request->input('duration');
            $completionYearNames = $request->input('completion_year');

            foreach ($organizationNames as $key => $organizationName) {
                Training::create([
                    'resume_id' => $resumeId,
                    'organization' => $organizationName,
                    'subject' => $subjectNames[$key],
                    'duration' => $durationNames[$key],
                    'completion_year' => $completionYearNames[$key],
                ]);
            }

            $companyNames = $request->input('company_name');
            $designationNames = $request->input('designation');
            $joiningDates = $request->input('joining_date');
            $departureDates = $request->input('departure_date');

            foreach ($companyNames as $key => $companyName) {
                JobExperience::create([
                    'resume_id' => $resumeId,
                    'company_name' => $companyName,
                    'designation' => $designationNames[$key],
                    'joining_date' => $joiningDates[$key],
                    'departure_date' => $departureDates[$key]
                ]);
            }

        $notification=array(
            'message'=>'Information Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back('')->with($notification); 
    }


    public function edit($id)
    {
        $editData = Resume::with('educations','trainings','job_experiences')->where('id',$id)->first();
        //dd($editData);
        return view('frontend.pages.dashboard.resume.edit-page',compact('editData'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:50',
            'fathers_name'       =>'required|string|max:50',
            'mothers_name'       =>'required|string|max:50',
            'email'       => 'required|string|email|max:50|unique:resumes,email,'.$request->id,
            'dob'       => 'required|string|max:20',
            'present_address'       => 'required|string|max:255',
            'permanent_address'       => 'required|string|max:255',
            'blood_group' => 'required|string|max:50',
            'nid'       => 'required|string|max:50',
            'passport'       => 'required|string|max:50',
            'phone'       => 'required|string|max:20',
            'emergency_contact_no'       => 'required|string|max:50',
            'carrer_objective' => 'required',
            'profile_picture' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',

            'present_salary'       => 'required|string|max:20',
            'expected_salary'       => 'required|string|max:20',
            'skills'       => 'required|string|max:50',
            'hobbies' => 'required|string|max:50',

            'whatsapp'       => 'required|string|max:50',
            'linkedin'       => 'required|string|max:50',
            'facebook' => 'required|string|max:50',
            'github'       => 'required|string|max:50',
            'behance'       => 'required|string|max:50',
            'portfolio_website'       => 'required|string|max:50',

            'degree.*' => 'required_with:institute.*,department.*,passing_year.*,result.*|string|max:255',
            'institute.*' => 'required_with:degree.*|string|max:255',
            'department.*' => 'required_with:degree.*|string|max:255',
            'passing_year.*' => 'required_with:degree.*|integer|digits:4|min:1900|max:' . date('Y'),
            'result.*' => 'required_with:degree.*|string|max:255',

            "organization.'*'" => 'required_with:subject.*,duration.*,completion_year.*|string|max:255',
            'subject.*' => 'required_with:organization.*|string|max:255',
            'duration.*' => 'required_with:organization.*|string|max:255',
            'completion_year.*' => 'required_with:organization.*|integer|digits:4|min:1900|max:' . date('Y'),

            'company_name.*' => 'required_with:designation.*,joining_date.*,departure_date.*|string|max:255',
            'designation.*' => 'required_with:company_name.*|string|max:255',
            'joining_date.*' => 'required_with:company_name.*|date',
            'departure_date.*' => 'required_with:company_name.*|date|after_or_equal:joining_date.*',

            'education_id' => 'array',
            'degree' => 'array',
            'institute' => 'array',
            'department' => 'array',
            'passing_year' => 'array',
            'result' => 'array',

            'training_id' => 'array',
            'organization' => 'array',
            'subject' => 'array',
            'duration' => 'array',
            'completion_year' => 'array',

            'job_experience_id' => 'array',
            'company_name' => 'array',
            'designation' => 'array',
            'joining_date' => 'array',
            'departure_date' => 'array',
        ],[
            'degree.*.required_with' => 'If providing a degree, all other fields are required.',
            'institute.*.required_with' => 'If providing an institute, a degree is required.',
            'department.*.required_with' => 'If providing a department, a degree is required.',
            'passing_year.*.required_with' => 'If providing a passing year, a degree is required.',
            'result.*.required_with' => 'If providing a result, a degree is required.',

            'organization.*.required_with' => 'If providing an organization name, all other fields are required.',
            'subject.*.required_with' => 'If providing a subject name, an organization name is required.',
            'duration.*.required_with' => 'If providing a course duration, an organization name is required.',
            'completion_year.*.required_with' => 'If providing a completion year, an organization name is required.',

            'company_name.*.required_with' => 'If providing a company name, all other fields are required.',
            'designation.*.required_with' => 'If providing a designation, a company name is required.',
            'joining_date.*.required_with' => 'If providing a joining date, a company name is required.',
            'departure_date.*.required_with' => 'If providing a departure date, a company name is required and must be after or equal to the joining date.'
        ]);

        //dd($request->all());
        $oldProfilePic = $request->old_profile_picture;


        if($request->hasFile('profile_picture')) {
            if($oldProfilePic){
                unlink($oldProfilePic);
            }
            $image = $request->file('profile_picture');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('upload/resume'), $imageName);
            $uploadProfilePicPath = 'upload/resume/'.$imageName;
        }else{
            $resume = Resume::findOrFail($id);
            $uploadProfilePicPath = $resume->profile_picture;
        }

        $resume = Resume::findOrFail($id)->update([
            'name' => $request->input('name'),
            'fathers_name' => $request->input('fathers_name'),
            'mothers_name' => $request->input('mothers_name'),
            'email' => $request->input('email'),
            'dob' => $request->input('dob'),
            'present_address' => $request->input('present_address'),
            'permanent_address' => $request->input('permanent_address'),
            'blood_group' => $request->input('blood_group'),
            'nid' => $request->input('nid'),
            'passport' => $request->input('passport'),
            'phone' => $request->input('phone'),
            'emergency_contact_no' => $request->input('emergency_contact_no'),
            'carrer_objective' => $request->input('carrer_objective'),
            'profile_picture' => $uploadProfilePicPath,

            'present_salary' => $request->input('present_salary'),
            'expected_salary' => $request->input('expected_salary'),
            'skills' => $request->input('skills'),
            'hobbies' => $request->input('hobbies'),

            'whatsapp' => $request->input('whatsapp'),
            'linkedin' => $request->input('linkedin'),
            'facebook' => $request->input('facebook'),
            'github' => $request->input('github'),
            'behance' => $request->input('behance'),
            'portfolio_website' => $request->input('portfolio_website'),
        ]);

        //$resumeID = $resume->id;

        // Update Education
        $educationIds = $request->input('education_id');
        $degreeNames = $request->input('degree');
        $instituteNames = $request->input('institute');
        $departmentNames = $request->input('department');
        $passingYearNames = $request->input('passing_year');
        $resultNames = $request->input('result');

        foreach ($educationIds as $key => $educationId) {
            $educationId = $educationIds[$key];

            $request->validate([
                "degree.$key" => 'required|string|max:255',
                "institute.$key" => 'required|string|max:255',
                "department.$key" => 'required|string|max:255',
                "passing_year.$key" => 'required|integer|min:1900|max:' . (date('Y') + 1),
                "result.$key" => 'required|string|max:255',
            ]);

            if ($educationId) {
                // Update existing education record
                Education::where('id', $educationId)->update([
                    'degree' => $degreeNames[$key],
                    'institute' => $instituteNames[$key],
                    'department' => $departmentNames[$key],
                    'passing_year' => $passingYearNames[$key],
                    'result' => $resultNames[$key],
                ]);
            } else {
                // Create a new education record
                Education::create([
                    'resume_id' => $id,
                    'degree' => $degreeName,
                    'institute' => $instituteNames[$key],
                    'department' => $departmentNames[$key],
                    'passing_year' => $passingYearNames[$key],
                    'result' => $resultNames[$key],
                ]);
            }
        }

        // Update Training
        $trainingIds = $request->input('training_id');
        $organizations = $request->input('organization');
        $subjects = $request->input('subject');
        $durations = $request->input('duration');
        $completionYears = $request->input('completion_year');

        foreach ($trainingIds as $key => $trainingId) {
            $trainingId = $trainingIds[$key];

            $request->validate([
                "organization.$key" => 'required|string|max:255',
                "subject.$key" => 'required|string|max:255',
                "duration.$key" => 'required|string|max:255',
                "completion_year.$key" => 'required|integer|min:1900|max:' . (date('Y') + 1),
            ]);

            if ($trainingId) {
                // Update existing training record
                Training::where('id', $trainingId)->update([
                    'organization' => $organizations[$key],
                    'subject' => $subjects[$key],
                    'duration' => $durations[$key],
                    'completion_year' => $completionYears[$key],
                ]);
            } else {
                // Create a new training record
                Training::create([
                    'resume_id' => $id,
                    'organization' => $organizations[$key],
                    'subject' => $subjects[$key],
                    'duration' => $durations[$key],
                    'completion_year' => $completionYears[$key],
                ]);
            }
        }

        // Update JobExperience
        $jobExperienceIds = $request->input('job_experience_id');
        $companyNames = $request->input('company_name');
        $designations = $request->input('designation');
        $joiningDates = $request->input('joining_date');
        $departureDates = $request->input('departure_date');

        foreach ($jobExperienceIds as $key => $jobExperienceId) {
            $jobExperienceId = $jobExperienceIds[$key];

            $request->validate([
                "company_name.$key" => 'required|string|max:255',
                "designation.$key" => 'required|string|max:255',
                "joining_date.$key" => 'required|date',
                "departure_date.$key" => 'required|date|after_or_equal:joining_date.'.$key,
            ]);

            if ($jobExperienceId) {
                // Update existing job experience record
                JobExperience::where('id', $jobExperienceId)->update([
                    'company_name' => $companyNames[$key],
                    'designation' => $designations[$key],
                    'joining_date' => $joiningDates[$key],
                    'departure_date' => $departureDates[$key],
                ]);
            } else {
                // Create a new job experience record
                JobExperience::create([
                    'resume_id' => $id,
                    'company_name' => $companyNames[$key],
                    'designation' => $designations[$key],
                    'joining_date' => $joiningDates[$key],
                    'departure_date' => $departureDates[$key],
                ]);
            }
        }

        $notification=array(
            'message'=>'Information Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('resume')->with($notification);
    }


    public function delete($id)
    {
        $resume = Resume::findOrFail($id);
        $resumeId = $resume->id;

        Education::where('resume_id',$resumeId)->delete();
        Training::where('resume_id',$resumeId)->delete();
        JobExperience::where('resume_id',$resumeId)->delete();

        $profilePicPath = $resume->profile_picture;
        if($profilePicPath){
            unlink($profilePicPath);
        }

        $resume->delete();

        $notification=array(
            'message'=>'Information Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }


}
