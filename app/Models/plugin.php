<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class plugin extends Model
{
    protected $fillable = ['company_id','blog_status','employee_status','page_status'];
}
