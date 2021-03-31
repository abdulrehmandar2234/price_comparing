<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchWebsite extends Model
{
    protected $fillable = ['website_url', 'website_logo', 'product_name_node', 'product_price_node', 'product_unit_price_node', 'product_discount_node', 'product_image_node', 'product_link_node', 'search_url_node'];
}
