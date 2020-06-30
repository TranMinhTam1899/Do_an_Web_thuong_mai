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

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExceptionWrapper;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestFailure;
use PHPUnit\Framework\TestResult;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;
use PHPUnit\TextUI\ResultPrinter;
<<<<<<< HEAD
=======
use PHPUnit\Util\Exception;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use PHPUnit\Util\Filter;
use ReflectionClass;
use SebastianBergmann\Comparator\ComparisonFailure;

/**
<<<<<<< HEAD
 * A TestListener that generates a logfile of the test execution using the
 * TeamCity format (for use with PhpStorm, for instance).
 */
class TeamCity extends ResultPrinter
=======
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class TeamCity extends ResultPrinter
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @var bool
     */
    private $isSummaryTestCountPrinted = false;

    /**
     * @var string
     */
    private $startedTestName;

    /**
     * @var false|int
     */
    private $flowId;

<<<<<<< HEAD
=======
    /**
     * @throws \SebastianBergmann\Timer\RuntimeException
     */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function printResult(TestResult $result): void
    {
        $this->printHeader();
        $this->printFooter($result);
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
        $this->printEvent(
            'testFailed',
            [
                'name'     => $test->getName(),
                'message'  => self::getMessage($t),
                'details'  => self::getDetails($t),
                'duration' => self::toMilliseconds($time),
            ]
        );
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
        $this->printEvent(
            'testFailed',
            [
                'name'     => $test->getName(),
                'message'  => self::getMessage($e),
                'details'  => self::getDetails($e),
                'duration' => self::toMilliseconds($time),
            ]
        );
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
        $parameters = [
            'name'     => $test->getName(),
            'message'  => self::getMessage($e),
            'details'  => self::getDetails($e),
            'duration' => self::toMilliseconds($time),
        ];

        if ($e instanceof ExpectationFailedException) {
            $comparisonFailure = $e->getComparisonFailure();

            if ($comparisonFailure instanceof ComparisonFailure) {
                $expectedString = $comparisonFailure->getExpectedAsString();

                if ($expectedString === null || empty($expectedString)) {
                    $expectedString = self::getPrimitiveValueAsString($comparisonFailure->getExpected());
                }

                $actualString = $comparisonFailure->getActualAsString();

                if ($actualString === null || empty($actualString)) {
                    $actualString = self::getPrimitiveValueAsString($comparisonFailure->getActual());
                }

                if ($actualString !== null && $expectedString !== null) {
                    $parameters['type']     = 'comparisonFailure';
                    $parameters['actual']   = $actualString;
                    $parameters['expected'] = $expectedString;
                }
            }
        }

        $this->printEvent('testFailed', $parameters);
    }

    /**
     * Incomplete test.
     */
    public function addIncompleteTest(Test $test, \Throwable $t, float $time): void
    {
        $this->printIgnoredTest($test->getName(), $t, $time);
    }

    /**
     * Risky test.
<<<<<<< HEAD
     *
     * @throws \InvalidArgumentException
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function addRiskyTest(Test $test, \Throwable $t, float $time): void
    {
        $this->addError($test, $t, $time);
    }

    /**
     * Skipped test.
<<<<<<< HEAD
     *
     * @throws \ReflectionException
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function addSkippedTest(Test $test, \Throwable $t, float $time): void
    {
        $testName = $test->getName();

        if ($this->startedTestName !== $testName) {
            $this->startTest($test);
            $this->printIgnoredTest($testName, $t, $time);
            $this->endTest($test, $time);
        } else {
            $this->printIgnoredTest($testName, $t, $time);
        }
    }

    public function printIgnoredTest($testName, \Throwable $t, float $time): void
    {
        $this->printEvent(
            'testIgnored',
            [
                'name'     => $testName,
                'message'  => self::getMessage($t),
                'details'  => self::getDetails($t),
                'duration' => self::toMilliseconds($time),
            ]
        );
    }

    /**
     * A testsuite started.
<<<<<<< HEAD
     *
     * @throws \ReflectionException
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function startTestSuite(TestSuite $suite): void
    {
        if (\stripos(\ini_get('disable_functions'), 'getmypid') === false) {
            $this->flowId = \getmypid();
        } else {
            $this->flowId = false;
        }

        if (!$this->isSummaryTestCountPrinted) {
            $this->isSummaryTestCountPrinted = true;

            $this->printEvent(
                'testCount',
                ['count' => \count($suite)]
            );
        }

        $suiteName = $suite->getName();

        if (empty($suiteName)) {
            return;
        }

        $parameters = ['name' => $suiteName];

        if (\class_exists($suiteName, false)) {
            $fileName                   = self::getFileName($suiteName);
            $parameters['locationHint'] = "php_qn://$fileName::\\$suiteName";
        } else {
            $split = \explode('::', $suiteName);

            if (\count($split) === 2 && \class_exists($split[0]) && \method_exists($split[0], $split[1])) {
                $fileName                   = self::getFileName($split[0]);
                $parameters['locationHint'] = "php_qn://$fileName::\\$suiteName";
                $parameters['name']         = $split[1];
            }
        }

        $this->printEvent('testSuiteStarted', $parameters);
    }

    /**
     * A testsuite ended.
     */
    public function endTestSuite(TestSuite $suite): void
    {
        $suiteName = $suite->getName();

        if (empty($suiteName)) {
            return;
        }

        $parameters = ['name' => $suiteName];

        if (!\class_exists($suiteName, false)) {
            $split = \explode('::', $suiteName);

            if (\count($split) === 2 && \class_exists($split[0]) && \method_exists($split[0], $split[1])) {
                $parameters['name'] = $split[1];
            }
        }

        $this->printEvent('testSuiteFinished', $parameters);
    }

    /**
     * A test started.
<<<<<<< HEAD
     *
     * @throws \ReflectionException
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function startTest(Test $test): void
    {
        $testName              = $test->getName();
        $this->startedTestName = $testName;
        $params                = ['name' => $testName];

        if ($test instanceof TestCase) {
            $className              = \get_class($test);
            $fileName               = self::getFileName($className);
            $params['locationHint'] = "php_qn://$fileName::\\$className::$testName";
        }

        $this->printEvent('testStarted', $params);
    }

    /**
     * A test ended.
     */
    public function endTest(Test $test, float $time): void
    {
        parent::endTest($test, $time);

        $this->printEvent(
            'testFinished',
            [
                'name'     => $test->getName(),
                'duration' => self::toMilliseconds($time),
            ]
        );
    }

    protected function writeProgress(string $progress): void
    {
    }

