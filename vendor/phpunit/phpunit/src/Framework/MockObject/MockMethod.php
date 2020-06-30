<?php declare(strict_types=1);
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
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;
use Text_Template;

final class MockMethod
{
    /**
     * @var Text_Template[]
=======
use SebastianBergmann\Type\ObjectType;
use SebastianBergmann\Type\Type;
use SebastianBergmann\Type\UnknownType;
use SebastianBergmann\Type\VoidType;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class MockMethod
{
    /**
     * @var \Text_Template[]
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    private static $templates = [];

    /**
     * @var string
     */
    private $className;

    /**
     * @var string
     */
    private $methodName;

    /**
     * @var bool
     */
    private $cloneArguments;

    /**
     * @var string string
     */
    private $modifier;

    /**
     * @var string
     */
    private $argumentsForDeclaration;

    /**
     * @var string
     */
    private $argumentsForCall;

    /**
<<<<<<< HEAD
     * @var string
=======
     * @var Type
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    private $returnType;

    /**
     * @var string
     */
    private $reference;

    /**
     * @var bool
     */
    private $callOriginalMethod;

    /**
     * @var bool
     */
    private $static;

    /**
     * @var ?string
     */
    private $deprecation;

    /**
     * @var bool
     */
    private $allowsReturnNull;

<<<<<<< HEAD
    public static function fromReflection(ReflectionMethod $method, bool $callOriginalMethod, bool $cloneArguments): self
=======
    /**
     * @throws RuntimeException
     */
    public static function fromReflection(\ReflectionMethod $method, bool $callOriginalMethod, bool $cloneArguments): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if ($method->isPrivate()) {
            $modifier = 'private';
        } elseif ($method->isProtected()) {
            $modifier = 'protected';
        } else {
            $modifier = 'public';
        }

        if ($method->isStatic()) {
            $modifier .= ' static';
        }

        if ($method->returnsReference()) {
            $reference = '&';
        } else {
            $reference = '';
        }

<<<<<<< HEAD
        if ($method->hasReturnType()) {
            $returnType = $method->getReturnType()->getName();
        } else {
            $returnType = '';
        }

        $docComment = $method->getDocComment();

        if (\is_string($docComment)
            && \preg_match('#\*[ \t]*+@deprecated[ \t]*+(.*?)\r?+\n[ \t]*+\*(?:[ \t]*+@|/$)#s', $docComment, $deprecation)
        ) {
=======
        $docComment = $method->getDocComment();

        if (\is_string($docComment) &&
            \preg_match('#\*[ \t]*+@deprecated[ \t]*+(.*?)\r?+\n[ \t]*+\*(?:[ \t]*+@|/$)#s', $docComment, $deprecation)) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $deprecation = \trim(\preg_replace('#[ \t]*\r?\n[ \t]*+\*[ \t]*+#', ' ', $deprecation[1]));
        } else {
            $deprecation = null;
        }

        return new self(
            $method->getDeclaringClass()->getName(),
            $method->getName(),
            $cloneArguments,
            $modifier,
            self::getMethodParameters($method),
            self::getMethodParameters($method, true),
<<<<<<< HEAD
            $returnType,
=======
            self::deriveReturnType($method),
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $reference,
            $callOriginalMethod,
            $method->isStatic(),
            $deprecation,
            $method->hasReturnType() && $method->getReturnType()->allowsNull()
        );
    }

    public static function fromName(string $fullClassName, string $methodName, bool $cloneArguments): self
    {
        return new self(
            $fullClassName,
            $methodName,
            $cloneArguments,
            'public',
            '',
            '',
<<<<<<< HEAD
            '',
=======
            new UnknownType,
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            '',
            false,
            false,
            null,
            false
        );
    }

<<<<<<< HEAD
    public function __construct(string $className, string $methodName, bool $cloneArguments, string $modifier, string $argumentsForDeclaration, string $argumentsForCall, string $returnType, string $reference, bool $callOriginalMethod, bool $static, ?string $deprecation, bool $allowsReturnNull)
