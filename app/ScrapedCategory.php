<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScrapedCategory extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