<<<<<<< HEAD
    /**
     * @param string $eventName
     * @param array  $params
     */
    private function printEvent($eventName, $params = []): void
=======
    private function printEvent(string $eventName, array $params = []): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->write("\n##teamcity[$eventName");

        if ($this->flowId) {
            $params['flowId'] = $this->flowId;
        }

        foreach ($params as $key => $value) {
<<<<<<< HEAD
            $escapedValue = self::escapeValue($value);
=======
            $escapedValue = self::escapeValue((string) $value);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $this->write(" $key='$escapedValue'");
        }

        $this->write("]\n");
    }

    private static function getMessage(\Throwable $t): string
    {
        $message = '';

        if ($t instanceof ExceptionWrapper) {
            if ($t->getClassName() !== '') {
                $message .= $t->getClassName();
            }

            if ($message !== '' && $t->getMessage() !== '') {
                $message .= ' : ';
            }
        }

        return $message . $t->getMessage();
    }

<<<<<<< HEAD
    /**
     * @throws \InvalidArgumentException
     */
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    private static function getDetails(\Throwable $t): string
    {
        $stackTrace = Filter::getFilteredStacktrace($t);
        $previous   = $t instanceof ExceptionWrapper ? $t->getPreviousWrapped() : $t->getPrevious();

        while ($previous) {
            $stackTrace .= "\nCaused by\n" .
                TestFailure::exceptionToString($previous) . "\n" .
                Filter::getFilteredStacktrace($previous);

            $previous = $previous instanceof ExceptionWrapper ?
                $previous->getPreviousWrapped() : $previous->getPrevious();
        }

        return ' ' . \str_replace("\n", "\n ", $stackTrace);
    }

    private static function getPrimitiveValueAsString($value): ?string
    {
        if ($value === null) {
            return 'null';
        }

        if (\is_bool($value)) {
<<<<<<< HEAD
            return $value === true ? 'true' : 'false';
=======
            return $value ? 'true' : 'false';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        if (\is_scalar($value)) {
            return \print_r($value, true);
        }

        return null;
    }

    private static function escapeValue(string $text): string
    {
        return \str_replace(
            ['|', "'", "\n", "\r", ']', '['],
            ['||', "|'", '|n', '|r', '|]', '|['],
            $text
        );
    }

    /**
     * @param string $className
<<<<<<< HEAD
     *
     * @throws \ReflectionException
     */
    private static function getFileName($className): string
    {
        $reflectionClass = new ReflectionClass($className);

        return $reflectionClass->getFileName();
=======
     */
    private static function getFileName($className): string
    {
        try {
            return (new ReflectionClass($className))->getFileName();
        } catch (\ReflectionException $e) {
            throw new Exception(
                $e->getMessage(),
                (int) $e->getCode(),
                $e
            );
        }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * @param float $time microseconds
     */
    private static function toMilliseconds(float $time): int
    {
<<<<<<< HEAD
        return \round($time * 1000);
=======
        return (int) \round($time * 1000);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
