<?php

namespace Illuminate\Mail;

use Aws\Ses\SesClient;
<<<<<<< HEAD
use Illuminate\Support\Arr;
use Psr\Log\LoggerInterface;
use Illuminate\Log\LogManager;
use Illuminate\Support\Manager;
use GuzzleHttp\Client as HttpClient;
use Swift_SmtpTransport as SmtpTransport;
use Illuminate\Mail\Transport\LogTransport;
use Illuminate\Mail\Transport\SesTransport;
use Postmark\Transport as PostmarkTransport;
use Illuminate\Mail\Transport\ArrayTransport;
use Illuminate\Mail\Transport\MailgunTransport;
use Illuminate\Mail\Transport\MandrillTransport;
use Illuminate\Mail\Transport\SparkPostTransport;
use Swift_SendmailTransport as SendmailTransport;
=======
use GuzzleHttp\Client as HttpClient;
use Illuminate\Log\LogManager;
use Illuminate\Mail\Transport\ArrayTransport;
use Illuminate\Mail\Transport\LogTransport;
use Illuminate\Mail\Transport\MailgunTransport;
use Illuminate\Mail\Transport\SesTransport;
use Illuminate\Support\Arr;
use Illuminate\Support\Manager;
use Postmark\Transport as PostmarkTransport;
use Psr\Log\LoggerInterface;
use Swift_SendmailTransport as SendmailTransport;
use Swift_SmtpTransport as SmtpTransport;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

class TransportManager extends Manager
{
    /**
     * Create an instance of the SMTP Swift Transport driver.
     *
     * @return \Swift_SmtpTransport
     */
    protected function createSmtpDriver()
    {
<<<<<<< HEAD
        $config = $this->app->make('config')->get('mail');
=======
        $config = $this->config->get('mail');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        // The Swift SMTP transport instance will allow us to use any SMTP backend
        // for delivering mail such as Sendgrid, Amazon SES, or a custom server
        // a developer has available. We will just pass this configured host.
        $transport = new SmtpTransport($config['host'], $config['port']);

<<<<<<< HEAD
        if (isset($config['encryption'])) {
=======
        if (! empty($config['encryption'])) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $transport->setEncryption($config['encryption']);
        }

        // Once we have the transport we will check for the presence of a username
        // and password. If we have it we will set the credentials on the Swift
        // transporter instance so that we'll properly authenticate delivery.
        if (isset($config['username'])) {
            $transport->setUsername($config['username']);

            $transport->setPassword($config['password']);
        }

        return $this->configureSmtpDriver($transport, $config);
    }

    /**
     * Configure the additional SMTP driver options.
     *
     * @param  \Swift_SmtpTransport  $transport
     * @param  array  $config
     * @return \Swift_SmtpTransport
     */
    protected function configureSmtpDriver($transport, $config)
    {
        if (isset($config['stream'])) {
            $transport->setStreamOptions($config['stream']);
        }

        if (isset($config['source_ip'])) {
            $transport->setSourceIp($config['source_ip']);
        }

        if (isset($config['local_domain'])) {
            $transport->setLocalDomain($config['local_domain']);
        }

        return $transport;
    }

