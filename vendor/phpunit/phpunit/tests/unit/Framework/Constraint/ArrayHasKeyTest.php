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

use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestFailure;

<<<<<<< HEAD
class ArrayHasKeyTest extends ConstraintTestCase
=======
/**
 * @small
 */
final class ArrayHasKeyTest extends ConstraintTestCase
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    public function testConstraintArrayHasKey(): void
    {
        $constraint = new ArrayHasKey(0);

        $this->assertFalse($constraint->evaluate([], '', true));
        $this->assertEquals('has the key 0', $constraint->toString());
        $this->assertCount(1, $constraint);

        try {
            $constraint->evaluate([]);
        } catch (ExpectationFailedException $e) {
            $this->assertEquals(
                <<<EOF
Failed asserting that an array has the key 0.

EOF
                ,
                TestFailure::exceptionToString($e)
            );

            return;
        }

        $this->fail();
    }

    public function testConstraintArrayHasKey2(): void
    {
        $constraint = new ArrayHasKey(0);

        try {
            $constraint->evaluate([], 'custom message');
        } catch (ExpectationFailedException $e) {
            $this->assertEquals(
                <<<EOF
custom message\nFailed asserting that an array has the key 0.

EOF
                ,
                TestFailure::exceptionToString($e)
            );

            return;
        }

        $this->fail();
    }
<<<<<<< HEAD
=======

    public function testConstraintArrayHasKey0(): void
    {
        $contraint = new ArrayHasKey(0);

        try {
            $contraint->evaluate(0, '');
        } catch (ExpectationFailedException  $e) {
            $this->assertEquals(
                <<<EOF
Failed asserting that an array has the key 0.

EOF
                ,
                TestFailure::exceptionToString($e)
            );
        }
    }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
