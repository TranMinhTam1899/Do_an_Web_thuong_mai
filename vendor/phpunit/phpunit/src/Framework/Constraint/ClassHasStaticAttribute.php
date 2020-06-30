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

<<<<<<< HEAD
=======
use PHPUnit\Framework\Exception;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use ReflectionClass;

/**
 * Constraint that asserts that the class it is evaluated for has a given
 * static attribute.
 *
 * The attribute name is passed in the constructor.
 */
<<<<<<< HEAD
class ClassHasStaticAttribute extends ClassHasAttribute
=======
final class ClassHasStaticAttribute extends ClassHasAttribute
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return \sprintf(
            'has static attribute "%s"',
            $this->attributeName()
        );
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
<<<<<<< HEAD
        $class = new ReflectionClass($other);

        if ($class->hasProperty($this->attributeName())) {
            $attribute = $class->getProperty($this->attributeName());

            return $attribute->isStatic();
=======
        try {
            $class = new ReflectionClass($other);

            if ($class->hasProperty($this->attributeName())) {
                return $class->getProperty($this->attributeName())->isStatic();
            }
        } catch (\ReflectionException $e) {
            throw new Exception(
                $e->getMessage(),
                (int) $e->getCode(),
                $e
            );
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return false;
    }
}
