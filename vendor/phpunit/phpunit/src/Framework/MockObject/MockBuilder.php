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

use PHPUnit\Framework\TestCase;

/**
<<<<<<< HEAD
 * Implementation of the Builder pattern for Mock objects.
 */
class MockBuilder
=======
 * @psalm-template MockedType
 */
final class MockBuilder
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @var TestCase
     */
    private $testCase;

    /**
     * @var string
     */
    private $type;

    /**
<<<<<<< HEAD
     * @var array
=======
     * @var string[]
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    private $methods = [];

    /**
<<<<<<< HEAD
     * @var array
     */
    private $methodsExcept = [];
=======
     * @var bool
     */
    private $emptyMethodsArray = false;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * @var string
     */
    private $mockClassName = '';

    /**
     * @var array
     */
    private $constructorArgs = [];

    /**
     * @var bool
     */
    private $originalConstructor = true;

    /**
     * @var bool
     */
    private $originalClone = true;

    /**
     * @var bool
     */
    private $autoload = true;

    /**
     * @var bool
     */
    private $cloneArguments = false;

    /**
     * @var bool
     */
    private $callOriginalMethods = false;

    /**
<<<<<<< HEAD
     * @var object
=======
     * @var ?object
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    private $proxyTarget;

    /**
     * @var bool
     */
    private $allowMockingUnknownTypes = true;

    /**
     * @var bool
     */
    private $returnValueGeneration = true;

    /**
     * @var Generator
     */
    private $generator;

    /**
<<<<<<< HEAD
     * @param array|string $type
=======
     * @var bool
     */
    private $alreadyUsedMockMethodConfiguration = false;

    /**
     * @param string|string[] $type
     *
     * @psalm-param class-string<MockedType>|string|string[] $type
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function __construct(TestCase $testCase, $type)
    {
        $this->testCase  = $testCase;
        $this->type      = $type;
        $this->generator = new Generator;
    }

    /**
     * Creates a mock object using a fluent interface.
     *
<<<<<<< HEAD
     * @return MockObject
     */
    public function getMock()
    {
        $object = $this->generator->getMock(
            $this->type,
            $this->methods,
=======
     * @throws RuntimeException
     *
     * @psalm-return MockObject&MockedType
     */
    public function getMock(): MockObject
    {
        $object = $this->generator->getMock(
            $this->type,
            !$this->emptyMethodsArray ? $this->methods : null,
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $this->constructorArgs,
            $this->mockClassName,
            $this->originalConstructor,
            $this->originalClone,
            $this->autoload,
            $this->cloneArguments,
            $this->callOriginalMethods,
            $this->proxyTarget,
            $this->allowMockingUnknownTypes,
            $this->returnValueGeneration
        );

        $this->testCase->registerMockObject($object);

        return $object;
    }

    /**
     * Creates a mock object for an abstract class using a fluent interface.
     *
<<<<<<< HEAD
     * @return MockObject
     */
    public function getMockForAbstractClass()
=======
     * @throws \PHPUnit\Framework\Exception
     * @throws RuntimeException
     *
     * @psalm-return MockObject&MockedType
     */
    public function getMockForAbstractClass(): MockObject
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $object = $this->generator->getMockForAbstractClass(
            $this->type,
            $this->constructorArgs,
            $this->mockClassName,
            $this->originalConstructor,
            $this->originalClone,
            $this->autoload,
            $this->methods,
            $this->cloneArguments
        );

        $this->testCase->registerMockObject($object);

        return $object;
    }

    /**
     * Creates a mock object for a trait using a fluent interface.
     *
<<<<<<< HEAD
     * @return MockObject
     */
    public function getMockForTrait()
=======
     * @throws \PHPUnit\Framework\Exception
     * @throws RuntimeException
     *
     * @psalm-return MockObject&MockedType
     */
    public function getMockForTrait(): MockObject
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $object = $this->generator->getMockForTrait(
            $this->type,
            $this->constructorArgs,
            $this->mockClassName,
            $this->originalConstructor,
            $this->originalClone,
            $this->autoload,
            $this->methods,
            $this->cloneArguments
        );

        $this->testCase->registerMockObject($object);

        return $object;
    }

    /**
     * Specifies the subset of methods to mock. Default is to mock none of them.
     *
<<<<<<< HEAD
     * @return MockBuilder
     */
    public function setMethods(array $methods = null)
    {
        $this->methods = $methods;

=======
     * @deprecated https://github.com/sebastianbergmann/phpunit/pull/3687
     */
    public function setMethods(array $methods = null): self
    {
        $this->methods = $methods;

        $this->alreadyUsedMockMethodConfiguration = true;

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        return $this;
    }

    /**
<<<<<<< HEAD
     * Specifies the subset of methods to not mock. Default is to mock all of them.
     *
     * @return MockBuilder
     */
    public function setMethodsExcept(array $methods = [])
    {
        $this->methodsExcept = $methods;

        $this->setMethods(
            \array_diff(
                $this->generator->getClassMethods($this->type),
                $this->methodsExcept
            )
        );

        return $this;
=======
     * Specifies the subset of methods to mock, requiring each to exist in the class
     *
     * @param string[] $methods
     *
     * @throws RuntimeException
     */
    public function onlyMethods(array $methods): self
    {
        if (empty($methods)) {
            $this->emptyMethodsArray = true;

            return $this;
        }

        if ($this->alreadyUsedMockMethodConfiguration) {
            throw new RuntimeException(
                \sprintf(
                    'Cannot use onlyMethods() on "%s" mock because mocked methods were already configured.',
                    $this->type
                )
            );
        }

        $this->alreadyUsedMockMethodConfiguration = true;

        try {
            $reflector = new \ReflectionClass($this->type);
        } catch (\ReflectionException $e) {
            throw new RuntimeException(
                $e->getMessage(),
                (int) $e->getCode(),
                $e
            );
        }

        foreach ($methods as $method) {
            if (!$reflector->hasMethod($method)) {
                throw new RuntimeException(
                    \sprintf(
                        'Trying to set mock method "%s" with onlyMethods, but it does not exist in class "%s". Use addMethods() for methods that don\'t exist in the class.',
                        $method,
                        $this->type
                    )
                );
            }
        }

        $this->methods = $methods;

        return $this;
    }

    /**
     * Specifies methods that don't exist in the class which you want to mock
     *
     * @param string[] $methods
     *
     * @throws RuntimeException
     */
    public function addMethods(array $methods): self
    {
        if (empty($methods)) {
            $this->emptyMethodsArray = true;

            return $this;
        }

        if ($this->alreadyUsedMockMethodConfiguration) {
            throw new RuntimeException(
                \sprintf(
                    'Cannot use addMethods() on "%s" mock because mocked methods were already configured.',
                    $this->type
                )
            );
        }

        $this->alreadyUsedMockMethodConfiguration = true;

        try {
            $reflector = new \ReflectionClass($this->type);
        } catch (\ReflectionException $e) {
            throw new RuntimeException(
                $e->getMessage(),
                (int) $e->getCode(),
                $e
            );
        }

        foreach ($methods as $method) {
            if ($reflector->hasMethod($method)) {
                throw new RuntimeException(
                    \sprintf(
                        'Trying to set mock method "%s" with addMethods(), but it exists in class "%s". Use onlyMethods() for methods that exist in the class.',
                        $method,
                        $this->type
                    )
                );
            }
        }

        $this->methods = $methods;

        return $this;
    }

    /**
     * Specifies the subset of methods to not mock. Default is to mock all of them.
     */
    public function setMethodsExcept(array $methods = []): self
    {
        return $this->setMethods(
            \array_diff(
                $this->generator->getClassMethods($this->type),
                $methods
            )
        );
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Specifies the arguments for the constructor.
<<<<<<< HEAD
     *
     * @return MockBuilder
     */
    public function setConstructorArgs(array $args)
=======
     */
    public function setConstructorArgs(array $args): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->constructorArgs = $args;

        return $this;
    }

    /**
     * Specifies the name for the mock class.
<<<<<<< HEAD
     *
     * @param string $name
     *
     * @return MockBuilder
     */
    public function setMockClassName($name)
=======
     */
    public function setMockClassName(string $name): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->mockClassName = $name;

        return $this;
    }

    /**
     * Disables the invocation of the original constructor.
<<<<<<< HEAD
     *
     * @return MockBuilder
     */
    public function disableOriginalConstructor()
=======
     */
    public function disableOriginalConstructor(): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->originalConstructor = false;

        return $this;
    }

    /**
     * Enables the invocation of the original constructor.
<<<<<<< HEAD
     *
     * @return MockBuilder
     */
    public function enableOriginalConstructor()
