<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = ['user_id','name','fathers_name','mothers_name','dob','present_address','permanent_address','blood_group','nid','passport','phone','emergency_contact_no','email','carrer_objective','profile_picture','present_salary','expected_salary','skills','hobbies','whatsapp','linkedin','facebook','github','behance','portfolio_website'];

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }

    public function job_experiences()
    {
        return $this->hasMany(JobExperience::class);
    }
}
