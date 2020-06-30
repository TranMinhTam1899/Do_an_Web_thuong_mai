<?php

namespace Illuminate\Foundation\Testing\Concerns;

use Exception;
<<<<<<< HEAD
use Illuminate\Redis\RedisManager;
use Illuminate\Foundation\Application;
=======
use Illuminate\Foundation\Application;
use Illuminate\Redis\RedisManager;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

trait InteractsWithRedis
{
    /**
     * Indicate connection failed if redis is not available.
     *
     * @var bool
     */
    private static $connectionFailedOnceWithDefaultsSkip = false;

    /**
     * Redis manager instance.
     *
     * @var \Illuminate\Redis\RedisManager[]
     */
    private $redis;

    /**
     * Setup redis connection.
     *
     * @return void
     */
    public function setUpRedis()
    {
        $app = $this->app ?? new Application;
        $host = getenv('REDIS_HOST') ?: '127.0.0.1';
        $port = getenv('REDIS_PORT') ?: 6379;

<<<<<<< HEAD
=======
        if (! extension_loaded('redis')) {
            $this->markTestSkipped('The redis extension is not installed. Please install the extension to enable '.__CLASS__);

            return;
        }

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        if (static::$connectionFailedOnceWithDefaultsSkip) {
            $this->markTestSkipped('Trying default host/port failed, please set environment variable REDIS_HOST & REDIS_PORT to enable '.__CLASS__);

            return;
        }

        foreach ($this->redisDriverProvider() as $driver) {
            $this->redis[$driver[0]] = new RedisManager($app, $driver[0], [
                'cluster' => false,
<<<<<<< HEAD
=======
                'options' => [
                    'prefix' => 'test_',
                ],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                'default' => [
                    'host' => $host,
                    'port' => $port,
                    'database' => 5,
                    'timeout' => 0.5,
                ],
            ]);
        }

        try {
<<<<<<< HEAD
            $this->redis['predis']->connection()->flushdb();
=======
            $this->redis['phpredis']->connection()->flushdb();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        } catch (Exception $e) {
            if ($host === '127.0.0.1' && $port === 6379 && getenv('REDIS_HOST') === false) {
                static::$connectionFailedOnceWithDefaultsSkip = true;
                $this->markTestSkipped('Trying default host/port failed, please set environment variable REDIS_HOST & REDIS_PORT to enable '.__CLASS__);
            }
        }
    }

    /**
     * Teardown redis connection.
     *
     * @return void
     */
    public function tearDownRedis()
    {
<<<<<<< HEAD
        $this->redis['predis']->connection()->flushdb();
=======
        $this->redis['phpredis']->connection()->flushdb();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        foreach ($this->redisDriverProvider() as $driver) {
            $this->redis[$driver[0]]->connection()->disconnect();
        }
    }

    /**
     * Get redis driver provider.
     *
     * @return array
     */
    public function redisDriverProvider()
    {
<<<<<<< HEAD
        $providers = [
            ['predis'],
        ];

        if (extension_loaded('redis')) {
            $providers[] = ['phpredis'];
        }

        return $providers;
=======
        return [
            ['predis'],
            ['phpredis'],
        ];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Run test if redis is available.
     *
     * @param  callable  $callback
     * @return void
     */
    public function ifRedisAvailable($callback)
    {
        $this->setUpRedis();

        $callback();

        $this->tearDownRedis();
    }
}
