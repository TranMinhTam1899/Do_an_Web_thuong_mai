<?php

namespace Illuminate\Session;

<<<<<<< HEAD
use Illuminate\Support\ServiceProvider;
use Illuminate\Session\Middleware\StartSession;
=======
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\ServiceProvider;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

class SessionServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerSessionManager();

        $this->registerSessionDriver();

        $this->app->singleton(StartSession::class);
    }

    /**
     * Register the session manager instance.
     *
     * @return void
     */
    protected function registerSessionManager()
    {
        $this->app->singleton('session', function ($app) {
            return new SessionManager($app);
        });
    }

    /**
     * Register the session driver instance.
     *
     * @return void
     */
    protected function registerSessionDriver()
    {
        $this->app->singleton('session.store', function ($app) {
            // First, we will create the session manager which is responsible for the
            // creation of the various session drivers when they are needed by the
            // application instance, and will resolve them on a lazy load basis.
            return $app->make('session')->driver();
        });
    }
}
