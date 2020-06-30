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

use DOMDocument;
use DOMElement;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestListener;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;
use PHPUnit\Util\Printer;
use ReflectionClass;

<<<<<<< HEAD
class XmlResultPrinter extends Printer implements TestListener
=======
/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class XmlResultPrinter extends Printer implements TestListener
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @var DOMDocument
     */
    private $document;

    /**
     * @var DOMElement
     */
    private $root;

    /**
     * @var NamePrettifier
     */
    private $prettifier;

    /**
     * @var null|\Throwable
     */
    private $exception;

    /**
     * @param resource|string $out
     *
     * @throws Exception
     */
    public function __construct($out = null)
    {
        $this->document               = new DOMDocument('1.0', 'UTF-8');
        $this->document->formatOutput = true;

        $this->root = $this->document->createElement('tests');
        $this->document->appendChild($this->root);

        $this->prettifier = new NamePrettifier;

        parent::__construct($out);
    }

    /**
     * Flush buffer and close output.
     */
    public function flush(): void
    {
        $this->write($this->document->saveXML());

        parent::flush();
    }

    /**
     * An error occurred.
     */
    public function addError(Test $test, \Throwable $t, float $time): void
    {
        $this->exception = $t;
    }

    /**
     * A warning occurred.
     */
    public function addWarning(Test $test, Warning $e, float $time): void
    {
    }

    /**
     * A failure occurred.
     */
    public function addFailure(Test $test, AssertionFailedError $e, float $time): void
    {
        $this->exception = $e;
    }

    /**
     * Incomplete test.
     */
    public function addIncompleteTest(Test $test, \Throwable $t, float $time): void
    {
    }

    /**
     * Risky test.
     */
    public function addRiskyTest(Test $test, \Throwable $t, float $time): void
    {
    }

    /**
     * Skipped test.
     */
    public function addSkippedTest(Test $test, \Throwable $t, float $time): void
    {
    }

    /**
     * A test suite started.
     */
    public function startTestSuite(TestSuite $suite): void
    {
    }

    /**
     * A test suite ended.
     */
    public function endTestSuite(TestSuite $suite): void
    {
    }

    /**
     * A test started.
     */
    public function startTest(Test $test): void
    {
        $this->exception = null;
    }

    /**
     * A test ended.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function endTest(Test $test, float $time): void
    {
        if (!$test instanceof TestCase) {
            return;
        }

<<<<<<< HEAD
        /* @var TestCase $test */

        $groups = \array_filter(
            $test->getGroups(),
            function ($group) {
=======
        $groups = \array_filter(
            $test->getGroups(),
            static function ($group) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                return !($group === 'small' || $group === 'medium' || $group === 'large');
            }
        );

<<<<<<< HEAD
        $node = $this->document->createElement('test');

        $node->setAttribute('className', \get_class($test));
        $node->setAttribute('methodName', $test->getName());
        $node->setAttribute('prettifiedClassName', $this->prettifier->prettifyTestClass(\get_class($test)));
        $node->setAttribute('prettifiedMethodName', $this->prettifier->prettifyTestCase($test));
        $node->setAttribute('status', $test->getStatus());
        $node->setAttribute('time', $time);
        $node->setAttribute('size', $test->getSize());
        $node->setAttribute('groups', \implode(',', $groups));

        $inlineAnnotations = \PHPUnit\Util\Test::getInlineAnnotations(\get_class($test), $test->getName());

        if (isset($inlineAnnotations['given'], $inlineAnnotations['when'], $inlineAnnotations['then'])) {
            $node->setAttribute('given', $inlineAnnotations['given']['value']);
            $node->setAttribute('givenStartLine', (string) $inlineAnnotations['given']['line']);
            $node->setAttribute('when', $inlineAnnotations['when']['value']);
            $node->setAttribute('whenStartLine', (string) $inlineAnnotations['when']['line']);
            $node->setAttribute('then', $inlineAnnotations['then']['value']);
            $node->setAttribute('thenStartLine', (string) $inlineAnnotations['then']['line']);
=======
        $testNode = $this->document->createElement('test');

        $testNode->setAttribute('className', \get_class($test));
        $testNode->setAttribute('methodName', $test->getName());
        $testNode->setAttribute('prettifiedClassName', $this->prettifier->prettifyTestClass(\get_class($test)));
        $testNode->setAttribute('prettifiedMethodName', $this->prettifier->prettifyTestCase($test));
        $testNode->setAttribute('status', (string) $test->getStatus());
        $testNode->setAttribute('time', (string) $time);
        $testNode->setAttribute('size', (string) $test->getSize());
        $testNode->setAttribute('groups', \implode(',', $groups));

        foreach ($groups as $group) {
            $groupNode = $this->document->createElement('group');

            $groupNode->setAttribute('name', $group);

            $testNode->appendChild($groupNode);
        }

        $annotations = $test->getAnnotations();

        foreach (['class', 'method'] as $type) {
            foreach ($annotations[$type] as $annotation => $values) {
                if ($annotation !== 'covers' && $annotation !== 'uses') {
                    continue;
                }

                foreach ($values as $value) {
                    $coversNode = $this->document->createElement($annotation);

                    $coversNode->setAttribute('target', $value);

                    $testNode->appendChild($coversNode);
                }
            }
        }

        foreach ($test->doubledTypes() as $doubledType) {
            $testDoubleNode = $this->document->createElement('testDouble');

            $testDoubleNode->setAttribute('type', $doubledType);

            $testNode->appendChild($testDoubleNode);
        }

        $inlineAnnotations = \PHPUnit\Util\Test::getInlineAnnotations(\get_class($test), $test->getName(false));

        if (isset($inlineAnnotations['given'], $inlineAnnotations['when'], $inlineAnnotations['then'])) {
            $testNode->setAttribute('given', $inlineAnnotations['given']['value']);
            $testNode->setAttribute('givenStartLine', (string) $inlineAnnotations['given']['line']);
            $testNode->setAttribute('when', $inlineAnnotations['when']['value']);
            $testNode->setAttribute('whenStartLine', (string) $inlineAnnotations['when']['line']);
            $testNode->setAttribute('then', $inlineAnnotations['then']['value']);
            $testNode->setAttribute('thenStartLine', (string) $inlineAnnotations['then']['line']);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        if ($this->exception !== null) {
            if ($this->exception instanceof Exception) {
                $steps = $this->exception->getSerializableTrace();
            } else {
                $steps = $this->exception->getTrace();
            }

<<<<<<< HEAD
            $class = new ReflectionClass($test);
            $file  = $class->getFileName();

            foreach ($steps as $step) {
                if (isset($step['file']) && $step['file'] === $file) {
                    $node->setAttribute('exceptionLine', $step['line']);
=======
            try {
                $file = (new ReflectionClass($test))->getFileName();
            } catch (\ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    (int) $e->getCode(),
                    $e
                );
            }

            foreach ($steps as $step) {
                if (isset($step['file']) && $step['file'] === $file) {
                    $testNode->setAttribute('exceptionLine', (string) $step['line']);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

                    break;
                }
            }

<<<<<<< HEAD
            $node->setAttribute('exceptionMessage', $this->exception->getMessage());
        }

        $this->root->appendChild($node);
=======
            $testNode->setAttribute('exceptionMessage', $this->exception->getMessage());
        }

        $this->root->appendChild($testNode);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
