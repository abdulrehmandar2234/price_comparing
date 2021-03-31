<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name',
        'image',
    ];

    public function products()
    {
        return $this->hasMany('app\Product');
    }
    public function scraped_category()
    {
        return $this->hasOne('app\ScrapedCategory');
    }

    public function image()
    {
        return $this->hasOne('App\image');
    }

    public function recipe()
    {
        return $this->hasMany('App\Blog');
    }
}
