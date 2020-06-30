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

use PHPUnit\Framework\ExpectationFailedException;
<<<<<<< HEAD
use PHPUnit\Framework\MockObject\Matcher\AnyInvokedCount;
use PHPUnit\Framework\MockObject\Matcher\AnyParameters;
use PHPUnit\Framework\MockObject\Matcher\Invocation as MatcherInvocation;
use PHPUnit\Framework\MockObject\Matcher\InvokedCount;
use PHPUnit\Framework\MockObject\Matcher\MethodName;
use PHPUnit\Framework\MockObject\Matcher\Parameters;
use PHPUnit\Framework\TestFailure;

/**
 * Main matcher which defines a full expectation using method, parameter and
 * invocation matchers.
 * This matcher encapsulates all the other matchers and allows the builder to
 * set the specific matchers when the appropriate methods are called (once(),
 * where() etc.).
 *
 * All properties are public so that they can easily be accessed by the builder.
 */
class Matcher implements MatcherInvocation
{
    /**
     * @var MatcherInvocation
     */
    private $invocationMatcher;
=======
use PHPUnit\Framework\MockObject\Rule\AnyInvokedCount;
use PHPUnit\Framework\MockObject\Rule\AnyParameters;
use PHPUnit\Framework\MockObject\Rule\InvocationOrder;
use PHPUnit\Framework\MockObject\Rule\InvokedCount;
use PHPUnit\Framework\MockObject\Rule\MethodName;
use PHPUnit\Framework\MockObject\Rule\ParametersRule;
use PHPUnit\Framework\MockObject\Stub\Stub;
use PHPUnit\Framework\TestFailure;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Matcher
{
    /**
     * @var InvocationOrder
     */
    private $invocationRule;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * @var mixed
     */
    private $afterMatchBuilderId;

    /**
     * @var bool
     */
    private $afterMatchBuilderIsInvoked = false;

    /**
     * @var MethodName
     */
<<<<<<< HEAD
    private $methodNameMatcher;

    /**
     * @var Parameters
     */
    private $parametersMatcher;
=======
    private $methodNameRule;

    /**
     * @var ParametersRule
     */
    private $parametersRule;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * @var Stub
     */
    private $stub;

<<<<<<< HEAD
    public function __construct(MatcherInvocation $invocationMatcher)
    {
        $this->invocationMatcher = $invocationMatcher;
=======
    public function __construct(InvocationOrder $rule)
    {
        $this->invocationRule = $rule;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function hasMatchers(): bool
    {
<<<<<<< HEAD
        return $this->invocationMatcher !== null && !$this->invocationMatcher instanceof AnyInvokedCount;
    }

    public function hasMethodNameMatcher(): bool
    {
        return $this->methodNameMatcher !== null;
    }

    public function getMethodNameMatcher(): MethodName
    {
        return $this->methodNameMatcher;
    }

    public function setMethodNameMatcher(MethodName $matcher): void
    {
        $this->methodNameMatcher = $matcher;
    }

    public function hasParametersMatcher(): bool
    {
        return $this->parametersMatcher !== null;
    }

    public function getParametersMatcher(): Parameters
    {
        return $this->parametersMatcher;
    }

    public function setParametersMatcher($matcher): void
    {
        $this->parametersMatcher = $matcher;
    }

    public function setStub($stub): void
=======
        return !$this->invocationRule instanceof AnyInvokedCount;
    }

    public function hasMethodNameRule(): bool
    {
        return $this->methodNameRule !== null;
    }

    public function getMethodNameRule(): MethodName
    {
        return $this->methodNameRule;
    }

    public function setMethodNameRule(MethodName $rule): void
    {
        $this->methodNameRule = $rule;
    }

    public function hasParametersRule(): bool
    {
        return $this->parametersRule !== null;
    }

    public function setParametersRule(ParametersRule $rule): void
    {
        $this->parametersRule = $rule;
    }

    public function setStub(Stub $stub): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->stub = $stub;
    }

<<<<<<< HEAD
    public function setAfterMatchBuilderId($id): void
=======
    public function setAfterMatchBuilderId(string $id): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->afterMatchBuilderId = $id;
    }

