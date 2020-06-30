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
namespace PHPUnit\Framework\MockObject\Stub;

use PHPUnit\Framework\MockObject\Invocation;
<<<<<<< HEAD
use PHPUnit\Framework\MockObject\Invocation\ObjectInvocation;
use PHPUnit\Framework\MockObject\RuntimeException;
use PHPUnit\Framework\MockObject\Stub;

/**
 * Stubs a method by returning the current object.
 */
class ReturnSelf implements Stub
{
    public function invoke(Invocation $invocation)
    {
        if (!$invocation instanceof ObjectInvocation) {
            throw new RuntimeException(
                'The current object can only be returned when mocking an ' .
                'object, not a static class.'
            );
        }

=======
use PHPUnit\Framework\MockObject\RuntimeException;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class ReturnSelf implements Stub
{
    /**
     * @throws RuntimeException
     */
    public function invoke(Invocation $invocation)
    {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        return $invocation->getObject();
    }

    public function toString(): string
    {
        return 'return the current object';
    }
}
