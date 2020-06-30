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

use PHPUnit\Framework\SelfDescribing;
use PHPUnit\Framework\TestCase;

<<<<<<< HEAD
=======
/**
 * @small
 */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
abstract class ConstraintTestCase extends TestCase
{
    final public function testIsCountable(): void
    {
        $className = $this->className();

        $reflection = new \ReflectionClass($className);

        $this->assertTrue($reflection->implementsInterface(\Countable::class), \sprintf(
            'Failed to assert that "%s" implements "%s".',
            $className,
            \Countable::class
        ));
    }

    final public function testIsSelfDescribing(): void
    {
        $className = $this->className();

        $reflection = new \ReflectionClass($className);

        $this->assertTrue($reflection->implementsInterface(SelfDescribing::class), \sprintf(
            'Failed to assert that "%s" implements "%s".',
            $className,
            SelfDescribing::class
        ));
    }

    /**
     * Returns the class name of the constraint.
     */
    final protected function className(): string
    {
        return \preg_replace(
            '/Test$/',
            '',
            static::class
        );
    }
}
