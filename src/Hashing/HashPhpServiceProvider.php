<?php

namespace Wll\Hash\Hashing;

class HashPhpServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register($app = [])
    {
        // $app['hash']->driver();
        if (!$app) {
            $app['config']['driver'] = 'bcrypt';
            $app['config']['hashing.bcrypt'] = [
                'rounds' => 10,
            ];
            $app['config']['hashing.argon'] = [
                'memory' => 1024,
                'threads' => 2,
                'time' => 2,
            ];
        }
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
