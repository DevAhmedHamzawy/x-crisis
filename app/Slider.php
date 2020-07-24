<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $guarded = [];


    public function getImgPathAttribute()
    {
        return asset('storage/main/sliders/' . $this->image);
    }
}
