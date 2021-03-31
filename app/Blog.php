<?php

namespace App;

use App\RecipeCategory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'description', 'status', 'image', 'user_id', 'status', 'category_id', 'serving', 'cooking_time', 'preparation_time'];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
  
    public function products()
    {
        return $this->belongsToMany('App\Product' , 'blog_product')->withPivot('quantity');
    }



    public function recipecategory()
    {
        return $this->belongsTo(RecipeCategory::class, 'category_id');
    }

}
