<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];

    public function getIconHeaderPathAttribute()
    {
        return asset('storage/main/settings/' . $this->icon_header);
    }

    public function getIconHeaderAdminPathAttribute()
    {
        return asset('storage/main/settings/' . $this->icon_header_admin);
    }

    public function getIconTabPathAttribute()
    {
        return asset('storage/main/settings/' . $this->icon_tab);
    }

    public function getServiceTwoPathAttribute()
    {
        return asset('storage/main/service_two/' . $this->service_two);
    }

    public function getIconBusinessPathAttribute()
    {
        return asset('storage/main/business/' . $this->business);
    }
}