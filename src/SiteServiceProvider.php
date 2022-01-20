<?php

namespace laloinsane\site;

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
        $this->loadViewsFrom(__DIR__.'/views', 'todolist');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/wisdmlabs/todolist'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        // 
    }
}