<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = ['name','user_id'];

    public function users()
    {
        return $this->belongsTo('App\User' , 'user_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function product_links()
    {
        return $this->hasMany('App\ProductLink' , 'product_id');
    }

     public function items()
     {
         return $this->hasMany('App\CollectionProduct');
     }



    
}