=======
    public function __construct(string $className, string $methodName, bool $cloneArguments, string $modifier, string $argumentsForDeclaration, string $argumentsForCall, Type $returnType, string $reference, bool $callOriginalMethod, bool $static, ?string $deprecation, bool $allowsReturnNull)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->className               = $className;
        $this->methodName              = $methodName;
        $this->cloneArguments          = $cloneArguments;
        $this->modifier                = $modifier;
        $this->argumentsForDeclaration = $argumentsForDeclaration;
        $this->argumentsForCall        = $argumentsForCall;
        $this->returnType              = $returnType;
        $this->reference               = $reference;
        $this->callOriginalMethod      = $callOriginalMethod;
        $this->static                  = $static;
        $this->deprecation             = $deprecation;
        $this->allowsReturnNull        = $allowsReturnNull;
    }

    public function getName(): string
    {
        return $this->methodName;
    }

    /**
<<<<<<< HEAD
     * @throws \ReflectionException
     * @throws \PHPUnit\Framework\MockObject\RuntimeException
     * @throws \InvalidArgumentException
=======
     * @throws RuntimeException
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function generateCode(): string
    {
        if ($this->static) {
            $templateFile = 'mocked_static_method.tpl';
<<<<<<< HEAD
        } elseif ($this->returnType === 'void') {
=======
        } elseif ($this->returnType instanceof VoidType) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $templateFile = \sprintf(
                '%s_method_void.tpl',
                $this->callOriginalMethod ? 'proxied' : 'mocked'
            );
        } else {
            $templateFile = \sprintf(
                '%s_method.tpl',
                $this->callOriginalMethod ? 'proxied' : 'mocked'
            );
        }

<<<<<<< HEAD
        $returnType = $this->returnType;
        // @see https://bugs.php.net/bug.php?id=70722
        if ($returnType === 'self') {
            $returnType = $this->className;
        }

        // @see https://github.com/sebastianbergmann/phpunit-mock-objects/issues/406
        if ($returnType === 'parent') {
            $reflector = new ReflectionClass($this->className);

            $parentClass = $reflector->getParentClass();

            if ($parentClass === false) {
                throw new RuntimeException(
                    \sprintf(
                        'Cannot mock %s::%s because "parent" return type declaration is used but %s does not have a parent class',
                        $this->className,
                        $this->methodName,
                        $this->className
                    )
                );
            }

            $returnType = $parentClass->getName();
        }

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $deprecation = $this->deprecation;

        if (null !== $this->deprecation) {
            $deprecation         = "The $this->className::$this->methodName method is deprecated ($this->deprecation).";
            $deprecationTemplate = $this->getTemplate('deprecation.tpl');

            $deprecationTemplate->setVar([
                'deprecation' => \var_export($deprecation, true),
            ]);

            $deprecation = $deprecationTemplate->render();
        }

        $template = $this->getTemplate($templateFile);

        $template->setVar(
            [
<<<<<<< HEAD
                'arguments_decl'  => $this->argumentsForDeclaration,
                'arguments_call'  => $this->argumentsForCall,
                'return_delim'    => $returnType ? ': ' : '',
                'return_type'     => $this->allowsReturnNull ? '?' . $returnType : $returnType,
                'arguments_count' => !empty($this->argumentsForCall) ? \substr_count($this->argumentsForCall, ',') + 1 : 0,
                'class_name'      => $this->className,
                'method_name'     => $this->methodName,
                'modifier'        => $this->modifier,
                'reference'       => $this->reference,
                'clone_arguments' => $this->cloneArguments ? 'true' : 'false',
                'deprecation'     => $deprecation,
=======
                'arguments_decl'     => $this->argumentsForDeclaration,
                'arguments_call'     => $this->argumentsForCall,
                'return_declaration' => $this->returnType->getReturnTypeDeclaration(),
                'arguments_count'    => !empty($this->argumentsForCall) ? \substr_count($this->argumentsForCall, ',') + 1 : 0,
                'class_name'         => $this->className,
                'method_name'        => $this->methodName,
                'modifier'           => $this->modifier,
                'reference'          => $this->reference,
                'clone_arguments'    => $this->cloneArguments ? 'true' : 'false',
                'deprecation'        => $deprecation,
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            ]
        );

        return $template->render();
    }

<<<<<<< HEAD
    private function getTemplate(string $template): Text_Template
=======
    public function getReturnType(): Type
    {
        return $this->returnType;
    }

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

    /**
     * Returns the parameters of a function or method.
     *
     * @throws RuntimeException
     */
