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

use Doctrine\Instantiator\Exception\ExceptionInterface as InstantiatorException;
use Doctrine\Instantiator\Instantiator;
<<<<<<< HEAD
use Iterator;
use IteratorAggregate;
use PHPUnit\Framework\Exception;
use PHPUnit\Util\InvalidArgumentHelper;
use ReflectionClass;
use ReflectionMethod;
use SoapClient;
use Text_Template;
use Traversable;

/**
 * Mock Object Code Generator
 */
class Generator
=======
use PHPUnit\Framework\InvalidArgumentException;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Generator
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @var array
     */
    private const BLACKLISTED_METHOD_NAMES = [
        '__CLASS__'       => true,
        '__DIR__'         => true,
        '__FILE__'        => true,
        '__FUNCTION__'    => true,
        '__LINE__'        => true,
        '__METHOD__'      => true,
        '__NAMESPACE__'   => true,
        '__TRAIT__'       => true,
        '__clone'         => true,
        '__halt_compiler' => true,
    ];

    /**
     * @var array
     */
    private static $cache = [];

    /**
<<<<<<< HEAD
     * @var Text_Template[]
=======
     * @var \Text_Template[]
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    private static $templates = [];

    /**
     * Returns a mock object for the specified class.
     *
     * @param string|string[] $type
<<<<<<< HEAD
     * @param array           $methods
     * @param string          $mockClassName
     * @param bool            $callOriginalConstructor
     * @param bool            $callOriginalClone
     * @param bool            $callAutoload
     * @param bool            $cloneArguments
     * @param bool            $callOriginalMethods
     * @param object          $proxyTarget
     * @param bool            $allowMockingUnknownTypes
     * @param bool            $returnValueGeneration
     *
     * @throws Exception
     * @throws RuntimeException
     * @throws \PHPUnit\Framework\Exception
     * @throws \ReflectionException
     *
     * @return MockObject
     */
    public function getMock($type, $methods = [], array $arguments = [], $mockClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $cloneArguments = true, $callOriginalMethods = false, $proxyTarget = null, $allowMockingUnknownTypes = true, $returnValueGeneration = true)
    {
        if (!\is_array($type) && !\is_string($type)) {
            throw InvalidArgumentHelper::factory(1, 'array or string');
        }

        if (!\is_string($mockClassName)) {
            throw InvalidArgumentHelper::factory(4, 'string');
        }

        if (!\is_array($methods) && null !== $methods) {
            throw InvalidArgumentHelper::factory(2, 'array', $methods);
=======
     * @param null|array      $methods
     *
     * @throws RuntimeException
     */
    public function getMock($type, $methods = [], array $arguments = [], string $mockClassName = '', bool $callOriginalConstructor = true, bool $callOriginalClone = true, bool $callAutoload = true, bool $cloneArguments = true, bool $callOriginalMethods = false, object $proxyTarget = null, bool $allowMockingUnknownTypes = true, bool $returnValueGeneration = true): MockObject
    {
        if (!\is_array($type) && !\is_string($type)) {
            throw InvalidArgumentException::create(1, 'array or string');
        }

        if (!\is_array($methods) && null !== $methods) {
            throw InvalidArgumentException::create(2, 'array');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        if ($type === 'Traversable' || $type === '\\Traversable') {
            $type = 'Iterator';
        }

        if (\is_array($type)) {
            $type = \array_unique(
                \array_map(
<<<<<<< HEAD
                    function ($type) {
=======
                    static function ($type) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                        if ($type === 'Traversable' ||
                            $type === '\\Traversable' ||
                            $type === '\\Iterator') {
                            return 'Iterator';
                        }

                        return $type;
                    },
                    $type
                )
            );
        }

        if (!$allowMockingUnknownTypes) {
            if (\is_array($type)) {
                foreach ($type as $_type) {
                    if (!\class_exists($_type, $callAutoload) &&
                        !\interface_exists($_type, $callAutoload)) {
                        throw new RuntimeException(
                            \sprintf(
                                'Cannot stub or mock class or interface "%s" which does not exist',
                                $_type
                            )
                        );
                    }
                }
<<<<<<< HEAD
            } else {
                if (!\class_exists($type, $callAutoload) &&
                    !\interface_exists($type, $callAutoload)
                ) {
                    throw new RuntimeException(
                        \sprintf(
                            'Cannot stub or mock class or interface "%s" which does not exist',
                            $type
                        )
                    );
                }
=======
            } elseif (!\class_exists($type, $callAutoload) && !\interface_exists($type, $callAutoload)) {
                throw new RuntimeException(
                    \sprintf(
                        'Cannot stub or mock class or interface "%s" which does not exist',
                        $type
                    )
                );
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            }
        }

        if (null !== $methods) {
            foreach ($methods as $method) {
<<<<<<< HEAD
                if (!\preg_match('~[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*~', $method)) {
=======
                if (!\preg_match('~[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*~', (string) $method)) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                    throw new RuntimeException(
                        \sprintf(
                            'Cannot stub or mock method with invalid name "%s"',
                            $method
                        )
                    );
                }
            }

            if ($methods !== \array_unique($methods)) {
                throw new RuntimeException(
                    \sprintf(
                        'Cannot stub or mock using a method list that contains duplicates: "%s" (duplicate: "%s")',
                        \implode(', ', $methods),
                        \implode(', ', \array_unique(\array_diff_assoc($methods, \array_unique($methods))))
                    )
                );
            }
        }

        if ($mockClassName !== '' && \class_exists($mockClassName, false)) {
<<<<<<< HEAD
            $reflect = new ReflectionClass($mockClassName);

            if (!$reflect->implementsInterface(MockObject::class)) {
=======
            try {
                $reflector = new \ReflectionClass($mockClassName);
            } catch (\ReflectionException $e) {
                throw new RuntimeException(
                    $e->getMessage(),
                    (int) $e->getCode(),
                    $e
                );
            }

            if (!$reflector->implementsInterface(MockObject::class)) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                throw new RuntimeException(
                    \sprintf(
                        'Class "%s" already exists.',
                        $mockClassName
                    )
                );
            }
        }

<<<<<<< HEAD
        if ($callOriginalConstructor === false && $callOriginalMethods === true) {
=======
        if (!$callOriginalConstructor && $callOriginalMethods) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            throw new RuntimeException(
                'Proxying to original methods requires invoking the original constructor'
            );
        }

        $mock = $this->generate(
            $type,
            $methods,
            $mockClassName,
            $callOriginalClone,
            $callAutoload,
            $cloneArguments,
            $callOriginalMethods
        );

        return $this->getObject(
<<<<<<< HEAD
            $mock['code'],
            $mock['mockClassName'],
=======
            $mock,
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $type,
            $callOriginalConstructor,
            $callAutoload,
            $arguments,
            $callOriginalMethods,
            $proxyTarget,
            $returnValueGeneration
        );
    }

    /**
     * Returns a mock object for the specified abstract class with all abstract
     * methods of the class mocked. Concrete methods to mock can be specified with
<<<<<<< HEAD
     * the last parameter
     *
     * @param string $originalClassName
     * @param string $mockClassName
     * @param bool   $callOriginalConstructor
     * @param bool   $callOriginalClone
     * @param bool   $callAutoload
     * @param array  $mockedMethods
     * @param bool   $cloneArguments
     *
     * @throws \ReflectionException
     * @throws RuntimeException
     * @throws Exception
     *
     * @return MockObject
     */
    public function getMockForAbstractClass($originalClassName, array $arguments = [], $mockClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $mockedMethods = [], $cloneArguments = true)
    {
        if (!\is_string($originalClassName)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        if (!\is_string($mockClassName)) {
            throw InvalidArgumentHelper::factory(3, 'string');
        }

        if (\class_exists($originalClassName, $callAutoload) ||
            \interface_exists($originalClassName, $callAutoload)) {
            $reflector = new ReflectionClass($originalClassName);
            $methods   = $mockedMethods;
=======
     * the $mockedMethods parameter
     *
     * @throws RuntimeException
     */
    public function getMockForAbstractClass(string $originalClassName, array $arguments = [], string $mockClassName = '', bool $callOriginalConstructor = true, bool $callOriginalClone = true, bool $callAutoload = true, array $mockedMethods = [], bool $cloneArguments = true): MockObject
    {
        if (\class_exists($originalClassName, $callAutoload) ||
            \interface_exists($originalClassName, $callAutoload)) {
            try {
                $reflector = new \ReflectionClass($originalClassName);
            } catch (\ReflectionException $e) {
                throw new RuntimeException(
                    $e->getMessage(),
                    (int) $e->getCode(),
                    $e
                );
            }

            $methods = $mockedMethods;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

            foreach ($reflector->getMethods() as $method) {
                if ($method->isAbstract() && !\in_array($method->getName(), $methods, true)) {
                    $methods[] = $method->getName();
                }
            }

            if (empty($methods)) {
                $methods = null;
            }

            return $this->getMock(
                $originalClassName,
                $methods,
                $arguments,
                $mockClassName,
                $callOriginalConstructor,
                $callOriginalClone,
                $callAutoload,
                $cloneArguments
            );
        }

        throw new RuntimeException(
            \sprintf('Class "%s" does not exist.', $originalClassName)
        );
    }

    /**
     * Returns a mock object for the specified trait with all abstract methods
     * of the trait mocked. Concrete methods to mock can be specified with the
     * `$mockedMethods` parameter.
     *
<<<<<<< HEAD
     * @param string $traitName
     * @param string $mockClassName
     * @param bool   $callOriginalConstructor
     * @param bool   $callOriginalClone
     * @param bool   $callAutoload
     * @param array  $mockedMethods
     * @param bool   $cloneArguments
     *
     * @throws \ReflectionException
     * @throws RuntimeException
     * @throws Exception
     *
     * @return MockObject
     */
    public function getMockForTrait($traitName, array $arguments = [], $mockClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $mockedMethods = [], $cloneArguments = true)
    {
        if (!\is_string($traitName)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        if (!\is_string($mockClassName)) {
            throw InvalidArgumentHelper::factory(3, 'string');
        }

=======
     * @throws RuntimeException
     */
    public function getMockForTrait(string $traitName, array $arguments = [], string $mockClassName = '', bool $callOriginalConstructor = true, bool $callOriginalClone = true, bool $callAutoload = true, array $mockedMethods = [], bool $cloneArguments = true): MockObject
    {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        if (!\trait_exists($traitName, $callAutoload)) {
            throw new RuntimeException(
                \sprintf(
                    'Trait "%s" does not exist.',
                    $traitName
                )
            );
        }

        $className = $this->generateClassName(
            $traitName,
            '',
            'Trait_'
        );

        $classTemplate = $this->getTemplate('trait_class.tpl');

        $classTemplate->setVar(
            [
                'prologue'   => 'abstract ',
                'class_name' => $className['className'],
                'trait_name' => $traitName,
            ]
        );

<<<<<<< HEAD
        $this->evalClass(
            $classTemplate->render(),
            $className['className']
        );
=======
        $mockTrait = new MockTrait($classTemplate->render(), $className['className']);
        $mockTrait->generate();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return $this->getMockForAbstractClass($className['className'], $arguments, $mockClassName, $callOriginalConstructor, $callOriginalClone, $callAutoload, $mockedMethods, $cloneArguments);
    }

    /**
     * Returns an object for the specified trait.
     *
<<<<<<< HEAD
     * @param string $traitName
     * @param string $traitClassName
     * @param bool   $callOriginalConstructor
     * @param bool   $callOriginalClone
     * @param bool   $callAutoload
     *
     * @throws \ReflectionException
     * @throws RuntimeException
     * @throws Exception
     *
     * @return object
     */
    public function getObjectForTrait($traitName, array $arguments = [], $traitClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true)
    {
        if (!\is_string($traitName)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        if (!\is_string($traitClassName)) {
            throw InvalidArgumentHelper::factory(3, 'string');
        }

=======
     * @throws RuntimeException
     */
    public function getObjectForTrait(string $traitName, string $traitClassName = '', bool $callAutoload = true, bool $callOriginalConstructor = false, array $arguments = []): object
    {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        if (!\trait_exists($traitName, $callAutoload)) {
            throw new RuntimeException(
                \sprintf(
                    'Trait "%s" does not exist.',
                    $traitName
                )
            );
        }

        $className = $this->generateClassName(
            $traitName,
            $traitClassName,
            'Trait_'
        );

        $classTemplate = $this->getTemplate('trait_class.tpl');

        $classTemplate->setVar(
            [
                'prologue'   => '',
                'class_name' => $className['className'],
                'trait_name' => $traitName,
            ]
        );

        return $this->getObject(
<<<<<<< HEAD
            $classTemplate->render(),
            $className['className'],
=======
            new MockTrait(
                $classTemplate->render(),
                $className['className']
            ),
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            '',
            $callOriginalConstructor,
            $callAutoload,
            $arguments
        );
    }

<<<<<<< HEAD
    /**
     * @param array|string $type
     * @param array        $methods
     * @param string       $mockClassName
     * @param bool         $callOriginalClone
     * @param bool         $callAutoload
     * @param bool         $cloneArguments
     * @param bool         $callOriginalMethods
     *
     * @throws \ReflectionException
     * @throws \PHPUnit\Framework\MockObject\RuntimeException
     *
     * @return array
     */
    public function generate($type, array $methods = null, $mockClassName = '', $callOriginalClone = true, $callAutoload = true, $cloneArguments = true, $callOriginalMethods = false)
=======
    public function generate($type, array $methods = null, string $mockClassName = '', bool $callOriginalClone = true, bool $callAutoload = true, bool $cloneArguments = true, bool $callOriginalMethods = false): MockClass
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (\is_array($type)) {
            \sort($type);
        }

        if ($mockClassName !== '') {
            return $this->generateMock(
                $type,
                $methods,
                $mockClassName,
                $callOriginalClone,
                $callAutoload,
                $cloneArguments,
                $callOriginalMethods
            );
        }
<<<<<<< HEAD
=======

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $key = \md5(
            \is_array($type) ? \implode('_', $type) : $type .
            \serialize($methods) .
            \serialize($callOriginalClone) .
            \serialize($cloneArguments) .
            \serialize($callOriginalMethods)
        );

        if (!isset(self::$cache[$key])) {
            self::$cache[$key] = $this->generateMock(
                $type,
                $methods,
                $mockClassName,
                $callOriginalClone,
                $callAutoload,
                $cloneArguments,
                $callOriginalMethods
            );
        }

        return self::$cache[$key];
    }

    /**
<<<<<<< HEAD
     * @param string $wsdlFile
     * @param string $className
     *
     * @throws RuntimeException
     *
     * @return string
     */
    public function generateClassFromWsdl($wsdlFile, $className, array $methods = [], array $options = [])
=======
     * @throws RuntimeException
     */
    public function generateClassFromWsdl(string $wsdlFile, string $className, array $methods = [], array $options = []): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!\extension_loaded('soap')) {
            throw new RuntimeException(
                'The SOAP extension is required to generate a mock object from WSDL.'
            );
        }

        $options  = \array_merge($options, ['cache_wsdl' => \WSDL_CACHE_NONE]);
<<<<<<< HEAD
        $client   = new SoapClient($wsdlFile, $options);
        $_methods = \array_unique($client->__getFunctions());
        unset($client);
=======

        try {
            $client   = new \SoapClient($wsdlFile, $options);
            $_methods = \array_unique($client->__getFunctions());
            unset($client);
        } catch (\SoapFault $e) {
            throw new RuntimeException(
                $e->getMessage(),
                (int) $e->getCode(),
                $e
            );
        }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        \sort($_methods);

        $methodTemplate = $this->getTemplate('wsdl_method.tpl');
        $methodsBuffer  = '';

        foreach ($_methods as $method) {
            \preg_match_all('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*\(/', $method, $matches, \PREG_OFFSET_CAPTURE);
            $lastFunction = \array_pop($matches[0]);
            $nameStart    = $lastFunction[1];
            $nameEnd      = $nameStart + \strlen($lastFunction[0]) - 1;
            $name         = \str_replace('(', '', $lastFunction[0]);

            if (empty($methods) || \in_array($name, $methods, true)) {
                $args = \explode(
                    ',',
                    \str_replace(')', '', \substr($method, $nameEnd + 1))
                );

                foreach (\range(0, \count($args) - 1) as $i) {
                    $args[$i] = \substr($args[$i], \strpos($args[$i], '$'));
                }

                $methodTemplate->setVar(
                    [
                        'method_name' => $name,
                        'arguments'   => \implode(', ', $args),
                    ]
                );

                $methodsBuffer .= $methodTemplate->render();
            }
        }

        $optionsBuffer = '[';

        foreach ($options as $key => $value) {
            $optionsBuffer .= $key . ' => ' . $value;
        }

        $optionsBuffer .= ']';

        $classTemplate = $this->getTemplate('wsdl_class.tpl');
        $namespace     = '';

        if (\strpos($className, '\\') !== false) {
            $parts     = \explode('\\', $className);
            $className = \array_pop($parts);
            $namespace = 'namespace ' . \implode('\\', $parts) . ';' . "\n\n";
        }

        $classTemplate->setVar(
            [
                'namespace'  => $namespace,
                'class_name' => $className,
                'wsdl'       => $wsdlFile,
                'options'    => $optionsBuffer,
                'methods'    => $methodsBuffer,
            ]
        );

        return $classTemplate->render();
    }

    /**
<<<<<<< HEAD
     * @param string $className
     *
     * @throws \ReflectionException
     *
     * @return string[]
     */
    public function getClassMethods($className): array
    {
        $class   = new ReflectionClass($className);
=======
     * @throws RuntimeException
     *
     * @return string[]
     */
    public function getClassMethods(string $className): array
    {
        try {
            $class = new \ReflectionClass($className);
        } catch (\ReflectionException $e) {
            throw new RuntimeException(
                $e->getMessage(),
                (int) $e->getCode(),
                $e
            );
        }

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $methods = [];

        foreach ($class->getMethods() as $method) {
            if ($method->isPublic() || $method->isAbstract()) {
                $methods[] = $method->getName();
            }
        }

        return $methods;
    }

    /**
<<<<<<< HEAD
     * @throws \ReflectionException
=======
     * @throws RuntimeException
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     *
     * @return MockMethod[]
     */
    public function mockClassMethods(string $className, bool $callOriginalMethods, bool $cloneArguments): array
    {
<<<<<<< HEAD
        $class   = new ReflectionClass($className);
=======
        try {
            $class = new \ReflectionClass($className);
        } catch (\ReflectionException $e) {
            throw new RuntimeException(
                $e->getMessage(),
                (int) $e->getCode(),
                $e
            );
        }

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $methods = [];

        foreach ($class->getMethods() as $method) {
            if (($method->isPublic() || $method->isAbstract()) && $this->canMockMethod($method)) {
                $methods[] = MockMethod::fromReflection($method, $callOriginalMethods, $cloneArguments);
            }
        }

        return $methods;
    }

    /**
<<<<<<< HEAD
     * @throws \ReflectionException
     *
     * @return \ReflectionMethod[]
     */
    private function userDefinedInterfaceMethods(string $interfaceName): array
    {
        $interface = new ReflectionClass($interfaceName);
        $methods   = [];

        foreach ($interface->getMethods() as $method) {
            if (!$method->isUserDefined()) {
                continue;
            }

            $methods[] = $method;
=======
     * @return \ReflectionMethod[]
     */
    private function getInterfaceOwnMethods(string $interfaceName): array
    {
        try {
            $reflect = new \ReflectionClass($interfaceName);
        } catch (\ReflectionException $e) {
            throw new RuntimeException(
                $e->getMessage(),
                (int) $e->getCode(),
                $e
            );
        }

        $methods = [];

        foreach ($reflect->getMethods() as $method) {
            if ($method->getDeclaringClass()->getName() === $interfaceName) {
                $methods[] = $method;
            }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return $methods;
    }

<<<<<<< HEAD
    /**
     * @param string       $code
     * @param string       $className
     * @param array|string $type
     * @param bool         $callOriginalConstructor
     * @param bool         $callAutoload
     * @param bool         $callOriginalMethods
     * @param object       $proxyTarget
     * @param bool         $returnValueGeneration
     *
     * @throws \ReflectionException
     * @throws RuntimeException
     *
     * @return MockObject
     */
    private function getObject($code, $className, $type = '', $callOriginalConstructor = false, $callAutoload = false, array $arguments = [], $callOriginalMethods = false, $proxyTarget = null, $returnValueGeneration = true)
    {
        $this->evalClass($code, $className);
=======
    private function getObject(MockType $mockClass, $type = '', bool $callOriginalConstructor = false, bool $callAutoload = false, array $arguments = [], bool $callOriginalMethods = false, object $proxyTarget = null, bool $returnValueGeneration = true)
    {
        $className = $mockClass->generate();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        if ($callOriginalConstructor) {
            if (\count($arguments) === 0) {
                $object = new $className;
            } else {
<<<<<<< HEAD
                $class  = new ReflectionClass($className);
=======
                try {
                    $class = new \ReflectionClass($className);
                } catch (\ReflectionException $e) {
                    throw new RuntimeException(
                        $e->getMessage(),
                        (int) $e->getCode(),
                        $e
                    );
                }

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                $object = $class->newInstanceArgs($arguments);
            }
        } else {
            try {
<<<<<<< HEAD
                $instantiator = new Instantiator;
                $object       = $instantiator->instantiate($className);
=======
                $object = (new Instantiator)->instantiate($className);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            } catch (InstantiatorException $exception) {
                throw new RuntimeException($exception->getMessage());
            }
        }

        if ($callOriginalMethods) {
            if (!\is_object($proxyTarget)) {
                if (\count($arguments) === 0) {
                    $proxyTarget = new $type;
                } else {
<<<<<<< HEAD
                    $class       = new ReflectionClass($type);
=======
                    try {
                        $class = new \ReflectionClass($type);
                    } catch (\ReflectionException $e) {
                        throw new RuntimeException(
                            $e->getMessage(),
                            (int) $e->getCode(),
                            $e
                        );
                    }

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                    $proxyTarget = $class->newInstanceArgs($arguments);
                }
            }

            $object->__phpunit_setOriginalObject($proxyTarget);
        }

        if ($object instanceof MockObject) {
            $object->__phpunit_setReturnValueGeneration($returnValueGeneration);
        }

        return $object;
    }

    /**
<<<<<<< HEAD
     * @param string $code
     * @param string $className
     */
    private function evalClass($code, $className): void
    {
        if (!\class_exists($className, false)) {
            eval($code);
        }
    }

    /**
     * @param array|string $type
     * @param null|array   $explicitMethods
     * @param string       $mockClassName
     * @param bool         $callOriginalClone
     * @param bool         $callAutoload
     * @param bool         $cloneArguments
     * @param bool         $callOriginalMethods
     *
     * @throws \InvalidArgumentException
     * @throws \ReflectionException
     * @throws RuntimeException
     *
     * @return array
     */
    private function generateMock($type, $explicitMethods, $mockClassName, $callOriginalClone, $callAutoload, $cloneArguments, $callOriginalMethods)
    {
        $classTemplate       = $this->getTemplate('mocked_class.tpl');

        $additionalInterfaces = [];
        $cloneTemplate        = '';
=======
     * @param array|string $type
     *
     * @throws RuntimeException
     */
    private function generateMock($type, ?array $explicitMethods, string $mockClassName, bool $callOriginalClone, bool $callAutoload, bool $cloneArguments, bool $callOriginalMethods): MockClass
    {
        $classTemplate        = $this->getTemplate('mocked_class.tpl');
        $additionalInterfaces = [];
        $mockedCloneMethod    = false;
        $unmockedCloneMethod  = false;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $isClass              = false;
        $isInterface          = false;
        $class                = null;
        $mockMethods          = new MockMethodSet;

        if (\is_array($type)) {
            $interfaceMethods = [];

            foreach ($type as $_type) {
                if (!\interface_exists($_type, $callAutoload)) {
                    throw new RuntimeException(
                        \sprintf(
                            'Interface "%s" does not exist.',
                            $_type
                        )
                    );
                }

                $additionalInterfaces[] = $_type;
<<<<<<< HEAD
                $typeClass              = new ReflectionClass($_type);

                foreach ($this->getClassMethods($_type) as $method) {
                    if (\in_array($method, $interfaceMethods, true)) {
                        throw new RuntimeException(
                            \sprintf(
                                'Duplicate method "%s" not allowed.',
                                $method
=======

                try {
                    $typeClass = new \ReflectionClass($_type);
                } catch (\ReflectionException $e) {
                    throw new RuntimeException(
                        $e->getMessage(),
                        (int) $e->getCode(),
                        $e
                    );
                }

                foreach ($this->getClassMethods($_type) as $methodTrait) {
                    if (\in_array($methodTrait, $interfaceMethods, true)) {
                        throw new RuntimeException(
                            \sprintf(
                                'Duplicate method "%s" not allowed.',
                                $methodTrait
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                            )
                        );
                    }

<<<<<<< HEAD
                    $methodReflection = $typeClass->getMethod($method);
=======
                    try {
                        $methodReflection = $typeClass->getMethod($methodTrait);
                    } catch (\ReflectionException $e) {
                        throw new RuntimeException(
                            $e->getMessage(),
                            (int) $e->getCode(),
                            $e
                        );
                    }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

                    if ($this->canMockMethod($methodReflection)) {
                        $mockMethods->addMethods(
                            MockMethod::fromReflection($methodReflection, $callOriginalMethods, $cloneArguments)
                        );

<<<<<<< HEAD
                        $interfaceMethods[] = $method;
=======
                        $interfaceMethods[] = $methodTrait;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                    }
                }
            }

            unset($interfaceMethods);
        }

        $mockClassName = $this->generateClassName(
            $type,
            $mockClassName,
            'Mock_'
        );

        if (\class_exists($mockClassName['fullClassName'], $callAutoload)) {
            $isClass = true;
        } elseif (\interface_exists($mockClassName['fullClassName'], $callAutoload)) {
            $isInterface = true;
        }

        if (!$isClass && !$isInterface) {
            $prologue = 'class ' . $mockClassName['originalClassName'] . "\n{\n}\n\n";

            if (!empty($mockClassName['namespaceName'])) {
                $prologue = 'namespace ' . $mockClassName['namespaceName'] .
                            " {\n\n" . $prologue . "}\n\n" .
                            "namespace {\n\n";

                $epilogue = "\n\n}";
            }

<<<<<<< HEAD
            $cloneTemplate = $this->getTemplate('mocked_clone.tpl');
        } else {
            $class = new ReflectionClass($mockClassName['fullClassName']);
=======
            $mockedCloneMethod = true;
        } else {
            try {
                $class = new \ReflectionClass($mockClassName['fullClassName']);
            } catch (\ReflectionException $e) {
                throw new RuntimeException(
                    $e->getMessage(),
                    (int) $e->getCode(),
                    $e
                );
            }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

            if ($class->isFinal()) {
                throw new RuntimeException(
                    \sprintf(
                        'Class "%s" is declared "final" and cannot be mocked.',
                        $mockClassName['fullClassName']
                    )
                );
            }

            // @see https://github.com/sebastianbergmann/phpunit/issues/2995
            if ($isInterface && $class->implementsInterface(\Throwable::class)) {
                $actualClassName        = \Exception::class;
                $additionalInterfaces[] = $class->getName();
                $isInterface            = false;

                try {
                    $class = new \ReflectionClass($actualClassName);
                } catch (\ReflectionException $e) {
                    throw new RuntimeException(
                        $e->getMessage(),
                        (int) $e->getCode(),
                        $e
                    );
                }

<<<<<<< HEAD
                foreach ($this->userDefinedInterfaceMethods($mockClassName['fullClassName']) as $method) {
                    $methodName = $method->getName();
=======
                foreach ($this->getInterfaceOwnMethods($mockClassName['fullClassName']) as $methodTrait) {
                    $methodName = $methodTrait->getName();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

                    if ($class->hasMethod($methodName)) {
                        try {
                            $classMethod = $class->getMethod($methodName);
                        } catch (\ReflectionException $e) {
                            throw new RuntimeException(
                                $e->getMessage(),
                                (int) $e->getCode(),
                                $e
                            );
                        }

                        if (!$this->canMockMethod($classMethod)) {
                            continue;
                        }
                    }

                    $mockMethods->addMethods(
<<<<<<< HEAD
                        MockMethod::fromReflection($method, $callOriginalMethods, $cloneArguments)
=======
                        MockMethod::fromReflection($methodTrait, $callOriginalMethods, $cloneArguments)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                    );
                }

                $mockClassName = $this->generateClassName(
                    $actualClassName,
<<<<<<< HEAD
                    $mockClassName['className'],
=======
                    '',
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                    'Mock_'
                );
            }

<<<<<<< HEAD
            // https://github.com/sebastianbergmann/phpunit-mock-objects/issues/103
            if ($isInterface && $class->implementsInterface(Traversable::class) &&
                !$class->implementsInterface(Iterator::class) &&
                !$class->implementsInterface(IteratorAggregate::class)) {
                $additionalInterfaces[] = Iterator::class;

                $mockMethods->addMethods(
                    ...$this->mockClassMethods(Iterator::class, $callOriginalMethods, $cloneArguments)
=======
            // @see https://github.com/sebastianbergmann/phpunit-mock-objects/issues/103
            if ($isInterface && $class->implementsInterface(\Traversable::class) &&
                !$class->implementsInterface(\Iterator::class) &&
                !$class->implementsInterface(\IteratorAggregate::class)) {
                $additionalInterfaces[] = \Iterator::class;

                $mockMethods->addMethods(
                    ...$this->mockClassMethods(\Iterator::class, $callOriginalMethods, $cloneArguments)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                );
            }

            if ($class->hasMethod('__clone')) {
<<<<<<< HEAD
                $cloneMethod = $class->getMethod('__clone');

                if (!$cloneMethod->isFinal()) {
                    if ($callOriginalClone && !$isInterface) {
                        $cloneTemplate = $this->getTemplate('unmocked_clone.tpl');
                    } else {
                        $cloneTemplate = $this->getTemplate('mocked_clone.tpl');
                    }
                }
            } else {
                $cloneTemplate = $this->getTemplate('mocked_clone.tpl');
            }
        }

        if (\is_object($cloneTemplate)) {
            $cloneTemplate = $cloneTemplate->render();
        }

=======
                try {
                    $cloneMethod = $class->getMethod('__clone');
                } catch (\ReflectionException $e) {
                    throw new RuntimeException(
                        $e->getMessage(),
                        (int) $e->getCode(),
                        $e
                    );
                }

                if (!$cloneMethod->isFinal()) {
                    if ($callOriginalClone && !$isInterface) {
                        $unmockedCloneMethod = true;
                    } else {
                        $mockedCloneMethod = true;
                    }
                }
            } else {
                $mockedCloneMethod = true;
            }
        }

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        if ($explicitMethods === [] &&
            ($isClass || $isInterface)) {
            $mockMethods->addMethods(
                ...$this->mockClassMethods($mockClassName['fullClassName'], $callOriginalMethods, $cloneArguments)
            );
        }

        if (\is_array($explicitMethods)) {
            foreach ($explicitMethods as $methodName) {
                if ($class !== null && $class->hasMethod($methodName)) {
<<<<<<< HEAD
                    $method = $class->getMethod($methodName);

                    if ($this->canMockMethod($method)) {
                        $mockMethods->addMethods(
                            MockMethod::fromReflection($method, $callOriginalMethods, $cloneArguments)
=======
                    try {
                        $methodTrait = $class->getMethod($methodName);
                    } catch (\ReflectionException $e) {
                        throw new RuntimeException(
                            $e->getMessage(),
                            (int) $e->getCode(),
                            $e
                        );
                    }

                    if ($this->canMockMethod($methodTrait)) {
                        $mockMethods->addMethods(
                            MockMethod::fromReflection($methodTrait, $callOriginalMethods, $cloneArguments)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                        );
                    }
                } else {
                    $mockMethods->addMethods(
                        MockMethod::fromName(
                            $mockClassName['fullClassName'],
                            $methodName,
                            $cloneArguments
                        )
                    );
                }
            }
        }

        $mockedMethods = '';
        $configurable  = [];

<<<<<<< HEAD
        /** @var MockMethod $mockMethod */
        foreach ($mockMethods->asArray() as $mockMethod) {
            $mockedMethods .= $mockMethod->generateCode();
            $configurable[] = \strtolower($mockMethod->getName());
        }

        $method = '';

        if (!$mockMethods->hasMethod('method') && (!isset($class) || !$class->hasMethod('method'))) {
            $methodTemplate = $this->getTemplate('mocked_class_method.tpl');

            $method = $methodTemplate->render();
=======
        foreach ($mockMethods->asArray() as $mockMethod) {
            $mockedMethods .= $mockMethod->generateCode();
            $configurable[] = new ConfigurableMethod($mockMethod->getName(), $mockMethod->getReturnType());
        }

        $methodTrait = '';

        if (!$mockMethods->hasMethod('method') && (!isset($class) || !$class->hasMethod('method'))) {
            $methodTrait = \PHP_EOL . '    use \PHPUnit\Framework\MockObject\Method;';
        }

        $cloneTrait = '';

        if ($mockedCloneMethod) {
            $cloneTrait = \PHP_EOL . '    use \PHPUnit\Framework\MockObject\MockedCloneMethod;';
        }

        if ($unmockedCloneMethod) {
            $cloneTrait = \PHP_EOL . '    use \PHPUnit\Framework\MockObject\UnmockedCloneMethod;';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        $classTemplate->setVar(
            [
                'prologue'          => $prologue ?? '',
                'epilogue'          => $epilogue ?? '',
                'class_declaration' => $this->generateMockClassDeclaration(
                    $mockClassName,
                    $isInterface,
                    $additionalInterfaces
                ),
<<<<<<< HEAD
                'clone'             => $cloneTemplate,
                'mock_class_name'   => $mockClassName['className'],
                'mocked_methods'    => $mockedMethods,
                'method'            => $method,
                'configurable'      => '[' . \implode(
                    ', ',
                    \array_map(
                        function ($m) {
                            return '\'' . $m . '\'';
                        },
                        $configurable
                    )
                ) . ']',
            ]
        );

        return [
            'code'          => $classTemplate->render(),
            'mockClassName' => $mockClassName['className'],
        ];
=======
                'clone'             => $cloneTrait,
                'mock_class_name'   => $mockClassName['className'],
                'mocked_methods'    => $mockedMethods,
                'method'            => $methodTrait,
            ]
        );

        return new MockClass(
            $classTemplate->render(),
            $mockClassName['className'],
            $configurable
        );
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * @param array|string $type
<<<<<<< HEAD
     * @param string       $className
     * @param string       $prefix
     *
     * @return array
     */
    private function generateClassName($type, $className, $prefix)
=======
     */
    private function generateClassName($type, string $className, string $prefix): array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (\is_array($type)) {
            $type = \implode('_', $type);
        }

        if ($type[0] === '\\') {
            $type = \substr($type, 1);
        }

        $classNameParts = \explode('\\', $type);

        if (\count($classNameParts) > 1) {
            $type          = \array_pop($classNameParts);
            $namespaceName = \implode('\\', $classNameParts);
            $fullClassName = $namespaceName . '\\' . $type;
        } else {
            $namespaceName = '';
            $fullClassName = $type;
        }

        if ($className === '') {
            do {
                $className = $prefix . $type . '_' .
<<<<<<< HEAD
                             \substr(\md5(\mt_rand()), 0, 8);
=======
                             \substr(\md5((string) \mt_rand()), 0, 8);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            } while (\class_exists($className, false));
        }

        return [
            'className'         => $className,
            'originalClassName' => $type,
            'fullClassName'     => $fullClassName,
            'namespaceName'     => $namespaceName,
        ];
    }

<<<<<<< HEAD
    /**
     * @param bool $isInterface
     *
     * @return string
     */
    private function generateMockClassDeclaration(array $mockClassName, $isInterface, array $additionalInterfaces = [])
=======
    private function generateMockClassDeclaration(array $mockClassName, bool $isInterface, array $additionalInterfaces = []): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $buffer = 'class ';

        $additionalInterfaces[] = MockObject::class;
        $interfaces             = \implode(', ', $additionalInterfaces);

        if ($isInterface) {
            $buffer .= \sprintf(
                '%s implements %s',
                $mockClassName['className'],
                $interfaces
            );

<<<<<<< HEAD
            if (!\in_array($mockClassName['originalClassName'], $additionalInterfaces)) {
=======
            if (!\in_array($mockClassName['originalClassName'], $additionalInterfaces, true)) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                $buffer .= ', ';

                if (!empty($mockClassName['namespaceName'])) {
                    $buffer .= $mockClassName['namespaceName'] . '\\';
                }

                $buffer .= $mockClassName['originalClassName'];
            }
        } else {
            $buffer .= \sprintf(
                '%s extends %s%s implements %s',
                $mockClassName['className'],
                !empty($mockClassName['namespaceName']) ? $mockClassName['namespaceName'] . '\\' : '',
                $mockClassName['originalClassName'],
                $interfaces
            );
        }

        return $buffer;
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
    private function canMockMethod(ReflectionMethod $method)
=======
    private function canMockMethod(\ReflectionMethod $method): bool
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return !($method->isConstructor() || $method->isFinal() || $method->isPrivate() || $this->isMethodNameBlacklisted($method->getName()));
    }

<<<<<<< HEAD
    /**
     * Returns whether a method name is blacklisted
     *
     * @param string $name
     *
     * @return bool
     */
    private function isMethodNameBlacklisted($name)
=======
    private function isMethodNameBlacklisted(string $name): bool
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return isset(self::BLACKLISTED_METHOD_NAMES[$name]);
    }

<<<<<<< HEAD
    /**
     * @param string $template
     *
     * @throws \InvalidArgumentException
     *
     * @return Text_Template
     */
    private function getTemplate($template)
=======
    private function getTemplate(string $template): \Text_Template
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $filename = __DIR__ . \DIRECTORY_SEPARATOR . 'Generator' . \DIRECTORY_SEPARATOR . $template;

        if (!isset(self::$templates[$filename])) {
<<<<<<< HEAD
            self::$templates[$filename] = new Text_Template($filename);
=======
            self::$templates[$filename] = new \Text_Template($filename);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return self::$templates[$filename];
    }
}
