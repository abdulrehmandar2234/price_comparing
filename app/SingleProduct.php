<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SingleProduct extends Model
{
    protected $fillable = ['website_id', 'website_logo', 'product_url_node', 'product_name_node', 'product_description_node', 'product_price_node', 'product_unit_price_node', 'product_discount_node', 'product_image_node'];

    public function website(){
        return $this->belongsTo('App\Website');
    }
}