<<<<<<< HEAD
    private static function getMethodParameters(ReflectionMethod $method, bool $forCall = false): string
=======
    private static function getMethodParameters(\ReflectionMethod $method, bool $forCall = false): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $parameters = [];

        foreach ($method->getParameters() as $i => $parameter) {
            $name = '$' . $parameter->getName();

            /* Note: PHP extensions may use empty names for reference arguments
             * or "..." for methods taking a variable number of arguments.
             */
            if ($name === '$' || $name === '$...') {
                $name = '$arg' . $i;
            }

            if ($parameter->isVariadic()) {
                if ($forCall) {
                    continue;
                }

                $name = '...' . $name;
            }

            $nullable        = '';
            $default         = '';
            $reference       = '';
            $typeDeclaration = '';

            if (!$forCall) {
                if ($parameter->hasType() && $parameter->allowsNull()) {
                    $nullable = '?';
                }

<<<<<<< HEAD
                if ($parameter->hasType() && $parameter->getType()->getName() !== 'self') {
                    $typeDeclaration = $parameter->getType()->getName() . ' ';
                } else {
                    try {
                        $class = $parameter->getClass();
                    } catch (ReflectionException $e) {
                        throw new RuntimeException(
                            \sprintf(
                                'Cannot mock %s::%s() because a class or ' .
                                'interface used in the signature is not loaded',
                                $method->getDeclaringClass()->getName(),
                                $method->getName()
                            ),
                            0,
                            $e
                        );
                    }

                    if ($class !== null) {
                        $typeDeclaration = $class->getName() . ' ';
=======
                if ($parameter->hasType()) {
                    $type = $parameter->getType();

                    if ($type instanceof \ReflectionNamedType && $type->getName() !== 'self') {
                        $typeDeclaration = $type->getName() . ' ';
                    } else {
                        try {
                            $class = $parameter->getClass();
                        } catch (\ReflectionException $e) {
                            throw new RuntimeException(
                                \sprintf(
                                    'Cannot mock %s::%s() because a class or ' .
                                    'interface used in the signature is not loaded',
                                    $method->getDeclaringClass()->getName(),
                                    $method->getName()
                                ),
                                0,
                                $e
                            );
                        }

                        if ($class !== null) {
                            $typeDeclaration = $class->getName() . ' ';
                        }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                    }
                }

                if (!$parameter->isVariadic()) {
                    if ($parameter->isDefaultValueAvailable()) {
                        try {
                            $value = \var_export($parameter->getDefaultValue(), true);
                        } catch (\ReflectionException $e) {
                            throw new RuntimeException(
                                $e->getMessage(),
                                (int) $e->getCode(),
                                $e
                            );
                        }
<<<<<<< HEAD

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                        $default = ' = ' . $value;
                    } elseif ($parameter->isOptional()) {
                        $default = ' = null';
                    }
                }
            }

            if ($parameter->isPassedByReference()) {
                $reference = '&';
            }

            $parameters[] = $nullable . $typeDeclaration . $reference . $name . $default;
        }

        return \implode(', ', $parameters);
    }
<<<<<<< HEAD
=======

    private static function deriveReturnType(\ReflectionMethod $method): Type
    {
        $returnType = $method->getReturnType();

        if ($returnType === null) {
            return new UnknownType();
        }

        // @see https://bugs.php.net/bug.php?id=70722
        if ($returnType->getName() === 'self') {
            return ObjectType::fromName($method->getDeclaringClass()->getName(), $returnType->allowsNull());
        }

        // @see https://github.com/sebastianbergmann/phpunit-mock-objects/issues/406
        if ($returnType->getName() === 'parent') {
            $parentClass = $method->getDeclaringClass()->getParentClass();

            if ($parentClass === false) {
                throw new RuntimeException(
                    \sprintf(
                        'Cannot mock %s::%s because "parent" return type declaration is used but %s does not have a parent class',
                        $method->getDeclaringClass()->getName(),
                        $method->getName(),
                        $method->getDeclaringClass()->getName()
                    )
                );
            }

            return ObjectType::fromName($parentClass->getName(), $returnType->allowsNull());
        }

        return Type::fromName($returnType->getName(), $returnType->allowsNull());
    }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
