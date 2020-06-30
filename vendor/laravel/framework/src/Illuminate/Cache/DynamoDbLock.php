<?php

namespace Illuminate\Cache;

class DynamoDbLock extends Lock
{
    /**
     * The DynamoDB client instance.
     *
     * @var \Illuminate\Cache\DynamoDbStore
     */
    protected $dynamo;

    /**
     * Create a new lock instance.
     *
     * @param  \Illuminate\Cache\DynamoDbStore  $dynamo
     * @param  string  $name
     * @param  int  $seconds
     * @param  string|null  $owner
     * @return void
     */
    public function __construct(DynamoDbStore $dynamo, $name, $seconds, $owner = null)
    {
        parent::__construct($name, $seconds, $owner);

        $this->dynamo = $dynamo;
    }

    /**
     * Attempt to acquire the lock.
     *
     * @return bool
     */
    public function acquire()
    {
        return $this->dynamo->add(
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
            $this->dynamo->forget($this->name);
        }
=======
            return $this->dynamo->forget($this->name);
        }

        return false;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Release this lock in disregard of ownership.
     *
     * @return void
     */
    public function forceRelease()
    {
        $this->dynamo->forget($this->name);
    }

    /**
     * Returns the owner value written into the driver for this lock.
     *
     * @return mixed
     */
    protected function getCurrentOwner()
    {
        return $this->dynamo->get($this->name);
    }
}
