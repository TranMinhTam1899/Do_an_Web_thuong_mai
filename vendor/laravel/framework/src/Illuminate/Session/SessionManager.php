<?php

namespace Illuminate\Session;

use Illuminate\Support\Manager;

class SessionManager extends Manager
{
    /**
     * Call a custom driver creator.
     *
     * @param  string  $driver
     * @return mixed
     */
    protected function callCustomCreator($driver)
    {
        return $this->buildSession(parent::callCustomCreator($driver));
    }

    /**
     * Create an instance of the "array" session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createArrayDriver()
    {
        return $this->buildSession(new NullSessionHandler);
    }

    /**
     * Create an instance of the "cookie" session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createCookieDriver()
    {
        return $this->buildSession(new CookieSessionHandler(
<<<<<<< HEAD
            $this->app['cookie'], $this->app['config']['session.lifetime']
=======
            $this->container->make('cookie'), $this->config->get('session.lifetime')
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        ));
    }

    /**
     * Create an instance of the file session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createFileDriver()
    {
        return $this->createNativeDriver();
    }

    /**
     * Create an instance of the file session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createNativeDriver()
    {
<<<<<<< HEAD
        $lifetime = $this->app['config']['session.lifetime'];

        return $this->buildSession(new FileSessionHandler(
            $this->app['files'], $this->app['config']['session.files'], $lifetime
=======
        $lifetime = $this->config->get('session.lifetime');

        return $this->buildSession(new FileSessionHandler(
            $this->container->make('files'), $this->config->get('session.files'), $lifetime
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        ));
    }

    /**
     * Create an instance of the database session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createDatabaseDriver()
    {
<<<<<<< HEAD
        $table = $this->app['config']['session.table'];

        $lifetime = $this->app['config']['session.lifetime'];

        return $this->buildSession(new DatabaseSessionHandler(
            $this->getDatabaseConnection(), $table, $lifetime, $this->app
=======
        $table = $this->config->get('session.table');

        $lifetime = $this->config->get('session.lifetime');

        return $this->buildSession(new DatabaseSessionHandler(
            $this->getDatabaseConnection(), $table, $lifetime, $this->container
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        ));
    }

    /**
     * Get the database connection for the database driver.
     *
     * @return \Illuminate\Database\Connection
     */
    protected function getDatabaseConnection()
    {
<<<<<<< HEAD
        $connection = $this->app['config']['session.connection'];

        return $this->app['db']->connection($connection);
=======
        $connection = $this->config->get('session.connection');

        return $this->container->make('db')->connection($connection);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Create an instance of the APC session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createApcDriver()
    {
        return $this->createCacheBased('apc');
    }

    /**
     * Create an instance of the Memcached session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createMemcachedDriver()
    {
        return $this->createCacheBased('memcached');
    }

    /**
     * Create an instance of the Redis session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createRedisDriver()
    {
        $handler = $this->createCacheHandler('redis');

        $handler->getCache()->getStore()->setConnection(
<<<<<<< HEAD
            $this->app['config']['session.connection']
=======
            $this->config->get('session.connection')
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );

        return $this->buildSession($handler);
    }

    /**
     * Create an instance of the DynamoDB session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createDynamodbDriver()
    {
        return $this->createCacheBased('dynamodb');
    }

    /**
     * Create an instance of a cache driven driver.
     *
     * @param  string  $driver
     * @return \Illuminate\Session\Store
     */
    protected function createCacheBased($driver)
    {
        return $this->buildSession($this->createCacheHandler($driver));
    }

    /**
     * Create the cache based session handler instance.
     *
     * @param  string  $driver
     * @return \Illuminate\Session\CacheBasedSessionHandler
     */
    protected function createCacheHandler($driver)
    {
<<<<<<< HEAD
        $store = $this->app['config']->get('session.store') ?: $driver;

        return new CacheBasedSessionHandler(
            clone $this->app['cache']->store($store),
            $this->app['config']['session.lifetime']
=======
        $store = $this->config->get('session.store') ?: $driver;

        return new CacheBasedSessionHandler(
            clone $this->container->make('cache')->store($store),
            $this->config->get('session.lifetime')
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );
    }

    /**
     * Build the session instance.
     *
     * @param  \SessionHandlerInterface  $handler
     * @return \Illuminate\Session\Store
     */
    protected function buildSession($handler)
    {
<<<<<<< HEAD
        return $this->app['config']['session.encrypt']
                ? $this->buildEncryptedSession($handler)
                : new Store($this->app['config']['session.cookie'], $handler);
=======
        return $this->config->get('session.encrypt')
                ? $this->buildEncryptedSession($handler)
                : new Store($this->config->get('session.cookie'), $handler);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Build the encrypted session instance.
     *
     * @param  \SessionHandlerInterface  $handler
     * @return \Illuminate\Session\EncryptedStore
     */
    protected function buildEncryptedSession($handler)
    {
        return new EncryptedStore(
<<<<<<< HEAD
            $this->app['config']['session.cookie'], $handler, $this->app['encrypter']
=======
            $this->config->get('session.cookie'), $handler, $this->container['encrypter']
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );
    }

    /**
     * Get the session configuration.
     *
     * @return array
     */
    public function getSessionConfig()
    {
<<<<<<< HEAD
        return $this->app['config']['session'];
=======
        return $this->config->get('session');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Get the default session driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
<<<<<<< HEAD
        return $this->app['config']['session.driver'];
=======
        return $this->config->get('session.driver');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Set the default session driver name.
     *
     * @param  string  $name
     * @return void
     */
    public function setDefaultDriver($name)
    {
<<<<<<< HEAD
        $this->app['config']['session.driver'] = $name;
=======
        $this->config->set('session.driver', $name);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
