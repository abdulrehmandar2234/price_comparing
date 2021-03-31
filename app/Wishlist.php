<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['user_id','product_id'];

    public function product(){
        return $this->belongsTo('App\Product');
    }
    public function products(){
        return $this->hasMany('App\Product', 'id');
    }
    public function product_links(){
        return $this->hasMany('App\ProductLink');
    }
}
