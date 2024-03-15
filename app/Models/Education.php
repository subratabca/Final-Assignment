<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = ['resume_id','degree','institute','department','passing_year','result','cover_photo','status'];
}