    /**
     * @throws \Exception
     * @throws RuntimeException
     * @throws ExpectationFailedException
     */
    public function invoked(Invocation $invocation)
    {
<<<<<<< HEAD
        if ($this->invocationMatcher === null) {
            throw new RuntimeException(
                'No invocation matcher is set'
            );
        }

        if ($this->methodNameMatcher === null) {
            throw new RuntimeException('No method matcher is set');
        }

        if ($this->afterMatchBuilderId !== null) {
            $builder = $invocation->getObject()
                                  ->__phpunit_getInvocationMocker()
                                  ->lookupId($this->afterMatchBuilderId);

            if (!$builder) {
=======
        if ($this->methodNameRule === null) {
            throw new RuntimeException('No method rule is set');
        }

        if ($this->afterMatchBuilderId !== null) {
            $matcher = $invocation->getObject()
                                  ->__phpunit_getInvocationHandler()
                                  ->lookupMatcher($this->afterMatchBuilderId);

            if (!$matcher) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                throw new RuntimeException(
                    \sprintf(
                        'No builder found for match builder identification <%s>',
                        $this->afterMatchBuilderId
                    )
                );
            }
<<<<<<< HEAD

            $matcher = $builder->getMatcher();

            if ($matcher && $matcher->invocationMatcher->hasBeenInvoked()) {
=======
            \assert($matcher instanceof self);

            if ($matcher->invocationRule->hasBeenInvoked()) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                $this->afterMatchBuilderIsInvoked = true;
            }
        }

<<<<<<< HEAD
        $this->invocationMatcher->invoked($invocation);

        try {
            if ($this->parametersMatcher !== null &&
                !$this->parametersMatcher->matches($invocation)) {
                $this->parametersMatcher->verify();
=======
        $this->invocationRule->invoked($invocation);

        try {
            if ($this->parametersRule !== null) {
                $this->parametersRule->apply($invocation);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            }
        } catch (ExpectationFailedException $e) {
            throw new ExpectationFailedException(
                \sprintf(
                    "Expectation failed for %s when %s\n%s",
<<<<<<< HEAD
                    $this->methodNameMatcher->toString(),
                    $this->invocationMatcher->toString(),
=======
                    $this->methodNameRule->toString(),
                    $this->invocationRule->toString(),
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                    $e->getMessage()
                ),
                $e->getComparisonFailure()
            );
        }

        if ($this->stub) {
            return $this->stub->invoke($invocation);
        }

        return $invocation->generateReturnValue();
    }

    /**
     * @throws RuntimeException
     * @throws ExpectationFailedException
<<<<<<< HEAD
     *
     * @return bool
     */
    public function matches(Invocation $invocation)
    {
        if ($this->afterMatchBuilderId !== null) {
            $builder = $invocation->getObject()
                                  ->__phpunit_getInvocationMocker()
                                  ->lookupId($this->afterMatchBuilderId);

            if (!$builder) {
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function matches(Invocation $invocation): bool
    {
        if ($this->afterMatchBuilderId !== null) {
            $matcher = $invocation->getObject()
                                  ->__phpunit_getInvocationHandler()
                                  ->lookupMatcher($this->afterMatchBuilderId);

            if (!$matcher) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                throw new RuntimeException(
                    \sprintf(
                        'No builder found for match builder identification <%s>',
                        $this->afterMatchBuilderId
                    )
                );
            }
<<<<<<< HEAD

            $matcher = $builder->getMatcher();

            if (!$matcher) {
                return false;
            }

            if (!$matcher->invocationMatcher->hasBeenInvoked()) {
                return false;
            }
        }

        if ($this->invocationMatcher === null) {
            throw new RuntimeException(
                'No invocation matcher is set'
            );
        }

        if ($this->methodNameMatcher === null) {
            throw new RuntimeException('No method matcher is set');
        }

        if (!$this->invocationMatcher->matches($invocation)) {
=======
            \assert($matcher instanceof self);

            if (!$matcher->invocationRule->hasBeenInvoked()) {
                return false;
            }
        }

        if ($this->methodNameRule === null) {
            throw new RuntimeException('No method rule is set');
        }

        if (!$this->invocationRule->matches($invocation)) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            return false;
        }

        try {
<<<<<<< HEAD
            if (!$this->methodNameMatcher->matches($invocation)) {
=======
            if (!$this->methodNameRule->matches($invocation)) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                return false;
            }
        } catch (ExpectationFailedException $e) {
            throw new ExpectationFailedException(
                \sprintf(
                    "Expectation failed for %s when %s\n%s",
<<<<<<< HEAD
                    $this->methodNameMatcher->toString(),
                    $this->invocationMatcher->toString(),
=======
                    $this->methodNameRule->toString(),
                    $this->invocationRule->toString(),
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                    $e->getMessage()
                ),
                $e->getComparisonFailure()
            );
        }

        return true;
    }

    /**
     * @throws RuntimeException
     * @throws ExpectationFailedException
<<<<<<< HEAD
     */
    public function verify(): void
    {
        if ($this->invocationMatcher === null) {
            throw new RuntimeException(
                'No invocation matcher is set'
            );
        }

        if ($this->methodNameMatcher === null) {
            throw new RuntimeException('No method matcher is set');
        }

        try {
            $this->invocationMatcher->verify();

            if ($this->parametersMatcher === null) {
                $this->parametersMatcher = new AnyParameters;
            }

            $invocationIsAny   = $this->invocationMatcher instanceof AnyInvokedCount;
            $invocationIsNever = $this->invocationMatcher instanceof InvokedCount && $this->invocationMatcher->isNever();

            if (!$invocationIsAny && !$invocationIsNever) {
                $this->parametersMatcher->verify();
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function verify(): void
    {
        if ($this->methodNameRule === null) {
            throw new RuntimeException('No method rule is set');
        }

        try {
            $this->invocationRule->verify();

            if ($this->parametersRule === null) {
                $this->parametersRule = new AnyParameters;
            }

            $invocationIsAny   = $this->invocationRule instanceof AnyInvokedCount;
            $invocationIsNever = $this->invocationRule instanceof InvokedCount && $this->invocationRule->isNever();

            if (!$invocationIsAny && !$invocationIsNever) {
                $this->parametersRule->verify();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            }
        } catch (ExpectationFailedException $e) {
            throw new ExpectationFailedException(
                \sprintf(
                    "Expectation failed for %s when %s.\n%s",
<<<<<<< HEAD
                    $this->methodNameMatcher->toString(),
                    $this->invocationMatcher->toString(),
=======
                    $this->methodNameRule->toString(),
                    $this->invocationRule->toString(),
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                    TestFailure::exceptionToString($e)
                )
            );
        }
    }

    public function toString(): string
    {
        $list = [];

<<<<<<< HEAD
        if ($this->invocationMatcher !== null) {
            $list[] = $this->invocationMatcher->toString();
        }

        if ($this->methodNameMatcher !== null) {
            $list[] = 'where ' . $this->methodNameMatcher->toString();
        }

        if ($this->parametersMatcher !== null) {
            $list[] = 'and ' . $this->parametersMatcher->toString();
=======
        if ($this->invocationRule !== null) {
            $list[] = $this->invocationRule->toString();
        }

        if ($this->methodNameRule !== null) {
            $list[] = 'where ' . $this->methodNameRule->toString();
        }

        if ($this->parametersRule !== null) {
            $list[] = 'and ' . $this->parametersRule->toString();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        if ($this->afterMatchBuilderId !== null) {
            $list[] = 'after ' . $this->afterMatchBuilderId;
        }

        if ($this->stub !== null) {
            $list[] = 'will ' . $this->stub->toString();
        }

        return \implode(' ', $list);
    }
}
