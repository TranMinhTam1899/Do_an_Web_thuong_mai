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
namespace PHPUnit\Util\TestDox;

use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use SebastianBergmann\Exporter\Exporter;

/**
 * Prettifies class and method names for use in TestDox documentation.
=======
use PHPUnit\Util\Color;
use PHPUnit\Util\Exception as UtilException;
use PHPUnit\Util\Test;
use SebastianBergmann\Exporter\Exporter;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
final class NamePrettifier
{
    /**
<<<<<<< HEAD
     * @var array
=======
     * @var string[]
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    private $strings = [];

    /**
<<<<<<< HEAD
     * Prettifies the name of a test class.
=======
     * @var bool
     */
    private $useColor;

    public function __construct($useColor = false)
    {
        $this->useColor = $useColor;
    }

    /**
     * Prettifies the name of a test class.
     *
     * @psalm-param class-string $className
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function prettifyTestClass(string $className): string
    {
        try {
<<<<<<< HEAD
            $annotations = \PHPUnit\Util\Test::parseTestMethodAnnotations($className);
=======
            $annotations = Test::parseTestMethodAnnotations($className);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

            if (isset($annotations['class']['testdox'][0])) {
                return $annotations['class']['testdox'][0];
            }
<<<<<<< HEAD
        } catch (\ReflectionException $e) {
        }

        $result = $className;

        if (\substr($className, -1 * \strlen('Test')) === 'Test') {
            $result = \substr($result, 0, \strripos($result, 'Test'));
        }

        if (\strpos($className, 'Tests') === 0) {
            $result = \substr($result, \strlen('Tests'));
        } elseif (\strpos($className, 'Test') === 0) {
            $result = \substr($result, \strlen('Test'));
        }

        if ($result[0] === '\\') {
            $result = \substr($result, 1);
=======
        } catch (UtilException $e) {
        }

        $parts     = \explode('\\', $className);
        $className = \array_pop($parts);

        if (\substr($className, -1 * \strlen('Test')) === 'Test') {
            $className = \substr($className, 0, \strlen($className) - \strlen('Test'));
        }

        if (\strpos($className, 'Tests') === 0) {
            $className = \substr($className, \strlen('Tests'));
        } elseif (\strpos($className, 'Test') === 0) {
            $className = \substr($className, \strlen('Test'));
        }

        if (!empty($parts)) {
            $parts[]            = $className;
            $fullyQualifiedName = \implode('\\', $parts);
        } else {
            $fullyQualifiedName = $className;
        }

        $result       = '';
        $wasLowerCase = false;

        foreach (\range(0, \strlen($className) - 1) as $i) {
            $isLowerCase = \mb_strtolower($className[$i], 'UTF-8') === $className[$i];

            if ($wasLowerCase && !$isLowerCase) {
                $result .= ' ';
            }

            $result .= $className[$i];

            if ($isLowerCase) {
                $wasLowerCase = true;
            } else {
                $wasLowerCase = false;
            }
        }

        if ($fullyQualifiedName !== $className) {
            return $result . ' (' . $fullyQualifiedName . ')';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return $result;
    }

    /**
<<<<<<< HEAD
     * @throws \ReflectionException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function prettifyTestCase(TestCase $test): string
    {
        $annotations                = $test->getAnnotations();
        $annotationWithPlaceholders = false;

        $callback = static function (string $variable): string {
            return \sprintf('/%s(?=\b)/', \preg_quote($variable, '/'));
        };

        if (isset($annotations['method']['testdox'][0])) {
            $result = $annotations['method']['testdox'][0];

            if (\strpos($result, '$') !== false) {
                $annotation   = $annotations['method']['testdox'][0];
                $providedData = $this->mapTestMethodParameterNamesToProvidedDataValues($test);
                $variables    = \array_map($callback, \array_keys($providedData));

                $result = \trim(\preg_replace($variables, $providedData, $annotation));

                $annotationWithPlaceholders = true;
            }
        } else {
            $result = $this->prettifyTestMethod($test->getName(false));
        }

<<<<<<< HEAD
        if ($test->usesDataProvider() && !$annotationWithPlaceholders) {
            $result .= $test->getDataSetAsString(false);
=======
        if (!$annotationWithPlaceholders && $test->usesDataProvider()) {
            $result .= $this->prettifyDataSet($test);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return $result;
    }

<<<<<<< HEAD
=======
    public function prettifyDataSet(TestCase $test): string
    {
        if (!$this->useColor) {
            return $test->getDataSetAsString(false);
        }

        if (\is_int($test->dataName())) {
            $data = Color::dim(' with data set ') . Color::colorize('fg-cyan', (string) $test->dataName());
        } else {
            $data = Color::dim(' with ') . Color::colorize('fg-cyan', Color::visualizeWhitespace($test->dataName()));
        }

        return $data;
    }

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    /**
     * Prettifies the name of a test method.
     */
    public function prettifyTestMethod(string $name): string
    {
        $buffer = '';

<<<<<<< HEAD
        if (!\is_string($name) || $name === '') {
            return $buffer;
        }

        $string = \preg_replace('#\d+$#', '', $name, -1, $count);
=======
        if ($name === '') {
            return $buffer;
        }

        $string = (string) \preg_replace('#\d+$#', '', $name, -1, $count);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        if (\in_array($string, $this->strings)) {
            $name = $string;
        } elseif ($count === 0) {
            $this->strings[] = $string;
        }

        if (\strpos($name, 'test_') === 0) {
            $name = \substr($name, 5);
        } elseif (\strpos($name, 'test') === 0) {
            $name = \substr($name, 4);
        }

        if ($name === '') {
            return $buffer;
        }

        $name[0] = \strtoupper($name[0]);

        if (\strpos($name, '_') !== false) {
            return \trim(\str_replace('_', ' ', $name));
        }

<<<<<<< HEAD
        $max        = \strlen($name);
        $wasNumeric = false;

        for ($i = 0; $i < $max; $i++) {
=======
        $wasNumeric = false;

        foreach (\range(0, \strlen($name) - 1) as $i) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            if ($i > 0 && \ord($name[$i]) >= 65 && \ord($name[$i]) <= 90) {
                $buffer .= ' ' . \strtolower($name[$i]);
            } else {
                $isNumeric = \is_numeric($name[$i]);

                if (!$wasNumeric && $isNumeric) {
                    $buffer .= ' ';
                    $wasNumeric = true;
                }

                if ($wasNumeric && !$isNumeric) {
                    $wasNumeric = false;
                }

                $buffer .= $name[$i];
            }
        }

        return $buffer;
    }

    /**
<<<<<<< HEAD
     * @throws \ReflectionException
     */
    private function mapTestMethodParameterNamesToProvidedDataValues(TestCase $test): array
    {
        $reflector          = new \ReflectionMethod(\get_class($test), $test->getName(false));
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    private function mapTestMethodParameterNamesToProvidedDataValues(TestCase $test): array
    {
        try {
            $reflector = new \ReflectionMethod(\get_class($test), $test->getName(false));
        } catch (\ReflectionException $e) {
            throw new UtilException(
                $e->getMessage(),
                (int) $e->getCode(),
                $e
            );
        }

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $providedData       = [];
        $providedDataValues = \array_values($test->getProvidedData());
        $i                  = 0;

<<<<<<< HEAD
        foreach ($reflector->getParameters() as $parameter) {
            if (!\array_key_exists($i, $providedDataValues) && $parameter->isDefaultValueAvailable()) {
                $providedDataValues[$i] = $parameter->getDefaultValue();
=======
        $providedData['$_dataName'] = $test->dataName();

        foreach ($reflector->getParameters() as $parameter) {
            if (!\array_key_exists($i, $providedDataValues) && $parameter->isDefaultValueAvailable()) {
                try {
                    $providedDataValues[$i] = $parameter->getDefaultValue();
                } catch (\ReflectionException $e) {
                    throw new UtilException(
                        $e->getMessage(),
                        (int) $e->getCode(),
                        $e
                    );
                }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            }

            $value = $providedDataValues[$i++] ?? null;

            if (\is_object($value)) {
                $reflector = new \ReflectionObject($value);

                if ($reflector->hasMethod('__toString')) {
                    $value = (string) $value;
<<<<<<< HEAD
=======
                } else {
                    $value = \get_class($value);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                }
            }

            if (!\is_scalar($value)) {
                $value = \gettype($value);
            }

            if (\is_bool($value) || \is_int($value) || \is_float($value)) {
<<<<<<< HEAD
                $exporter = new Exporter;

                $value = $exporter->export($value);
=======
                $value = (new Exporter)->export($value);
            }

            if (\is_string($value) && $value === '') {
                if ($this->useColor) {
                    $value = Color::colorize('dim,underlined', 'empty');
                } else {
                    $value = "''";
                }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            }

            $providedData['$' . $parameter->getName()] = $value;
        }

<<<<<<< HEAD
=======
        if ($this->useColor) {
            $providedData = \array_map(static function ($value) {
                return Color::colorize('fg-cyan', Color::visualizeWhitespace((string) $value, true));
            }, $providedData);
        }

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        return $providedData;
    }
}
