<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function getImgPathAttribute()
    {
        return asset('storage/main/projects/' . $this->image);
    }
}
