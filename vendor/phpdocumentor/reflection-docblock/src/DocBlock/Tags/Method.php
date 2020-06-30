<?php
<<<<<<< HEAD

declare(strict_types=1);

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
<<<<<<< HEAD
 * @link http://phpdoc.org
=======
 * @copyright 2010-2015 Mike van Riel<mike@phpdoc.org>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */

namespace phpDocumentor\Reflection\DocBlock\Tags;

<<<<<<< HEAD
use InvalidArgumentException;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\DescriptionFactory;
use phpDocumentor\Reflection\Type;
use phpDocumentor\Reflection\TypeResolver;
use phpDocumentor\Reflection\Types\Context as TypeContext;
<<<<<<< HEAD
use phpDocumentor\Reflection\Types\Mixed_;
use phpDocumentor\Reflection\Types\Void_;
use Webmozart\Assert\Assert;
use function array_keys;
use function explode;
use function implode;
use function is_string;
use function preg_match;
use function sort;
use function strpos;
use function substr;
use function trim;
use function var_export;
=======
use phpDocumentor\Reflection\Types\Void_;
use Webmozart\Assert\Assert;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * Reflection class for an {@}method in a Docblock.
 */
final class Method extends BaseTag implements Factory\StaticMethod
{
<<<<<<< HEAD
    /** @var string */
    protected $name = 'method';

    /** @var string */
    private $methodName;

    /**
     * @phpstan-var array<int, array{name: string, type: Type}>
     * @var array<int, array<string, Type|string>>
     */
    private $arguments;

    /** @var bool */
    private $isStatic;
=======
    protected $name = 'method';

    /** @var string */
    private $methodName = '';

    /** @var string[] */
    private $arguments = [];

    /** @var bool */
    private $isStatic = false;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /** @var Type */
    private $returnType;

<<<<<<< HEAD
    /**
     * @param array<int, array<string, Type|string>> $arguments
     *
     * @phpstan-param array<int, array{name: string, type: Type}|string> $arguments
     */
    public function __construct(
        string $methodName,
        array $arguments = [],
        ?Type $returnType = null,
        bool $static = false,
        ?Description $description = null
    ) {
        Assert::stringNotEmpty($methodName);
=======
    public function __construct(
        $methodName,
        array $arguments = [],
        Type $returnType = null,
        $static = false,
        Description $description = null
    ) {
        Assert::stringNotEmpty($methodName);
        Assert::boolean($static);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        if ($returnType === null) {
            $returnType = new Void_();
        }

        $this->methodName  = $methodName;
        $this->arguments   = $this->filterArguments($arguments);
        $this->returnType  = $returnType;
        $this->isStatic    = $static;
        $this->description = $description;
    }

<<<<<<< HEAD
    public static function create(
        string $body,
        ?TypeResolver $typeResolver = null,
        ?DescriptionFactory $descriptionFactory = null,
        ?TypeContext $context = null
    ) : ?self {
        Assert::stringNotEmpty($body);
        Assert::notNull($typeResolver);
        Assert::notNull($descriptionFactory);
=======
    /**
     * {@inheritdoc}
     */
    public static function create(
        $body,
        TypeResolver $typeResolver = null,
        DescriptionFactory $descriptionFactory = null,
        TypeContext $context = null
    ) {
        Assert::stringNotEmpty($body);
        Assert::allNotNull([ $typeResolver, $descriptionFactory ]);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        // 1. none or more whitespace
        // 2. optionally the keyword "static" followed by whitespace
        // 3. optionally a word with underscores followed by whitespace : as
        //    type for the return value
        // 4. then optionally a word with underscores followed by () and
        //    whitespace : as method name as used by phpDocumentor
        // 5. then a word with underscores, followed by ( and any character
        //    until a ) and whitespace : as method name with signature
        // 6. any remaining text : as description
        if (!preg_match(
            '/^
                # Static keyword
                # Declares a static method ONLY if type is also present
                (?:
                    (static)
                    \s+
                )?
                # Return type
                (?:
<<<<<<< HEAD
                    (
=======
                    (   
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                        (?:[\w\|_\\\\]*\$this[\w\|_\\\\]*)
                        |
                        (?:
                            (?:[\w\|_\\\\]+)
<<<<<<< HEAD
                            # array notation
                            (?:\[\])*
                        )*+
                    )
                    \s+
                )?
                # Method name
                ([\w_]+)
=======
                            # array notation           
                            (?:\[\])*
                        )*
                    )
                    \s+
                )?
                # Legacy method name (not captured)
                (?:
                    [\w_]+\(\)\s+
                )?
                # Method name
                ([\w\|_\\\\]+)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                # Arguments
                (?:
                    \(([^\)]*)\)
                )?
                \s*
                # Description
                (.*)
            $/sux',
            $body,
            $matches
        )) {
            return null;
        }

<<<<<<< HEAD
        [, $static, $returnType, $methodName, $argumentLines, $description] = $matches;

