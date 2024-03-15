<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonSetting extends Model
{
    protected $fillable = ['name','email','phone1','phone2','title','address','description','logo','cover_photo'];
}
