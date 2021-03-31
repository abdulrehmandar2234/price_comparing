<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryNode extends Model
{
    protected $guarded = [];
    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
