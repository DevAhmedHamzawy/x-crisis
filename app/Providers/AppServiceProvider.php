<?php

namespace App\Providers;

use App\SeoLinks\SeoLinksIndex;
use App\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $settings = Setting::findOrFail(1);
        view()->share('settings', $settings);
        SeoLinksIndex::getLinks($settings->name, $settings->description, env('APP_URL'), env('APP_URL'), $settings->twitter, $settings->icon_header_path);


    }
}
