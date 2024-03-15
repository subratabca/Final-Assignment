<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['company_id','title','description','benefits','location','deadline','cover_photo','status'];
}
