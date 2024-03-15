<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    protected $fillable = ['name','email','phone','profile_image','password','status'];
    protected $hidden = ['password'];

    public function resume()
    {
        return $this->hasOne(Resume::class);
    }
}
