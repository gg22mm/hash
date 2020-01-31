<?php
namespace Wll\Hash\Hashing;
class HashHyperfServiceProvider
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
            $app['config']['driver'] = config('hashing.driver', 'bcrypt');
            $app['config']['hashing.bcrypt'] = [
                'rounds' => config('hashing.bcrypt.rounds', '10'),
            ];
            $app['config']['hashing.argon'] = [
                'memory' => config('hashing.argon.memory', '1024'),
                'threads' => config('hashing.argon.threads', '2'),
                'time' => config('hashing.argon.time', '2'),
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
?>