=======
     */
    public function enableOriginalConstructor(): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->originalConstructor = true;

        return $this;
    }

    /**
     * Disables the invocation of the original clone constructor.
<<<<<<< HEAD
     *
     * @return MockBuilder
     */
    public function disableOriginalClone()
=======
     */
    public function disableOriginalClone(): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->originalClone = false;

        return $this;
    }

    /**
     * Enables the invocation of the original clone constructor.
<<<<<<< HEAD
     *
     * @return MockBuilder
     */
    public function enableOriginalClone()
=======
     */
    public function enableOriginalClone(): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->originalClone = true;

        return $this;
    }

    /**
     * Disables the use of class autoloading while creating the mock object.
<<<<<<< HEAD
     *
     * @return MockBuilder
     */
    public function disableAutoload()
=======
     */
    public function disableAutoload(): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->autoload = false;

        return $this;
    }

    /**
     * Enables the use of class autoloading while creating the mock object.
<<<<<<< HEAD
     *
     * @return MockBuilder
     */
    public function enableAutoload()
=======
     */
    public function enableAutoload(): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->autoload = true;

        return $this;
    }

    /**
     * Disables the cloning of arguments passed to mocked methods.
<<<<<<< HEAD
     *
     * @return MockBuilder
     */
    public function disableArgumentCloning()
