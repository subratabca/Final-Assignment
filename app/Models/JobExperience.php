<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobExperience extends Model
{
    protected $fillable = ['resume_id','company_name','designation','joining_date','departure_date'];
}
