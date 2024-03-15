<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['company_id','category_id','title','education','vacancy','description','requirements','responsibility','benefits','company_description','job_nature','deadline','skills','job_type','salary','address','city','country','zip_code','status'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function job_applications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
