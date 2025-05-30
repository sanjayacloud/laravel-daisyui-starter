<?php

namespace Sanjaya\LaravelDaisyuiStarter;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Sanjaya\LaravelDaisyuiStarter\Console\InstallCommand;

class LaravelDaisyuiStarterServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/laravel-daisyui-starter.php', 'laravel-daisyui-starter'
        );
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);

            // Publish config
            $this->publishes([
                __DIR__.'/../config/laravel-daisyui-starter.php' => config_path('laravel-daisyui-starter.php'),
            ], 'daisyui-starter-config');

            // Publish views
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-daisyui-starter'),
            ], 'daisyui-starter-views');

            // Publish routes
            $this->publishes([
                __DIR__.'/../routes' => base_path('routes'),
            ], 'daisyui-starter-routes');

            // Publish themes
            $this->publishThemes();
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-daisyui-starter');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }

    protected function publishThemes()
    {
        // Modern theme
        $this->publishes([
            __DIR__.'/../resources/stubs/modern' => resource_path('views/layouts'),
            __DIR__.'/../resources/css/themes/modern' => resource_path('css'),
        ], 'daisyui-starter-modern-theme');

        // Corporate theme
        $this->publishes([
            __DIR__.'/../resources/stubs/corporate' => resource_path('views/layouts'),
            __DIR__.'/../resources/css/themes/corporate' => resource_path('css'),
        ], 'daisyui-starter-corporate-theme');

        // Retro theme
        $this->publishes([
            __DIR__.'/../resources/stubs/retro' => resource_path('views/layouts'),
            __DIR__.'/../resources/css/themes/retro' => resource_path('css'),
        ], 'daisyui-starter-retro-theme');

        // Cyberpunk theme
        $this->publishes([
            __DIR__.'/../resources/stubs/cyberpunk' => resource_path('views/layouts'),
            __DIR__.'/../resources/css/themes/cyberpunk' => resource_path('css'),
        ], 'daisyui-starter-cyberpunk-theme');

        // Fantasy theme
        $this->publishes([
            __DIR__.'/../resources/stubs/fantasy' => resource_path('views/layouts'),
            __DIR__.'/../resources/css/themes/fantasy' => resource_path('css'),
        ], 'daisyui-starter-fantasy-theme');
    }
}