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
class ClassHasStaticAttributeTest extends ConstraintTestCase
=======
/**
 * @small
 */
final class ClassHasStaticAttributeTest extends ConstraintTestCase
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    public function testConstraintClassHasStaticAttribute(): void
    {
        $constraint = new ClassHasStaticAttribute('privateStaticAttribute');

        $this->assertTrue($constraint->evaluate(\ClassWithNonPublicAttributes::class, '', true));
        $this->assertFalse($constraint->evaluate(\stdClass::class, '', true));
        $this->assertEquals('has static attribute "privateStaticAttribute"', $constraint->toString());
        $this->assertCount(1, $constraint);

        try {
            $constraint->evaluate(\stdClass::class);
        } catch (ExpectationFailedException $e) {
            $this->assertEquals(
                <<<EOF
Failed asserting that class "stdClass" has static attribute "privateStaticAttribute".

EOF
                ,
                TestFailure::exceptionToString($e)
            );

            return;
        }

        $this->fail();
    }

    public function testConstraintClassHasStaticAttribute2(): void
    {
        $constraint = new ClassHasStaticAttribute('foo');

        try {
            $constraint->evaluate(\stdClass::class, 'custom message');
        } catch (ExpectationFailedException $e) {
            $this->assertEquals(
                <<<EOF
custom message
Failed asserting that class "stdClass" has static attribute "foo".

EOF
                ,
                TestFailure::exceptionToString($e)
            );

            return;
        }

        $this->fail();
    }
}
