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
        $this->configurePublishing();
        // $this->loadRoutesFrom(__DIR__.'/routes.php');
        // $this->loadMigrationsFrom(__DIR__.'/migrations');
        // $this->loadViewsFrom(__DIR__.'/views/inertia', 'site');
        // $this->publishes([
        //     __DIR__.'/views/inertia' => base_path('resources/js/Pages'),
        // ]);
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
        // if (! $this->app->runningInConsole()) {
        //     return;
        // }

        $this->publishes([
            __DIR__.'/../config/site.php' => config_path('site.php'),
        ], 'site-config');

        // $this->publishes([
        //     __DIR__.'/../resources/views' => resource_path('views/vendor/jetstream'),
        // ], 'jetstream-views');

        // $this->publishes([
        //     __DIR__.'/../database/migrations/2014_10_12_000000_create_users_table.php' => database_path('migrations/2014_10_12_000000_create_users_table.php'),
        // ], 'jetstream-migrations');

        // $this->publishes([
        //     __DIR__.'/../database/migrations/2020_05_21_100000_create_teams_table.php' => database_path('migrations/2020_05_21_100000_create_teams_table.php'),
        //     __DIR__.'/../database/migrations/2020_05_21_200000_create_team_user_table.php' => database_path('migrations/2020_05_21_200000_create_team_user_table.php'),
        //     __DIR__.'/../database/migrations/2020_05_21_300000_create_team_invitations_table.php' => database_path('migrations/2020_05_21_300000_create_team_invitations_table.php'),
        // ], 'jetstream-team-migrations');

        // $this->publishes([
        //     __DIR__.'/../routes/'.config('jetstream.stack').'.php' => base_path('routes/jetstream.php'),
        // ], 'jetstream-routes');

        // $this->publishes([
        //     __DIR__.'/../stubs/inertia/resources/js/Pages/Auth' => resource_path('js/Pages/Auth'),
        //     __DIR__.'/../stubs/inertia/resources/js/Jetstream/AuthenticationCard.vue' => resource_path('js/Jetstream/AuthenticationCard.vue'),
        //     __DIR__.'/../stubs/inertia/resources/js/Jetstream/AuthenticationCardLogo.vue' => resource_path('js/Jetstream/AuthenticationCardLogo.vue'),
        //     __DIR__.'/../stubs/inertia/resources/js/Jetstream/Checkbox.vue' => resource_path('js/Jetstream/Checkbox.vue'),
        //     __DIR__.'/../stubs/inertia/resources/js/Jetstream/ValidationErrors.vue' => resource_path('js/Jetstream/ValidationErrors.vue'),
        // ], 'jetstream-inertia-auth-pages');
    }
}