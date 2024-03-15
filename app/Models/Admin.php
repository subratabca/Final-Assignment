<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use Notifiable;
    
    protected $guard = "admin";
    protected $fillable = ['name','email','phone','profile_image','password','status'];
    protected $hidden = ['password'];

    public function roles()
    {
       return $this->belongsToMany(Role::class);
    }

}
