<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyEmployee extends Model
{
    protected $fillable = ['company_id','name','email','phone','profile_image','password','status'];
    protected $hidden = ['password'];
}
