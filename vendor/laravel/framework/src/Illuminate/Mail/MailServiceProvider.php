<?php

namespace Illuminate\Mail;

<<<<<<< HEAD
use Swift_Mailer;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Swift_DependencyContainer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
=======
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Swift_DependencyContainer;
use Swift_Mailer;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

class MailServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerSwiftMailer();
        $this->registerIlluminateMailer();
        $this->registerMarkdownRenderer();
    }

    /**
     * Register the Illuminate mailer instance.
     *
     * @return void
     */
    protected function registerIlluminateMailer()
    {
<<<<<<< HEAD
        $this->app->singleton('mailer', function () {
            $config = $this->app->make('config')->get('mail');
=======
        $this->app->singleton('mailer', function ($app) {
            $config = $app->make('config')->get('mail');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

            // Once we have create the mailer instance, we will set a container instance
            // on the mailer. This allows us to resolve mailer classes via containers
            // for maximum testability on said classes instead of passing Closures.
            $mailer = new Mailer(
<<<<<<< HEAD
                $this->app['view'],
                $this->app['swift.mailer'],
                $this->app['events']
            );

            if ($this->app->bound('queue')) {
                $mailer->setQueue($this->app['queue']);
=======
                $app['view'], $app['swift.mailer'], $app['events']
            );

            if ($app->bound('queue')) {
                $mailer->setQueue($app['queue']);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            }

            // Next we will set all of the global addresses on this mailer, which allows
            // for easy unification of all "from" addresses as well as easy debugging
            // of sent messages since they get be sent into a single email address.
            foreach (['from', 'reply_to', 'to'] as $type) {
                $this->setGlobalAddress($mailer, $config, $type);
            }

            return $mailer;
        });
    }

    /**
     * Set a global address on the mailer by type.
     *
     * @param  \Illuminate\Mail\Mailer  $mailer
     * @param  array  $config
     * @param  string  $type
     * @return void
     */
    protected function setGlobalAddress($mailer, array $config, $type)
    {
        $address = Arr::get($config, $type);

        if (is_array($address) && isset($address['address'])) {
            $mailer->{'always'.Str::studly($type)}($address['address'], $address['name']);
        }
    }

    /**
     * Register the Swift Mailer instance.
     *
     * @return void
     */
    public function registerSwiftMailer()
    {
        $this->registerSwiftTransport();

        // Once we have the transporter registered, we will register the actual Swift
        // mailer instance, passing in the transport instances, which allows us to
        // override this transporter instances during app start-up if necessary.
<<<<<<< HEAD
        $this->app->singleton('swift.mailer', function () {
            if ($domain = $this->app->make('config')->get('mail.domain')) {
=======
        $this->app->singleton('swift.mailer', function ($app) {
            if ($domain = $app->make('config')->get('mail.domain')) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                Swift_DependencyContainer::getInstance()
                                ->register('mime.idgenerator.idright')
                                ->asValue($domain);
            }

<<<<<<< HEAD
            return new Swift_Mailer($this->app['swift.transport']->driver());
=======
            return new Swift_Mailer($app['swift.transport']->driver());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        });
    }

    /**
     * Register the Swift Transport instance.
     *
     * @return void
     */
    protected function registerSwiftTransport()
    {
<<<<<<< HEAD
        $this->app->singleton('swift.transport', function () {
            return new TransportManager($this->app);
=======
        $this->app->singleton('swift.transport', function ($app) {
            return new TransportManager($app);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        });
    }

    /**
     * Register the Markdown renderer instance.
     *
     * @return void
     */
    protected function registerMarkdownRenderer()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/resources/views' => $this->app->resourcePath('views/vendor/mail'),
            ], 'laravel-mail');
        }

<<<<<<< HEAD
        $this->app->singleton(Markdown::class, function () {
            $config = $this->app->make('config');

            return new Markdown($this->app->make('view'), [
=======
        $this->app->singleton(Markdown::class, function ($app) {
            $config = $app->make('config');

            return new Markdown($app->make('view'), [
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                'theme' => $config->get('mail.markdown.theme', 'default'),
                'paths' => $config->get('mail.markdown.paths', []),
            ]);
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
            'mailer', 'swift.mailer', 'swift.transport', Markdown::class,
        ];
    }
}
