<?php

namespace Crystalshardz\LaravelAlerts;

use Illuminate\Support\ServiceProvider;

class LaravelAlertsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Alert', 'Crystalshardz\LaravelAlerts\Alert');

        $this->loadViewsFrom(__DIR__ . '/views', 'alerts');
        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/alerts')
        ]);
    }
}
