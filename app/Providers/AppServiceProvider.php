<?php

namespace App\Providers;

use App\Models\Regions\State;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        if($this->app->environment('staging')) {
            URL::forceScheme('https');
        }

        View::creator(['dashboard.regions.counties.index', 'dashboard.regions.counties.index_action', 'dashboard.regions.payams.index', 'dashboard.regions.payams.index_action'], function ($view) {
            $view->with('states', State::with('counties')->get());
        });
    }
}
