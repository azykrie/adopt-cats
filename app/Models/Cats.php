<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cats extends Model
{
    protected $fillable = ['cat_name', 'cat_image', 'about', 'category_id'];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