=======
     */
    public function disableArgumentCloning(): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->cloneArguments = false;

        return $this;
    }

    /**
     * Enables the cloning of arguments passed to mocked methods.
<<<<<<< HEAD
     *
     * @return MockBuilder
     */
    public function enableArgumentCloning()
=======
     */
    public function enableArgumentCloning(): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->cloneArguments = true;

        return $this;
    }

    /**
     * Enables the invocation of the original methods.
<<<<<<< HEAD
     *
     * @return MockBuilder
     */
    public function enableProxyingToOriginalMethods()
=======
     */
    public function enableProxyingToOriginalMethods(): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->callOriginalMethods = true;

        return $this;
    }

    /**
     * Disables the invocation of the original methods.
<<<<<<< HEAD
     *
     * @return MockBuilder
     */
    public function disableProxyingToOriginalMethods()
=======
     */
    public function disableProxyingToOriginalMethods(): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->callOriginalMethods = false;
        $this->proxyTarget         = null;

        return $this;
    }

    /**
     * Sets the proxy target.
<<<<<<< HEAD
     *
     * @param object $object
     *
     * @return MockBuilder
     */
    public function setProxyTarget($object)
=======
     */
    public function setProxyTarget(object $object): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->proxyTarget = $object;

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return MockBuilder
     */
    public function allowMockingUnknownTypes()
=======
    public function allowMockingUnknownTypes(): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->allowMockingUnknownTypes = true;

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return MockBuilder
     */
    public function disallowMockingUnknownTypes()
=======
    public function disallowMockingUnknownTypes(): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->allowMockingUnknownTypes = false;

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return MockBuilder
     */
    public function enableAutoReturnValueGeneration()
=======
    public function enableAutoReturnValueGeneration(): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->returnValueGeneration = true;

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return MockBuilder
     */
    public function disableAutoReturnValueGeneration()
=======
    public function disableAutoReturnValueGeneration(): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->returnValueGeneration = false;

        return $this;
    }
}
