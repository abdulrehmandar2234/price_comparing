<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeCategory extends Model
{
    protected $fillable = [
        'name',
        'image'
    ];

      public function recipe()
       {
       return $this->hasMany('App\Blog');
       }
}
