<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage\Handler;

use Predis\Response\ErrorInterface;
use Symfony\Component\Cache\Traits\RedisClusterProxy;
use Symfony\Component\Cache\Traits\RedisProxy;

/**
 * Redis based session storage handler based on the Redis class
 * provided by the PHP redis extension.
 *
 * @author Dalibor Karlović <dalibor@flexolabs.io>
 */
class RedisSessionHandler extends AbstractSessionHandler
{
    private $redis;

    /**
     * @var string Key prefix for shared environments
     */
    private $prefix;

    /**
<<<<<<< HEAD
     * @var int Time to live in seconds
     */
    private $ttl;

    /**
     * List of available options:
     *  * prefix: The prefix to use for the keys in order to avoid collision on the Redis server
     *  * ttl: The time to live in seconds.
     *
     * @param \Redis|\RedisArray|\RedisCluster|\Predis\ClientInterface|RedisProxy|RedisClusterProxy $redis
=======
     * List of available options:
     *  * prefix: The prefix to use for the keys in order to avoid collision on the Redis server.
     *
     * @param \Redis|\RedisArray|\RedisCluster|\Predis\ClientInterface|RedisProxy $redis
     * @param array                                                               $options An associative array of options
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     *
     * @throws \InvalidArgumentException When unsupported client or options are passed
     */
    public function __construct($redis, array $options = [])
    {
        if (
            !$redis instanceof \Redis &&
            !$redis instanceof \RedisArray &&
            !$redis instanceof \RedisCluster &&
            !$redis instanceof \Predis\ClientInterface &&
            !$redis instanceof RedisProxy &&
            !$redis instanceof RedisClusterProxy
        ) {
<<<<<<< HEAD
            throw new \InvalidArgumentException(sprintf('"%s()" expects parameter 1 to be Redis, RedisArray, RedisCluster or Predis\ClientInterface, "%s" given.', __METHOD__, \is_object($redis) ? \get_class($redis) : \gettype($redis)));
        }

        if ($diff = array_diff(array_keys($options), ['prefix', 'ttl'])) {
            throw new \InvalidArgumentException(sprintf('The following options are not supported "%s".', implode(', ', $diff)));
=======
            throw new \InvalidArgumentException(sprintf('%s() expects parameter 1 to be Redis, RedisArray, RedisCluster or Predis\ClientInterface, %s given', __METHOD__, \is_object($redis) ? \get_class($redis) : \gettype($redis)));
        }

        if ($diff = array_diff(array_keys($options), ['prefix'])) {
            throw new \InvalidArgumentException(sprintf('The following options are not supported "%s"', implode(', ', $diff)));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        $this->redis = $redis;
        $this->prefix = $options['prefix'] ?? 'sf_s';
<<<<<<< HEAD
        $this->ttl = $options['ttl'] ?? null;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * {@inheritdoc}
     */
    protected function doRead($sessionId): string
    {
        return $this->redis->get($this->prefix.$sessionId) ?: '';
    }

    /**
     * {@inheritdoc}
     */
    protected function doWrite($sessionId, $data): bool
    {
<<<<<<< HEAD
        $result = $this->redis->setEx($this->prefix.$sessionId, (int) ($this->ttl ?? ini_get('session.gc_maxlifetime')), $data);
=======
        $result = $this->redis->setEx($this->prefix.$sessionId, (int) ini_get('session.gc_maxlifetime'), $data);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return $result && !$result instanceof ErrorInterface;
    }

    /**
     * {@inheritdoc}
     */
    protected function doDestroy($sessionId): bool
    {
        $this->redis->del($this->prefix.$sessionId);

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function close(): bool
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function gc($maxlifetime): bool
    {
        return true;
    }

    /**
<<<<<<< HEAD
     * @return bool
     */
    public function updateTimestamp($sessionId, $data)
    {
        return (bool) $this->redis->expire($this->prefix.$sessionId, (int) ($this->ttl ?? ini_get('session.gc_maxlifetime')));
=======
     * {@inheritdoc}
     */
    public function updateTimestamp($sessionId, $data)
    {
        return (bool) $this->redis->expire($this->prefix.$sessionId, (int) ini_get('session.gc_maxlifetime'));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
