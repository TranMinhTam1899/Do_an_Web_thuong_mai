<?php

namespace Illuminate\Foundation\Testing;

use ArrayAccess;
<<<<<<< HEAD
use PHPUnit\Util\InvalidArgumentHelper;
use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Framework\Constraint\ArraySubset;
=======
use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Framework\Constraint\ArraySubset;
use PHPUnit\Util\InvalidArgumentHelper;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * @internal This class is not meant to be used or overwritten outside the framework itself.
 */
abstract class Assert extends PHPUnit
{
    /**
     * Asserts that an array has a specified subset.
     *
     * This method was taken over from PHPUnit where it was deprecated. See link for more info.
     *
<<<<<<< HEAD
     * @param  array|\ArrayAccess  $subset
     * @param  array|\ArrayAccess  $array
=======
     * @param  \ArrayAccess|array  $subset
     * @param  \ArrayAccess|array  $array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * @param  bool  $checkForObjectIdentity
     * @param  string  $message
     * @return void
     *
     * @link https://github.com/sebastianbergmann/phpunit/issues/3494
     */
    public static function assertArraySubset($subset, $array, bool $checkForObjectIdentity = false, string $message = ''): void
    {
        if (! (is_array($subset) || $subset instanceof ArrayAccess)) {
            throw InvalidArgumentHelper::factory(1, 'array or ArrayAccess');
        }

        if (! (is_array($array) || $array instanceof ArrayAccess)) {
            throw InvalidArgumentHelper::factory(2, 'array or ArrayAccess');
        }

        $constraint = new ArraySubset($subset, $checkForObjectIdentity);

        static::assertThat($array, $constraint, $message);
    }
}
