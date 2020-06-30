<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Command;

use Symfony\Component\Console\Exception\LogicException;
<<<<<<< HEAD
use Symfony\Component\Lock\Lock;
use Symfony\Component\Lock\LockFactory;
=======
use Symfony\Component\Lock\Factory;
use Symfony\Component\Lock\Lock;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use Symfony\Component\Lock\Store\FlockStore;
use Symfony\Component\Lock\Store\SemaphoreStore;

/**
 * Basic lock feature for commands.
 *
 * @author Geoffrey Brier <geoffrey.brier@gmail.com>
 */
trait LockableTrait
{
    /** @var Lock */
    private $lock;

    /**
     * Locks a command.
<<<<<<< HEAD
     */
    private function lock(string $name = null, bool $blocking = false): bool
=======
     *
     * @return bool
     */
    private function lock($name = null, $blocking = false)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!class_exists(SemaphoreStore::class)) {
            throw new LogicException('To enable the locking feature you must install the symfony/lock component.');
        }

        if (null !== $this->lock) {
            throw new LogicException('A lock is already in place.');
        }

        if (SemaphoreStore::isSupported()) {
            $store = new SemaphoreStore();
        } else {
            $store = new FlockStore();
        }

<<<<<<< HEAD
        $this->lock = (new LockFactory($store))->createLock($name ?: $this->getName());
=======
        $this->lock = (new Factory($store))->createLock($name ?: $this->getName());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        if (!$this->lock->acquire($blocking)) {
            $this->lock = null;

            return false;
        }

        return true;
    }

    /**
     * Releases the command lock if there is one.
     */
    private function release()
    {
        if ($this->lock) {
            $this->lock->release();
            $this->lock = null;
        }
    }
}
