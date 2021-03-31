<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $fillable = ['website_name', 'website_url', 'website_logo'];

    public function product_website_links()
    {
        return $this->hasMany('App\ProductLink');
    }

    public function product_node()
    {
        return $this->hasMany('App\SingleProduct');
    }

    public function category_node()
    {
        return $this->hasOne('App\CategoryNode');
    }

    public function scrap_category()
    {
        return $this->hasMany('App\ScrapedCategory');
    }

}
