<?php

namespace Wll\Hash\Hashing;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class HashServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('laravel.hash', function ($app) {
            return new HashManager($app);
        });

        $this->app->singleton('laravel.hash.driver', function ($app) {
            return $app['hash']->driver();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['hash', 'hash.driver'];
    }
}
