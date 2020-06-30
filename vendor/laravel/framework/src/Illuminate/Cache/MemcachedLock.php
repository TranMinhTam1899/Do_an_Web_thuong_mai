<?php

namespace Illuminate\Cache;

class MemcachedLock extends Lock
{
    /**
     * The Memcached instance.
     *
     * @var \Memcached
     */
    protected $memcached;

    /**
     * Create a new lock instance.
     *
     * @param  \Memcached  $memcached
     * @param  string  $name
     * @param  int  $seconds
     * @param  string|null  $owner
     * @return void
     */
    public function __construct($memcached, $name, $seconds, $owner = null)
    {
        parent::__construct($name, $seconds, $owner);

        $this->memcached = $memcached;
    }

    /**
     * Attempt to acquire the lock.
     *
     * @return bool
     */
    public function acquire()
    {
        return $this->memcached->add(
            $this->name, $this->owner, $this->seconds
        );
    }

    /**
     * Release the lock.
     *
<<<<<<< HEAD
     * @return void
=======
     * @return bool
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function release()
    {
        if ($this->isOwnedByCurrentProcess()) {
<<<<<<< HEAD
            $this->memcached->delete($this->name);
        }
=======
            return $this->memcached->delete($this->name);
        }

        return false;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Releases this lock in disregard of ownership.
     *
     * @return void
     */
    public function forceRelease()
    {
        $this->memcached->delete($this->name);
    }

    /**
     * Returns the owner value written into the driver for this lock.
     *
     * @return mixed
     */
    protected function getCurrentOwner()
    {
        return $this->memcached->get($this->name);
    }
}
