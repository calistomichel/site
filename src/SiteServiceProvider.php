<?php

namespace Laloinsane\Site;

use Illuminate\Support\ServiceProvider as Provider;

final class SiteServiceProvider extends Provider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'site');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/laloinsane/site'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->make('laloinsane\site\SiteController');
    }
}