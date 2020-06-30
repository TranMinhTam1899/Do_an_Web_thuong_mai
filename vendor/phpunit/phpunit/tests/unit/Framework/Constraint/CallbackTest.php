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

<<<<<<< HEAD
class CallbackTest extends ConstraintTestCase
=======
/**
 * @small
 */
final class CallbackTest extends ConstraintTestCase
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    public static function staticCallbackReturningTrue()
    {
        return true;
    }

    public function callbackReturningTrue()
    {
        return true;
    }

    public function testConstraintCallback(): void
    {
        $closureReflect = function ($parameter) {
            return $parameter;
        };

        $closureWithoutParameter = function () {
            return true;
        };

        $constraint = new Callback($closureWithoutParameter);
        $this->assertTrue($constraint->evaluate('', '', true));

        $constraint = new Callback($closureReflect);
        $this->assertTrue($constraint->evaluate(true, '', true));
        $this->assertFalse($constraint->evaluate(false, '', true));

        $callback   = [$this, 'callbackReturningTrue'];
        $constraint = new Callback($callback);
        $this->assertTrue($constraint->evaluate(false, '', true));

        $callback   = [self::class, 'staticCallbackReturningTrue'];
        $constraint = new Callback($callback);
        $this->assertTrue($constraint->evaluate(null, '', true));

        $this->assertEquals('is accepted by specified callback', $constraint->toString());
    }

    public function testConstraintCallbackFailure(): void
    {
        $constraint = new Callback(function () {
            return false;
        });

        $this->expectException(ExpectationFailedException::class);
        $this->expectExceptionMessage('Failed asserting that \'This fails\' is accepted by specified callback.');

        $constraint->evaluate('This fails');
    }
}
