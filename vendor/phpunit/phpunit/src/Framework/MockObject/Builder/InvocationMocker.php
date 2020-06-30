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
namespace PHPUnit\Framework\MockObject\Builder;

use PHPUnit\Framework\Constraint\Constraint;
<<<<<<< HEAD
use PHPUnit\Framework\MockObject\Matcher;
use PHPUnit\Framework\MockObject\Matcher\Invocation;
use PHPUnit\Framework\MockObject\RuntimeException;
use PHPUnit\Framework\MockObject\Stub;
use PHPUnit\Framework\MockObject\Stub\MatcherCollection;

/**
 * Builder for mocked or stubbed invocations.
 *
 * Provides methods for building expectations without having to resort to
 * instantiating the various matchers manually. These methods also form a
 * more natural way of reading the expectation. This class should be together
 * with the test case PHPUnit\Framework\MockObject\TestCase.
 */
class InvocationMocker implements MethodNameMatch
{
    /**
     * @var MatcherCollection
     */
    private $collection;
=======
use PHPUnit\Framework\MockObject\ConfigurableMethod;
use PHPUnit\Framework\MockObject\IncompatibleReturnValueException;
use PHPUnit\Framework\MockObject\InvocationHandler;
use PHPUnit\Framework\MockObject\Matcher;
use PHPUnit\Framework\MockObject\Rule;
use PHPUnit\Framework\MockObject\RuntimeException;
use PHPUnit\Framework\MockObject\Stub\ConsecutiveCalls;
use PHPUnit\Framework\MockObject\Stub\Exception;
use PHPUnit\Framework\MockObject\Stub\ReturnArgument;
use PHPUnit\Framework\MockObject\Stub\ReturnCallback;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;
use PHPUnit\Framework\MockObject\Stub\ReturnSelf;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;
use PHPUnit\Framework\MockObject\Stub\ReturnValueMap;
use PHPUnit\Framework\MockObject\Stub\Stub;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class InvocationMocker implements InvocationStubber, MethodNameMatch
{
    /**
     * @var InvocationHandler
     */
    private $invocationHandler;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * @var Matcher
     */
    private $matcher;

    /**
<<<<<<< HEAD
     * @var string[]
     */
    private $configurableMethods;

    public function __construct(MatcherCollection $collection, Invocation $invocationMatcher, array $configurableMethods)
    {
        $this->collection = $collection;
        $this->matcher    = new Matcher($invocationMatcher);

        $this->collection->addMatcher($this->matcher);

        $this->configurableMethods = $configurableMethods;
    }

    /**
     * @return Matcher
     */
    public function getMatcher()
    {
        return $this->matcher;
    }

    /**
     * @return InvocationMocker
     */
    public function id($id)
    {
        $this->collection->registerId($id, $this);
=======
     * @var ConfigurableMethod[]
     */
    private $configurableMethods;

    public function __construct(InvocationHandler $handler, Matcher $matcher, ConfigurableMethod ...$configurableMethods)
    {
        $this->invocationHandler   = $handler;
        $this->matcher             = $matcher;
        $this->configurableMethods = $configurableMethods;
    }

    public function id($id): self
    {
        $this->invocationHandler->registerMatcher($id, $this->matcher);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return InvocationMocker
     */
    public function will(Stub $stub)
=======
    public function will(Stub $stub): Identity
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->matcher->setStub($stub);

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return InvocationMocker
     */
    public function willReturn($value, ...$nextValues)
    {
        if (\count($nextValues) === 0) {
            $stub = new Stub\ReturnStub($value);
        } else {
            $stub = new Stub\ConsecutiveCalls(
                \array_merge([$value], $nextValues)
            );
=======
    public function willReturn($value, ...$nextValues): self
    {
        if (\count($nextValues) === 0) {
            $this->ensureTypeOfReturnValues([$value]);

            $stub = new ReturnStub($value);
        } else {
            $values = \array_merge([$value], $nextValues);

            $this->ensureTypeOfReturnValues($values);

            $stub = new ConsecutiveCalls($values);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return $this->will($stub);
    }

<<<<<<< HEAD
    /**
     * @param mixed $reference
     *
     * @return InvocationMocker
     */
    public function willReturnReference(&$reference)
    {
        $stub = new Stub\ReturnReference($reference);
=======
    /** {@inheritDoc} */
    public function willReturnReference(&$reference): self
    {
        $stub = new ReturnReference($reference);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return $this->will($stub);
    }

<<<<<<< HEAD
    /**
     * @return InvocationMocker
     */
    public function willReturnMap(array $valueMap)
    {
        $stub = new Stub\ReturnValueMap($valueMap);
=======
    public function willReturnMap(array $valueMap): self
    {
        $stub = new ReturnValueMap($valueMap);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return $this->will($stub);
    }

<<<<<<< HEAD
    /**
     * @return InvocationMocker
     */
    public function willReturnArgument($argumentIndex)
    {
        $stub = new Stub\ReturnArgument($argumentIndex);
=======
    public function willReturnArgument($argumentIndex): self
    {
        $stub = new ReturnArgument($argumentIndex);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return $this->will($stub);
    }

<<<<<<< HEAD
    /**
     * @param callable $callback
     *
     * @return InvocationMocker
     */
    public function willReturnCallback($callback)
    {
        $stub = new Stub\ReturnCallback($callback);
=======
    /** {@inheritDoc} */
    public function willReturnCallback($callback): self
    {
        $stub = new ReturnCallback($callback);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return $this->will($stub);
    }

<<<<<<< HEAD
    /**
     * @return InvocationMocker
     */
    public function willReturnSelf()
    {
        $stub = new Stub\ReturnSelf;
=======
    public function willReturnSelf(): self
    {
        $stub = new ReturnSelf;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return $this->will($stub);
    }

<<<<<<< HEAD
    /**
     * @return InvocationMocker
     */
    public function willReturnOnConsecutiveCalls(...$values)
    {
        $stub = new Stub\ConsecutiveCalls($values);
=======
    public function willReturnOnConsecutiveCalls(...$values): self
    {
        $stub = new ConsecutiveCalls($values);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return $this->will($stub);
    }

<<<<<<< HEAD
    /**
     * @return InvocationMocker
     */
    public function willThrowException(\Throwable $exception)
    {
        $stub = new Stub\Exception($exception);
=======
    public function willThrowException(\Throwable $exception): self
    {
        $stub = new Exception($exception);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return $this->will($stub);
    }

<<<<<<< HEAD
    /**
     * @return InvocationMocker
     */
    public function after($id)
=======
    public function after($id): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->matcher->setAfterMatchBuilderId($id);

        return $this;
    }

    /**
<<<<<<< HEAD
     * @param array ...$arguments
     *
     * @throws RuntimeException
     *
     * @return InvocationMocker
     */
    public function with(...$arguments)
    {
        $this->canDefineParameters();

        $this->matcher->setParametersMatcher(new Matcher\Parameters($arguments));
=======
     * @throws RuntimeException
     */
    public function with(...$arguments): self
    {
        $this->canDefineParameters();

        $this->matcher->setParametersRule(new Rule\Parameters($arguments));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return $this;
    }

    /**
     * @param array ...$arguments
     *
     * @throws RuntimeException
<<<<<<< HEAD
     *
     * @return InvocationMocker
     */
    public function withConsecutive(...$arguments)
    {
        $this->canDefineParameters();

        $this->matcher->setParametersMatcher(new Matcher\ConsecutiveParameters($arguments));
=======
     */
    public function withConsecutive(...$arguments): self
    {
        $this->canDefineParameters();

        $this->matcher->setParametersRule(new Rule\ConsecutiveParameters($arguments));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return $this;
    }

    /**
     * @throws RuntimeException
<<<<<<< HEAD
     *
     * @return InvocationMocker
     */
    public function withAnyParameters()
    {
        $this->canDefineParameters();

        $this->matcher->setParametersMatcher(new Matcher\AnyParameters);
=======
     */
    public function withAnyParameters(): self
    {
        $this->canDefineParameters();

        $this->matcher->setParametersRule(new Rule\AnyParameters);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return $this;
    }

    /**
     * @param Constraint|string $constraint
     *
     * @throws RuntimeException
<<<<<<< HEAD
     *
     * @return InvocationMocker
     */
    public function method($constraint)
    {
        if ($this->matcher->hasMethodNameMatcher()) {
            throw new RuntimeException(
                'Method name matcher is already defined, cannot redefine'
            );
        }

        if (\is_string($constraint) && !\in_array(\strtolower($constraint), $this->configurableMethods, true)) {
=======
     */
    public function method($constraint): self
    {
        if ($this->matcher->hasMethodNameRule()) {
            throw new RuntimeException(
                'Rule for method name is already defined, cannot redefine'
            );
        }

        $configurableMethodNames = \array_map(
            static function (ConfigurableMethod $configurable) {
                return \strtolower($configurable->getName());
            },
            $this->configurableMethods
        );

        if (\is_string($constraint) && !\in_array(\strtolower($constraint), $configurableMethodNames, true)) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            throw new RuntimeException(
                \sprintf(
                    'Trying to configure method "%s" which cannot be configured because it does not exist, has not been specified, is final, or is static',
                    $constraint
                )
            );
        }

<<<<<<< HEAD
        $this->matcher->setMethodNameMatcher(new Matcher\MethodName($constraint));
=======
        $this->matcher->setMethodNameRule(new Rule\MethodName($constraint));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return $this;
    }

    /**
<<<<<<< HEAD
     * Validate that a parameters matcher can be defined, throw exceptions otherwise.
=======
     * Validate that a parameters rule can be defined, throw exceptions otherwise.
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     *
     * @throws RuntimeException
     */
    private function canDefineParameters(): void
    {
<<<<<<< HEAD
        if (!$this->matcher->hasMethodNameMatcher()) {
            throw new RuntimeException(
                'Method name matcher is not defined, cannot define parameter ' .
                'matcher without one'
            );
        }

        if ($this->matcher->hasParametersMatcher()) {
            throw new RuntimeException(
                'Parameter matcher is already defined, cannot redefine'
            );
        }
    }
=======
        if (!$this->matcher->hasMethodNameRule()) {
            throw new RuntimeException(
                'Rule for method name is not defined, cannot define rule for parameters ' .
                'without one'
            );
        }

        if ($this->matcher->hasParametersRule()) {
            throw new RuntimeException(
                'Rule for parameters is already defined, cannot redefine'
            );
        }
    }

    private function getConfiguredMethod(): ?ConfigurableMethod
    {
        $configuredMethod = null;

        foreach ($this->configurableMethods as $configurableMethod) {
            if ($this->matcher->getMethodNameRule()->matchesName($configurableMethod->getName())) {
                if ($configuredMethod !== null) {
                    return null;
                }

                $configuredMethod = $configurableMethod;
            }
        }

        return $configuredMethod;
    }

    private function ensureTypeOfReturnValues(array $values): void
    {
        $configuredMethod = $this->getConfiguredMethod();

        if ($configuredMethod === null) {
            return;
        }

        foreach ($values as $value) {
            if (!$configuredMethod->mayReturn($value)) {
                throw new IncompatibleReturnValueException(
                    \sprintf(
                        'Method %s may not return value of type %s, its return declaration is "%s"',
                        $configuredMethod->getName(),
                        \is_object($value) ? \get_class($value) : \gettype($value),
                        $configuredMethod->getReturnTypeDeclaration()
                    )
                );
            }
        }
    }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
