<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    //

    protected $fillable = ['name' , 'quantity' , 'user_id'];

    public function blogs()
    {
        return $this->belongsToMany('App\Blog');
    }



}
