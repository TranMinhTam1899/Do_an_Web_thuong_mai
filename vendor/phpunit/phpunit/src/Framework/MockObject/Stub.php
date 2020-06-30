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
namespace PHPUnit\Framework\MockObject;

<<<<<<< HEAD
use PHPUnit\Framework\SelfDescribing;

/**
 * An object that stubs the process of a normal method for a mock object.
 *
 * The stub object will replace the code for the stubbed method and return a
 * specific value instead of the original value.
 */
interface Stub extends SelfDescribing
{
    /**
     * Fakes the processing of the invocation $invocation by returning a
     * specific value.
     *
     * @param Invocation $invocation The invocation which was mocked and matched by the current method and argument matchers
     */
    public function invoke(Invocation $invocation);
=======
use PHPUnit\Framework\MockObject\Builder\InvocationStubber;

/**
 * @method InvocationStubber method($constraint)
 */
interface Stub
{
    public function __phpunit_getInvocationHandler(): InvocationHandler;

    public function __phpunit_hasMatchers(): bool;

    public function __phpunit_setReturnValueGeneration(bool $returnValueGeneration): void;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
