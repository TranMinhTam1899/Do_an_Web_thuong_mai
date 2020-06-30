<?php

namespace Illuminate\Notifications;

<<<<<<< HEAD
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Notifications\Factory as FactoryContract;
use Illuminate\Contracts\Notifications\Dispatcher as DispatcherContract;
=======
use Illuminate\Contracts\Notifications\Dispatcher as DispatcherContract;
use Illuminate\Contracts\Notifications\Factory as FactoryContract;
use Illuminate\Support\ServiceProvider;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Boot the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'notifications');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/resources/views' => $this->app->resourcePath('views/vendor/notifications'),
            ], 'laravel-notifications');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ChannelManager::class, function ($app) {
            return new ChannelManager($app);
        });

        $this->app->alias(
            ChannelManager::class, DispatcherContract::class
        );

        $this->app->alias(
            ChannelManager::class, FactoryContract::class
        );
    }
}
