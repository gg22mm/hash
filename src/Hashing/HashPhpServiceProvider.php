<?php

namespace Wll\Hash\Hashing;

class HashPhpServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

       // $app['hash']->driver();
        $app=[];
        return new HashManager($app);

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
