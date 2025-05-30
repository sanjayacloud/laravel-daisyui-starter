<?php

namespace Sanjaya\LaravelDaisyuiStarter\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Sanjaya\LaravelDaisyuiStarter\LaravelDaisyuiStarterServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelDaisyuiStarterServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }
}