    /**
     * Create an instance of the Sendmail Swift Transport driver.
     *
     * @return \Swift_SendmailTransport
     */
    protected function createSendmailDriver()
    {
<<<<<<< HEAD
        return new SendmailTransport($this->app['config']['mail']['sendmail']);
=======
        return new SendmailTransport($this->config->get('mail.sendmail'));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Create an instance of the Amazon SES Swift Transport driver.
     *
     * @return \Illuminate\Mail\Transport\SesTransport
     */
    protected function createSesDriver()
    {
<<<<<<< HEAD
        $config = array_merge($this->app['config']->get('services.ses', []), [
=======
        $config = array_merge($this->config->get('services.ses', []), [
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            'version' => 'latest', 'service' => 'email',
        ]);

        return new SesTransport(
            new SesClient($this->addSesCredentials($config)),
            $config['options'] ?? []
        );
    }

    /**
     * Add the SES credentials to the configuration array.
     *
     * @param  array  $config
     * @return array
     */
    protected function addSesCredentials(array $config)
    {
        if (! empty($config['key']) && ! empty($config['secret'])) {
            $config['credentials'] = Arr::only($config, ['key', 'secret', 'token']);
        }

        return $config;
    }

    /**
     * Create an instance of the Mail Swift Transport driver.
     *
     * @return \Swift_SendmailTransport
     */
    protected function createMailDriver()
    {
        return new SendmailTransport;
    }

    /**
     * Create an instance of the Mailgun Swift Transport driver.
     *
     * @return \Illuminate\Mail\Transport\MailgunTransport
     */
    protected function createMailgunDriver()
    {
<<<<<<< HEAD
        $config = $this->app['config']->get('services.mailgun', []);
=======
        $config = $this->config->get('services.mailgun', []);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return new MailgunTransport(
            $this->guzzle($config),
            $config['secret'],
            $config['domain'],
            $config['endpoint'] ?? null
        );
    }

    /**
<<<<<<< HEAD
     * Create an instance of the Mandrill Swift Transport driver.
     *
     * @return \Illuminate\Mail\Transport\MandrillTransport
     */
    protected function createMandrillDriver()
    {
        $config = $this->app['config']->get('services.mandrill', []);

        return new MandrillTransport(
            $this->guzzle($config), $config['secret']
        );
    }

    /**
     * Create an instance of the SparkPost Swift Transport driver.
     *
     * @return \Illuminate\Mail\Transport\SparkPostTransport
     */
    protected function createSparkPostDriver()
    {
        $config = $this->app['config']->get('services.sparkpost', []);

        return new SparkPostTransport(
            $this->guzzle($config), $config['secret'], $config['options'] ?? []
        );
    }

    /**
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * Create an instance of the Postmark Swift Transport driver.
     *
     * @return \Swift_Transport
     */
    protected function createPostmarkDriver()
    {
        return new PostmarkTransport(
<<<<<<< HEAD
            $this->app['config']->get('services.postmark.token')
=======
            $this->config->get('services.postmark.token')
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );
    }

    /**
     * Create an instance of the Log Swift Transport driver.
     *
     * @return \Illuminate\Mail\Transport\LogTransport
     */
    protected function createLogDriver()
    {
<<<<<<< HEAD
        $logger = $this->app->make(LoggerInterface::class);

        if ($logger instanceof LogManager) {
            $logger = $logger->channel($this->app['config']['mail.log_channel']);
=======
        $logger = $this->container->make(LoggerInterface::class);

        if ($logger instanceof LogManager) {
            $logger = $logger->channel($this->config->get('mail.log_channel'));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return new LogTransport($logger);
    }

    /**
     * Create an instance of the Array Swift Transport Driver.
     *
     * @return \Illuminate\Mail\Transport\ArrayTransport
     */
    protected function createArrayDriver()
    {
        return new ArrayTransport;
    }

    /**
     * Get a fresh Guzzle HTTP client instance.
     *
     * @param  array  $config
     * @return \GuzzleHttp\Client
     */
    protected function guzzle($config)
    {
        return new HttpClient(Arr::add(
            $config['guzzle'] ?? [], 'connect_timeout', 60
        ));
    }

    /**
     * Get the default mail driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
<<<<<<< HEAD
        return $this->app['config']['mail.driver'];
=======
        return $this->config->get('mail.driver');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Set the default mail driver name.
     *
     * @param  string  $name
     * @return void
     */
    public function setDefaultDriver($name)
    {
<<<<<<< HEAD
        $this->app['config']['mail.driver'] = $name;
=======
        $this->config->set('mail.driver', $name);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
