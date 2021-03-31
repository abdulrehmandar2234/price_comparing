<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function scrape_category()
    {
        return $this->belongsTo('App\ScrapedCategory');
    }
    public function product_links()
    {
        return $this->hasMany('App\ProductLink', 'product_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
}
