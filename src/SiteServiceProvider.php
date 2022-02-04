<?php

namespace MichelCalisto\Site;

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
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'site');

        $this->configurePublishing();
        // $this->loadRoutesFrom(__DIR__.'/routes.php');
        // $this->loadMigrationsFrom(__DIR__.'/migrations');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        // $this->app->make('Laloinsane\Site\Controllers\SiteController');
    }

        /**
     * Configure publishing for the package.
     *
     * @return void
     */
    protected function configurePublishing()
    {
        $this->publishes([
            __DIR__.'/../config/site.php' => config_path('site.php'),
        ], 'site-config');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/'),
        ], 'site-views');

        $this->publishes([
            __DIR__.'/../database/migrations/2022_01_20_000000_create_sites_table.php' => database_path('migrations/2022_01_20_000000_create_sites_table.php'),
        ], 'site-migrations');

        $this->publishes([
            __DIR__.'/../routes/web.php' => base_path('routes/site.php'),
        ], 'site-routes');
    }
}