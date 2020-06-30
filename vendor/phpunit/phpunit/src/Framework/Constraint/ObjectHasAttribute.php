<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\Constraint;

use ReflectionObject;

/**
 * Constraint that asserts that the object it is evaluated for has a given
 * attribute.
 *
 * The attribute name is passed in the constructor.
 */
<<<<<<< HEAD
class ObjectHasAttribute extends ClassHasAttribute
=======
final class ObjectHasAttribute extends ClassHasAttribute
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
<<<<<<< HEAD
        $object = new ReflectionObject($other);

        return $object->hasProperty($this->attributeName());
=======
        return (new ReflectionObject($other))->hasProperty($this->attributeName());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
