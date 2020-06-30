<?php

namespace Carbon\Traits;

<<<<<<< HEAD
use Carbon\Exceptions\InvalidCastException;
use DateTimeInterface;
=======
use DateTimeInterface;
use InvalidArgumentException;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * Trait Cast.
 *
 * Utils to cast into an other class.
 */
trait Cast
{
    /**
     * Cast the current instance into the given class.
     *
     * @param string $className The $className::instance() method will be called to cast the current object.
     *
     * @return DateTimeInterface
     */
    public function cast(string $className)
    {
        if (!method_exists($className, 'instance')) {
            if (is_a($className, DateTimeInterface::class, true)) {
                return new $className($this->rawFormat('Y-m-d H:i:s.u'), $this->getTimezone());
            }

<<<<<<< HEAD
            throw new InvalidCastException("$className has not the instance() method needed to cast the date.");
=======
            throw new InvalidArgumentException("$className has not the instance() method needed to cast the date.");
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return $className::instance($this);
    }
}
