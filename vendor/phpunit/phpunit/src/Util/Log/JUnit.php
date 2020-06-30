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
namespace PHPUnit\Util\Log;

<<<<<<< HEAD
use DOMDocument;
use DOMElement;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExceptionWrapper;
use PHPUnit\Framework\SelfDescribing;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestFailure;
use PHPUnit\Framework\TestListener;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;
<<<<<<< HEAD
use PHPUnit\Util\Filter;
use PHPUnit\Util\Printer;
use PHPUnit\Util\Xml;
use ReflectionClass;
use ReflectionException;

/**
 * A TestListener that generates a logfile of the test execution in XML markup.
 *
 * The XML markup used is the same as the one that is used by the JUnit Ant task.
 */
class JUnit extends Printer implements TestListener
{
    /**
     * @var DOMDocument
     */
    protected $document;

    /**
     * @var DOMElement
     */
    protected $root;

    /**
     * @var bool
     */
    protected $reportRiskyTests = false;
=======
use PHPUnit\Util\Exception;
use PHPUnit\Util\Filter;
use PHPUnit\Util\Printer;
use PHPUnit\Util\Xml;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class JUnit extends Printer implements TestListener
{
    /**
     * @var \DOMDocument
     */
    private $document;

    /**
     * @var \DOMElement
     */
    private $root;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * @var bool
     */
<<<<<<< HEAD
    protected $writeDocument = true;

    /**
     * @var DOMElement[]
     */
    protected $testSuites = [];
=======
    private $reportRiskyTests = false;

    /**
     * @var \DOMElement[]
     */
    private $testSuites = [];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * @var int[]
     */
<<<<<<< HEAD
    protected $testSuiteTests = [0];
=======
    private $testSuiteTests = [0];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * @var int[]
     */
<<<<<<< HEAD
    protected $testSuiteAssertions = [0];
=======
    private $testSuiteAssertions = [0];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * @var int[]
     */
<<<<<<< HEAD
    protected $testSuiteErrors = [0];
=======
    private $testSuiteErrors = [0];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * @var int[]
     */
<<<<<<< HEAD
    protected $testSuiteFailures = [0];
=======
    private $testSuiteFailures = [0];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * @var int[]
     */
<<<<<<< HEAD
    protected $testSuiteSkipped = [0];
=======
    private $testSuiteSkipped = [0];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * @var int[]
     */
<<<<<<< HEAD
    protected $testSuiteTimes = [0];
=======
    private $testSuiteTimes = [0];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * @var int
     */
<<<<<<< HEAD
    protected $testSuiteLevel = 0;

    /**
     * @var DOMElement
     */
    protected $currentTestCase;

    /**
     * Constructor.
     *
     * @param null|mixed $out
     *
     * @throws \PHPUnit\Framework\Exception
     */
    public function __construct($out = null, bool $reportRiskyTests = false)
    {
        $this->document               = new DOMDocument('1.0', 'UTF-8');
=======
    private $testSuiteLevel = 0;

    /**
     * @var \DOMElement
     */
    private $currentTestCase;

    /**
     * @param null|mixed $out
     */
    public function __construct($out = null, bool $reportRiskyTests = false)
    {
        $this->document               = new \DOMDocument('1.0', 'UTF-8');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $this->document->formatOutput = true;

        $this->root = $this->document->createElement('testsuites');
        $this->document->appendChild($this->root);

        parent::__construct($out);

        $this->reportRiskyTests = $reportRiskyTests;
    }

    /**
     * Flush buffer and close output.
     */
    public function flush(): void
    {
<<<<<<< HEAD
        if ($this->writeDocument === true) {
            $this->write($this->getXML());
        }
=======
        $this->write($this->getXML());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        parent::flush();
    }

    /**
     * An error occurred.
<<<<<<< HEAD
     *
     * @throws \InvalidArgumentException
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function addError(Test $test, \Throwable $t, float $time): void
    {
        $this->doAddFault($test, $t, $time, 'error');
        $this->testSuiteErrors[$this->testSuiteLevel]++;
    }

    /**
     * A warning occurred.
<<<<<<< HEAD
     *
     * @throws \InvalidArgumentException
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function addWarning(Test $test, Warning $e, float $time): void
    {
        $this->doAddFault($test, $e, $time, 'warning');
        $this->testSuiteFailures[$this->testSuiteLevel]++;
    }

    /**
     * A failure occurred.
<<<<<<< HEAD
     *
     * @throws \InvalidArgumentException
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function addFailure(Test $test, AssertionFailedError $e, float $time): void
    {
        $this->doAddFault($test, $e, $time, 'failure');
        $this->testSuiteFailures[$this->testSuiteLevel]++;
    }

    /**
     * Incomplete test.
     */
    public function addIncompleteTest(Test $test, \Throwable $t, float $time): void
    {
<<<<<<< HEAD
        $this->doAddSkipped($test);
=======
        $this->doAddSkipped();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Risky test.
     */
    public function addRiskyTest(Test $test, \Throwable $t, float $time): void
    {
        if (!$this->reportRiskyTests || $this->currentTestCase === null) {
            return;
        }

        $error = $this->document->createElement(
            'error',
            Xml::prepareString(
                "Risky Test\n" .
                Filter::getFilteredStacktrace($t)
            )
        );

        $error->setAttribute('type', \get_class($t));

        $this->currentTestCase->appendChild($error);

        $this->testSuiteErrors[$this->testSuiteLevel]++;
    }

    /**
     * Skipped test.
     */
    public function addSkippedTest(Test $test, \Throwable $t, float $time): void
    {
<<<<<<< HEAD
        $this->doAddSkipped($test);
=======
        $this->doAddSkipped();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * A testsuite started.
     */
    public function startTestSuite(TestSuite $suite): void
    {
        $testSuite = $this->document->createElement('testsuite');
        $testSuite->setAttribute('name', $suite->getName());

        if (\class_exists($suite->getName(), false)) {
            try {
<<<<<<< HEAD
                $class = new ReflectionClass($suite->getName());

                $testSuite->setAttribute('file', $class->getFileName());
            } catch (ReflectionException $e) {
=======
                $class = new \ReflectionClass($suite->getName());

                $testSuite->setAttribute('file', $class->getFileName());
            } catch (\ReflectionException $e) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            }
        }

        if ($this->testSuiteLevel > 0) {
            $this->testSuites[$this->testSuiteLevel]->appendChild($testSuite);
        } else {
            $this->root->appendChild($testSuite);
        }

        $this->testSuiteLevel++;
        $this->testSuites[$this->testSuiteLevel]          = $testSuite;
        $this->testSuiteTests[$this->testSuiteLevel]      = 0;
        $this->testSuiteAssertions[$this->testSuiteLevel] = 0;
        $this->testSuiteErrors[$this->testSuiteLevel]     = 0;
        $this->testSuiteFailures[$this->testSuiteLevel]   = 0;
        $this->testSuiteSkipped[$this->testSuiteLevel]    = 0;
        $this->testSuiteTimes[$this->testSuiteLevel]      = 0;
    }

    /**
     * A testsuite ended.
     */
    public function endTestSuite(TestSuite $suite): void
    {
        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'tests',
<<<<<<< HEAD
            $this->testSuiteTests[$this->testSuiteLevel]
=======
            (string) $this->testSuiteTests[$this->testSuiteLevel]
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'assertions',
<<<<<<< HEAD
            $this->testSuiteAssertions[$this->testSuiteLevel]
=======
            (string) $this->testSuiteAssertions[$this->testSuiteLevel]
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'errors',
<<<<<<< HEAD
            $this->testSuiteErrors[$this->testSuiteLevel]
=======
            (string) $this->testSuiteErrors[$this->testSuiteLevel]
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'failures',
<<<<<<< HEAD
            $this->testSuiteFailures[$this->testSuiteLevel]
=======
            (string) $this->testSuiteFailures[$this->testSuiteLevel]
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'skipped',
<<<<<<< HEAD
            $this->testSuiteSkipped[$this->testSuiteLevel]
=======
            (string) $this->testSuiteSkipped[$this->testSuiteLevel]
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'time',
            \sprintf('%F', $this->testSuiteTimes[$this->testSuiteLevel])
        );

        if ($this->testSuiteLevel > 1) {
            $this->testSuiteTests[$this->testSuiteLevel - 1] += $this->testSuiteTests[$this->testSuiteLevel];
            $this->testSuiteAssertions[$this->testSuiteLevel - 1] += $this->testSuiteAssertions[$this->testSuiteLevel];
            $this->testSuiteErrors[$this->testSuiteLevel - 1] += $this->testSuiteErrors[$this->testSuiteLevel];
            $this->testSuiteFailures[$this->testSuiteLevel - 1] += $this->testSuiteFailures[$this->testSuiteLevel];
            $this->testSuiteSkipped[$this->testSuiteLevel - 1] += $this->testSuiteSkipped[$this->testSuiteLevel];
            $this->testSuiteTimes[$this->testSuiteLevel - 1] += $this->testSuiteTimes[$this->testSuiteLevel];
        }

        $this->testSuiteLevel--;
    }

    /**
     * A test started.
<<<<<<< HEAD
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ReflectionException
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function startTest(Test $test): void
    {
        $usesDataprovider = false;

        if (\method_exists($test, 'usesDataProvider')) {
            $usesDataprovider = $test->usesDataProvider();
        }

        $testCase = $this->document->createElement('testcase');
        $testCase->setAttribute('name', $test->getName());

<<<<<<< HEAD
        $class      = new ReflectionClass($test);
        $methodName = $test->getName(!$usesDataprovider);

        if ($class->hasMethod($methodName)) {
            $method = $class->getMethod($methodName);
=======
        try {
            $class = new \ReflectionClass($test);
        } catch (\ReflectionException $e) {
            throw new Exception(
                $e->getMessage(),
                (int) $e->getCode(),
                $e
            );
        }

        $methodName = $test->getName(!$usesDataprovider);

        if ($class->hasMethod($methodName)) {
            try {
                $method = $class->getMethod($methodName);
            } catch (\ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    (int) $e->getCode(),
                    $e
                );
            }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

            $testCase->setAttribute('class', $class->getName());
            $testCase->setAttribute('classname', \str_replace('\\', '.', $class->getName()));
            $testCase->setAttribute('file', $class->getFileName());
<<<<<<< HEAD
            $testCase->setAttribute('line', $method->getStartLine());
=======
            $testCase->setAttribute('line', (string) $method->getStartLine());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        $this->currentTestCase = $testCase;
    }

    /**
     * A test ended.
     */
    public function endTest(Test $test, float $time): void
    {
        $numAssertions = 0;

        if (\method_exists($test, 'getNumAssertions')) {
            $numAssertions = $test->getNumAssertions();
        }

        $this->testSuiteAssertions[$this->testSuiteLevel] += $numAssertions;

        $this->currentTestCase->setAttribute(
            'assertions',
<<<<<<< HEAD
            $numAssertions
=======
            (string) $numAssertions
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );

        $this->currentTestCase->setAttribute(
            'time',
            \sprintf('%F', $time)
        );

        $this->testSuites[$this->testSuiteLevel]->appendChild(
            $this->currentTestCase
        );

        $this->testSuiteTests[$this->testSuiteLevel]++;
        $this->testSuiteTimes[$this->testSuiteLevel] += $time;

        $testOutput = '';

        if (\method_exists($test, 'hasOutput') && \method_exists($test, 'getActualOutput')) {
            $testOutput = $test->hasOutput() ? $test->getActualOutput() : '';
        }

        if (!empty($testOutput)) {
            $systemOut = $this->document->createElement(
                'system-out',
                Xml::prepareString($testOutput)
            );

            $this->currentTestCase->appendChild($systemOut);
        }

        $this->currentTestCase = null;
    }

    /**
     * Returns the XML as a string.
     */
    public function getXML(): string
    {
        return $this->document->saveXML();
    }

<<<<<<< HEAD
    /**
     * Enables or disables the writing of the document
     * in flush().
     *
     * This is a "hack" needed for the integration of
     * PHPUnit with Phing.
     */
    public function setWriteDocument(/*bool*/ $flag): void
    {
        if (\is_bool($flag)) {
            $this->writeDocument = $flag;
        }
    }

    /**
     * Method which generalizes addError() and addFailure()
     *
     * @throws \InvalidArgumentException
     */
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    private function doAddFault(Test $test, \Throwable $t, float $time, $type): void
    {
        if ($this->currentTestCase === null) {
            return;
        }

        if ($test instanceof SelfDescribing) {
            $buffer = $test->toString() . "\n";
        } else {
            $buffer = '';
        }

        $buffer .= TestFailure::exceptionToString($t) . "\n" .
                   Filter::getFilteredStacktrace($t);

        $fault = $this->document->createElement(
            $type,
            Xml::prepareString($buffer)
        );

        if ($t instanceof ExceptionWrapper) {
            $fault->setAttribute('type', $t->getClassName());
        } else {
            $fault->setAttribute('type', \get_class($t));
        }

        $this->currentTestCase->appendChild($fault);
    }

<<<<<<< HEAD
    private function doAddSkipped(Test $test): void
=======
    private function doAddSkipped(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if ($this->currentTestCase === null) {
            return;
        }

        $skipped = $this->document->createElement('skipped');
<<<<<<< HEAD
=======

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $this->currentTestCase->appendChild($skipped);

        $this->testSuiteSkipped[$this->testSuiteLevel]++;
    }
}
