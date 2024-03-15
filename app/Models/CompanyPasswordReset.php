<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyPasswordReset extends Model
{
    protected $fillable = ['email','token'];
}
