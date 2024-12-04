<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name'];

    public function cats(){
        return $this->hasMany(Cats::class);
    }
}
