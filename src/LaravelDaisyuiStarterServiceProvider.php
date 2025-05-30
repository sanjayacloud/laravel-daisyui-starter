<?php

namespace Sanjaya\LaravelDaisyuiStarter;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;

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
            $this->publishes([
                __DIR__.'/../config/laravel-daisyui-starter.php' => config_path('laravel-daisyui-starter.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-daisyui-starter'),
            ], 'views');

            $this->publishes([
                __DIR__.'/../resources/css' => resource_path('css'),
                __DIR__.'/../tailwind.config.js' => base_path('tailwind.config.js'),
                __DIR__.'/../postcss.config.js' => base_path('postcss.config.js'),
            ], 'assets');

            $this->commands([
                Console\InstallCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-daisyui-starter');
    }
}