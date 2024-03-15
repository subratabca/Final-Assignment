<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','banner_image','icon'];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
