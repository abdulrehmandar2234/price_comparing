<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductLink extends Model
{
    protected $fillable = [
        'website_id', 'product_id', 'product_link','product_price','product_unit', 'product_unit_price', 'product_updated','product_image','product_discount',
    ];

   
    public function product(){
        return $this->belongsTo('App\Product');
    }
    public function website(){
        return $this->belongsTo('App\Website');
    }
    public function single_product(){
        return $this->hasOne('App\SingleProduct');
    }
}