        $static = $static === 'static';
=======
        list(, $static, $returnType, $methodName, $arguments, $description) = $matches;

        $static      = $static === 'static';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        if ($returnType === '') {
            $returnType = 'void';
        }

        $returnType  = $typeResolver->resolve($returnType, $context);
        $description = $descriptionFactory->create($description, $context);

<<<<<<< HEAD
        /** @phpstan-var array<int, array{name: string, type: Type}> $arguments */
        $arguments = [];
        if ($argumentLines !== '') {
            $argumentsExploded = explode(',', $argumentLines);
            foreach ($argumentsExploded as $argument) {
                $argument = explode(' ', self::stripRestArg(trim($argument)), 2);
                if (strpos($argument[0], '$') === 0) {
                    $argumentName = substr($argument[0], 1);
                    $argumentType = new Mixed_();
=======
        if (is_string($arguments) && strlen($arguments) > 0) {
            $arguments = explode(',', $arguments);
            foreach ($arguments as &$argument) {
                $argument = explode(' ', self::stripRestArg(trim($argument)), 2);
                if ($argument[0][0] === '$') {
                    $argumentName = substr($argument[0], 1);
                    $argumentType = new Void_();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                } else {
                    $argumentType = $typeResolver->resolve($argument[0], $context);
                    $argumentName = '';
                    if (isset($argument[1])) {
<<<<<<< HEAD
                        $argument[1]  = self::stripRestArg($argument[1]);
=======
                        $argument[1] = self::stripRestArg($argument[1]);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                        $argumentName = substr($argument[1], 1);
                    }
                }

<<<<<<< HEAD
                $arguments[] = ['name' => $argumentName, 'type' => $argumentType];
            }
=======
                $argument = [ 'name' => $argumentName, 'type' => $argumentType];
            }
        } else {
            $arguments = [];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return new static($methodName, $arguments, $returnType, $static, $description);
    }

    /**
     * Retrieves the method name.
<<<<<<< HEAD
     */
    public function getMethodName() : string
=======
     *
     * @return string
     */
    public function getMethodName()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->methodName;
    }

    /**
<<<<<<< HEAD
     * @return array<int, array<string, Type|string>>
     *
     * @phpstan-return array<int, array{name: string, type: Type}>
     */
    public function getArguments() : array
=======
     * @return string[]
     */
    public function getArguments()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->arguments;
    }

    /**
     * Checks whether the method tag describes a static method or not.
     *
     * @return bool TRUE if the method declaration is for a static method, FALSE otherwise.
     */
<<<<<<< HEAD
    public function isStatic() : bool
=======
    public function isStatic()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->isStatic;
    }

<<<<<<< HEAD
    public function getReturnType() : Type
=======
    /**
     * @return Type
     */
    public function getReturnType()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->returnType;
    }

<<<<<<< HEAD
    public function __toString() : string
=======
    public function __toString()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $arguments = [];
        foreach ($this->arguments as $argument) {
            $arguments[] = $argument['type'] . ' $' . $argument['name'];
        }

        return trim(($this->isStatic() ? 'static ' : '')
<<<<<<< HEAD
            . (string) $this->returnType . ' '
=======
            . (string)$this->returnType . ' '
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            . $this->methodName
            . '(' . implode(', ', $arguments) . ')'
            . ($this->description ? ' ' . $this->description->render() : ''));
    }

<<<<<<< HEAD
    /**
     * @param mixed[][]|string[] $arguments
     *
     * @return mixed[][]
     *
     * @phpstan-param array<int, array{name: string, type: Type}|string> $arguments
     * @phpstan-return array<int, array{name: string, type: Type}>
     */
    private function filterArguments(array $arguments = []) : array
    {
        $result = [];
        foreach ($arguments as $argument) {
            if (is_string($argument)) {
                $argument = ['name' => $argument];
            }

            if (!isset($argument['type'])) {
                $argument['type'] = new Mixed_();
=======
    private function filterArguments($arguments)
    {
        foreach ($arguments as &$argument) {
            if (is_string($argument)) {
                $argument = [ 'name' => $argument ];
            }

            if (! isset($argument['type'])) {
                $argument['type'] = new Void_();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            }

            $keys = array_keys($argument);
            sort($keys);
<<<<<<< HEAD
            if ($keys !== ['name', 'type']) {
                throw new InvalidArgumentException(
                    'Arguments can only have the "name" and "type" fields, found: ' . var_export($keys, true)
                );
            }

            $result[] = $argument;
        }

        return $result;
    }

    private static function stripRestArg(string $argument) : string
=======
            if ($keys !== [ 'name', 'type' ]) {
                throw new \InvalidArgumentException(
                    'Arguments can only have the "name" and "type" fields, found: ' . var_export($keys, true)
                );
            }
        }

        return $arguments;
    }

    private static function stripRestArg($argument)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (strpos($argument, '...') === 0) {
            $argument = trim(substr($argument, 3));
        }

        return $argument;
    }
}
