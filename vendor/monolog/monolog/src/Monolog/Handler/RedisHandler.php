<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Handler;

use Monolog\Formatter\LineFormatter;
<<<<<<< HEAD
=======
use Monolog\Formatter\FormatterInterface;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use Monolog\Logger;

/**
 * Logs to a Redis key using rpush
 *
 * usage example:
 *
 *   $log = new Logger('application');
 *   $redis = new RedisHandler(new Predis\Client("tcp://localhost:6379"), "logs", "prod");
 *   $log->pushHandler($redis);
 *
 * @author Thomas Tourlourat <thomas@tourlourat.com>
 */
class RedisHandler extends AbstractProcessingHandler
{
    private $redisClient;
    private $redisKey;
    protected $capSize;

    /**
     * @param \Predis\Client|\Redis $redis   The redis instance
     * @param string                $key     The key name to push records to
<<<<<<< HEAD
     * @param int                   $level   The minimum logging level at which this handler will be triggered
     * @param bool                  $bubble  Whether the messages that are handled can bubble up the stack or not
     * @param int                   $capSize Number of entries to limit list size to
     */
    public function __construct($redis, $key, $level = Logger::DEBUG, $bubble = true, $capSize = false)
=======
     * @param string|int            $level   The minimum logging level at which this handler will be triggered
     * @param bool                  $bubble  Whether the messages that are handled can bubble up the stack or not
     * @param int                   $capSize Number of entries to limit list size to, 0 = unlimited
     */
    public function __construct($redis, string $key, $level = Logger::DEBUG, bool $bubble = true, int $capSize = 0)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!(($redis instanceof \Predis\Client) || ($redis instanceof \Redis))) {
            throw new \InvalidArgumentException('Predis\Client or Redis instance required');
        }

        $this->redisClient = $redis;
        $this->redisKey = $key;
        $this->capSize = $capSize;

        parent::__construct($level, $bubble);
    }

    /**
     * {@inheritDoc}
     */
<<<<<<< HEAD
    protected function write(array $record)
=======
    protected function write(array $record): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if ($this->capSize) {
            $this->writeCapped($record);
        } else {
            $this->redisClient->rpush($this->redisKey, $record["formatted"]);
        }
    }

    /**
     * Write and cap the collection
     * Writes the record to the redis list and caps its
<<<<<<< HEAD
     *
     * @param  array $record associative record array
     * @return void
     */
    protected function writeCapped(array $record)
    {
        if ($this->redisClient instanceof \Redis) {
            $mode = defined('\Redis::MULTI') ? \Redis::MULTI : 1;
            $this->redisClient->multi($mode)
=======
     */
    protected function writeCapped(array $record): void
    {
        if ($this->redisClient instanceof \Redis) {
            $this->redisClient->multi()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                ->rpush($this->redisKey, $record["formatted"])
                ->ltrim($this->redisKey, -$this->capSize, -1)
                ->exec();
        } else {
            $redisKey = $this->redisKey;
            $capSize = $this->capSize;
            $this->redisClient->transaction(function ($tx) use ($record, $redisKey, $capSize) {
                $tx->rpush($redisKey, $record["formatted"]);
                $tx->ltrim($redisKey, -$capSize, -1);
            });
        }
    }

    /**
     * {@inheritDoc}
     */
<<<<<<< HEAD
    protected function getDefaultFormatter()
=======
    protected function getDefaultFormatter(): FormatterInterface
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return new LineFormatter();
    }
}
