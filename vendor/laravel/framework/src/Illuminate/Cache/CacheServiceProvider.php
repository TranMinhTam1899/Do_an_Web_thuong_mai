<?php

namespace Illuminate\Cache;

<<<<<<< HEAD
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
=======
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Cache\Adapter\Psr16Adapter;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

class CacheServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('cache', function ($app) {
            return new CacheManager($app);
        });

        $this->app->singleton('cache.store', function ($app) {
            return $app['cache']->driver();
        });

<<<<<<< HEAD
=======
        $this->app->singleton('cache.psr6', function ($app) {
            return new Psr16Adapter($app['cache.store']);
        });

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $this->app->singleton('memcached.connector', function () {
            return new MemcachedConnector;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
<<<<<<< HEAD
            'cache', 'cache.store', 'memcached.connector',
=======
            'cache', 'cache.store', 'cache.psr6', 'memcached.connector',
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        ];
    }
}
