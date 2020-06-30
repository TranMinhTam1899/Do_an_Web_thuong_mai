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
class IsWritableTest extends ConstraintTestCase
=======
/**
 * @small
 */
final class IsWritableTest extends ConstraintTestCase
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    public function testConstraintIsWritable(): void
    {
        $constraint = new IsWritable;

        $this->assertFalse($constraint->evaluate('foo', '', true));
        $this->assertEquals('is writable', $constraint->toString());
        $this->assertCount(1, $constraint);

        try {
            $constraint->evaluate('foo');
        } catch (ExpectationFailedException $e) {
            $this->assertEquals(
                <<<EOF
Failed asserting that "foo" is writable.

EOF
                ,
                TestFailure::exceptionToString($e)
            );

            return;
        }

        $this->fail();
    }
}
