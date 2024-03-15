<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Company extends Authenticatable
{
    use Notifiable;
    
    protected $guard = "company";
    protected $fillable = ['company_id','name','email','phone','address','logo','password','status','blog','employee','page'];
    protected $hidden = ['password'];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function plugin()
    {
        return $this->hasOne(Plugin::class);
    }

}
