<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['category_id','title','description','banner_image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
