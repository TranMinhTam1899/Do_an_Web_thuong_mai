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

<<<<<<< HEAD
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestResult;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;
use PHPUnit\Runner\PhptTestCase;
use PHPUnit\Runner\TestSuiteSorter;
use PHPUnit\TextUI\ResultPrinter;
use SebastianBergmann\Timer\Timer;

/**
 * This printer is for CLI output only. For the classes that output to file, html and xml,
 * please refer to the PHPUnit\Util\TestDox namespace
 */
class CliTestDoxPrinter extends ResultPrinter
{
    /**
     * @var int[]
     */
    private $nonSuccessfulTestResults = [];

    /**
     * @var NamePrettifier
     */
    private $prettifier;

    /**
     * @var int The number of test results received from the TestRunner
     */
    private $testIndex = 0;

    /**
     * @var int The number of test results already sent to the output
     */
    private $testFlushIndex = 0;

    /**
     * @var array Buffer for write()
     */
    private $outputBuffer = [];

    /**
     * @var bool
     */
    private $bufferExecutionOrder = false;

    /**
     * @var array array<string>
     */
    private $originalExecutionOrder = [];

    /**
     * @var string Classname of the current test
     */
    private $className = '';

    /**
     * @var string Classname of the previous test; empty for first test
     */
    private $lastClassName = '';

    /**
     * @var string Prettified test name of current test
     */
    private $testMethod;

    /**
     * @var string Test result message of current test
     */
    private $testResultMessage;

    /**
     * @var bool Test result message of current test contains a verbose dump
     */
    private $lastFlushedTestWasVerbose = false;

    public function __construct(
        $out = null,
        bool $verbose = false,
        $colors = self::COLOR_DEFAULT,
        bool $debug = false,
        $numberOfColumns = 80,
        bool $reverse = false
    ) {
        parent::__construct($out, $verbose, $colors, $debug, $numberOfColumns, $reverse);

        $this->prettifier = new NamePrettifier;
    }

    public function setOriginalExecutionOrder(array $order): void
    {
        $this->originalExecutionOrder = $order;
        $this->bufferExecutionOrder   = !empty($order);
    }

    public function startTest(Test $test): void
    {
        if (!$test instanceof TestCase && !$test instanceof PhptTestCase && !$test instanceof TestSuite) {
            return;
        }

        $this->lastTestFailed    = false;
        $this->lastClassName     = $this->className;
        $this->testResultMessage = '';

        if ($test instanceof TestCase) {
            $className  = $this->prettifier->prettifyTestClass(\get_class($test));
            $testMethod = $this->prettifier->prettifyTestCase($test);
        } elseif ($test instanceof PhptTestCase) {
            $className  = \get_class($test);
            $testMethod = $test->getName();
        }

        $this->className  = $className;
        $this->testMethod = $testMethod;

        parent::startTest($test);
    }

    public function endTest(Test $test, float $time): void
    {
        if (!$test instanceof TestCase && !$test instanceof PhptTestCase && !$test instanceof TestSuite) {
            return;
        }

        if ($test instanceof TestCase || $test instanceof PhptTestCase) {
            $this->testIndex++;
        }

        if ($this->lastTestFailed) {
            $resultMessage                    = $this->testResultMessage;
            $this->nonSuccessfulTestResults[] = $this->testIndex;
        } else {
            $resultMessage = $this->formatTestResultMessage(
                $this->formatWithColor('fg-green', '✔'),
                '',
                $time,
                $this->verbose
            );
        }

        if ($this->bufferExecutionOrder) {
            $this->bufferTestResult($test, $resultMessage);
            $this->flushOutputBuffer();
        } else {
            $this->writeTestResult($resultMessage);

            if ($this->lastTestFailed) {
                $this->bufferTestResult($test, $resultMessage);
            }
        }

        parent::endTest($test, $time);
    }

    public function addError(Test $test, \Throwable $t, float $time): void
    {
        $this->lastTestFailed    = true;
        $this->testResultMessage = $this->formatTestResultMessage(
            $this->formatWithColor('fg-yellow', '✘'),
            (string) $t,
            $time,
            true
        );
    }

    public function addWarning(Test $test, Warning $e, float $time): void
    {
        $this->lastTestFailed    = true;
        $this->testResultMessage = $this->formatTestResultMessage(
            $this->formatWithColor('fg-yellow', '✘'),
            (string) $e,
            $time,
            true
        );
    }

    public function addFailure(Test $test, AssertionFailedError $e, float $time): void
    {
        $this->lastTestFailed    = true;
        $this->testResultMessage = $this->formatTestResultMessage(
            $this->formatWithColor('fg-red', '✘'),
            (string) $e,
            $time,
            true
        );
    }

    public function addIncompleteTest(Test $test, \Throwable $t, float $time): void
    {
        $this->lastTestFailed    = true;
        $this->testResultMessage = $this->formatTestResultMessage(
            $this->formatWithColor('fg-yellow', '∅'),
            (string) $t,
            $time,
            false
        );
    }

    public function addRiskyTest(Test $test, \Throwable $t, float $time): void
    {
        $this->lastTestFailed    = true;
        $this->testResultMessage = $this->formatTestResultMessage(
            $this->formatWithColor('fg-yellow', '☢'),
            (string) $t,
            $time,
            false
        );
    }

    public function addSkippedTest(Test $test, \Throwable $t, float $time): void
    {
        $this->lastTestFailed    = true;
        $this->testResultMessage = $this->formatTestResultMessage(
            $this->formatWithColor('fg-yellow', '→'),
            (string) $t,
            $time,
            false
        );
    }

    public function bufferTestResult(Test $test, string $msg): void
    {
        $this->outputBuffer[$this->testIndex] = [
            'className'  => $this->className,
            'testName'   => TestSuiteSorter::getTestSorterUID($test),
            'testMethod' => $this->testMethod,
            'message'    => $msg,
            'failed'     => $this->lastTestFailed,
            'verbose'    => $this->lastFlushedTestWasVerbose,
        ];
    }

    public function writeTestResult(string $msg): void
    {
        $msg = $this->formatTestSuiteHeader($this->lastClassName, $this->className, $msg);
        $this->write($msg);
    }

    public function writeProgress(string $progress): void
    {
    }

    public function flush(): void
    {
    }

    public function printResult(TestResult $result): void
    {
        $this->printHeader();

        $this->printNonSuccessfulTestsSummary($result->count());

        $this->printFooter($result);
    }

    protected function printHeader(): void
    {
        $this->write("\n" . Timer::resourceUsage() . "\n\n");
    }

    private function flushOutputBuffer(): void
    {
        if ($this->testFlushIndex === $this->testIndex) {
            return;
        }

        if ($this->testFlushIndex > 0) {
            $prevResult = $this->getTestResultByName($this->originalExecutionOrder[$this->testFlushIndex - 1]);
        } else {
            $prevResult = $this->getEmptyTestResult();
        }

        do {
            $flushed = false;
            $result  = $this->getTestResultByName($this->originalExecutionOrder[$this->testFlushIndex]);

            if (!empty($result)) {
                $this->writeBufferTestResult($prevResult, $result);
                $this->testFlushIndex++;
                $prevResult = $result;
                $flushed    = true;
            }
        } while ($flushed && $this->testFlushIndex < $this->testIndex);
    }

    private function writeBufferTestResult(array $prevResult, array $result): void
    {
        // Write spacer line for new suite headers and after verbose messages
        if ($prevResult['testName'] !== '' &&
            ($prevResult['verbose'] === true || $prevResult['className'] !== $result['className'])) {
            $this->write("\n");
        }

        // Write suite header
        if ($prevResult['className'] !== $result['className']) {
            $this->write($result['className'] . "\n");
        }

        // Write the test result itself
        $this->write($result['message']);
    }

    private function getTestResultByName(string $testName): array
    {
        foreach ($this->outputBuffer as $result) {
            if ($result['testName'] === $testName) {
                return $result;
            }
        }

        return [];
    }

    private function formatTestSuiteHeader(?string $lastClassName, string $className, string $msg): string
    {
        if ($lastClassName === null || $className !== $lastClassName) {
            return \sprintf(
                "%s%s\n%s",
                ($this->lastClassName !== '') ? "\n" : '',
                $className,
                $msg
            );
        }

        return $msg;
    }

    private function formatTestResultMessage(
        string $symbol,
        string $resultMessage,
        float $time,
        bool $alwaysVerbose = false
    ): string {
        $additionalInformation = $this->getFormattedAdditionalInformation($resultMessage, $alwaysVerbose);
        $msg                   = \sprintf(
            " %s %s%s\n%s",
            $symbol,
            $this->testMethod,
            $this->verbose ? ' ' . $this->getFormattedRuntime($time) : '',
            $additionalInformation
        );

        $this->lastFlushedTestWasVerbose = !empty($additionalInformation);

        return $msg;
    }

    private function getFormattedRuntime(float $time): string
    {
        if ($time > 5) {
            return $this->formatWithColor('fg-red', \sprintf('[%.2f ms]', $time * 1000));
        }

        if ($time > 1) {
            return $this->formatWithColor('fg-yellow', \sprintf('[%.2f ms]', $time * 1000));
        }

        return \sprintf('[%.2f ms]', $time * 1000);
    }

    private function getFormattedAdditionalInformation(string $resultMessage, bool $verbose): string
    {
        if ($resultMessage === '') {
            return '';
        }

        if (!($this->verbose || $verbose)) {
            return '';
        }

        return \sprintf(
            "   │\n%s\n",
            \implode(
                "\n",
                \array_map(
                    function (string $text) {
                        return \sprintf('   │ %s', $text);
                    },
                    \explode("\n", $resultMessage)
                )
            )
        );
=======
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestResult;
use PHPUnit\Runner\BaseTestRunner;
use PHPUnit\Runner\PhptTestCase;
use PHPUnit\Util\Color;
use SebastianBergmann\Timer\Timer;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
class CliTestDoxPrinter extends TestDoxPrinter
{
    /**
     * The default Testdox left margin for messages is a vertical line
     */
    private const PREFIX_SIMPLE = [
        'default' => '│',
        'start'   => '│',
        'message' => '│',
        'diff'    => '│',
        'trace'   => '│',
        'last'    => '│',
    ];

    /**
     * Colored Testdox use box-drawing for a more textured map of the message
     */
    private const PREFIX_DECORATED = [
        'default' => '│',
        'start'   => '┐',
        'message' => '├',
        'diff'    => '┊',
        'trace'   => '╵',
        'last'    => '┴',
    ];

    private const SPINNER_ICONS = [
        " \e[36m◐\e[0m running tests",
        " \e[36m◓\e[0m running tests",
        " \e[36m◑\e[0m running tests",
        " \e[36m◒\e[0m running tests",
    ];

    private const STATUS_STYLES = [
        BaseTestRunner::STATUS_PASSED     => [
            'symbol' => '✔',
            'color'  => 'fg-green',
        ],
        BaseTestRunner::STATUS_ERROR      => [
            'symbol'  => '✘',
            'color'   => 'fg-yellow',
            'message' => 'bg-yellow,fg-black',
        ],
        BaseTestRunner::STATUS_FAILURE    => [
            'symbol'  => '✘',
            'color'   => 'fg-red',
            'message' => 'bg-red,fg-white',
        ],
        BaseTestRunner::STATUS_SKIPPED    => [
            'symbol'  => '↩',
            'color'   => 'fg-cyan',
            'message' => 'fg-cyan',
        ],
        BaseTestRunner::STATUS_RISKY      => [
            'symbol'  => '☢',
            'color'   => 'fg-yellow',
            'message' => 'fg-yellow',
        ],
        BaseTestRunner::STATUS_INCOMPLETE => [
            'symbol'  => '∅',
            'color'   => 'fg-yellow',
            'message' => 'fg-yellow',
        ],
        BaseTestRunner::STATUS_WARNING    => [
            'symbol'  => '⚠',
            'color'   => 'fg-yellow',
            'message' => 'fg-yellow',
        ],
        BaseTestRunner::STATUS_UNKNOWN    => [
            'symbol'  => '?',
            'color'   => 'fg-blue',
            'message' => 'fg-white,bg-blue',
        ],
    ];

    /**
     * @var int[]
     */
    private $nonSuccessfulTestResults = [];

    /**
     * @throws \SebastianBergmann\Timer\RuntimeException
     */
    public function printResult(TestResult $result): void
    {
        $this->printHeader();

        $this->printNonSuccessfulTestsSummary($result->count());

        $this->printFooter($result);
    }

    /**
     * @throws \SebastianBergmann\Timer\RuntimeException
     */
    protected function printHeader(): void
    {
        $this->write("\n" . Timer::resourceUsage() . "\n\n");
    }

    protected function formatClassName(Test $test): string
    {
        if ($test instanceof TestCase) {
            return $this->prettifier->prettifyTestClass(\get_class($test));
        }

        return \get_class($test);
    }

    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    protected function registerTestResult(Test $test, ?\Throwable $t, int $status, float $time, bool $verbose): void
    {
        if ($status !== BaseTestRunner::STATUS_PASSED) {
            $this->nonSuccessfulTestResults[] = $this->testIndex;
        }

        parent::registerTestResult($test, $t, $status, $time, $verbose);
    }

    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    protected function formatTestName(Test $test): string
    {
        if ($test instanceof TestCase) {
            return $this->prettifier->prettifyTestCase($test);
        }

        return parent::formatTestName($test);
    }

    protected function writeTestResult(array $prevResult, array $result): void
    {
        // spacer line for new suite headers and after verbose messages
        if ($prevResult['testName'] !== '' &&
            (!empty($prevResult['message']) || $prevResult['className'] !== $result['className'])) {
            $this->write(\PHP_EOL);
        }

        // suite header
        if ($prevResult['className'] !== $result['className']) {
            $this->write($this->colorizeTextBox('underlined', $result['className']) . \PHP_EOL);
        }

        // test result line
        if ($this->colors && $result['className'] === PhptTestCase::class) {
            $testName = Color::colorizePath($result['testName'], $prevResult['testName'], true);
        } else {
            $testName = $result['testMethod'];
        }

        $style = self::STATUS_STYLES[$result['status']];
        $line  = \sprintf(
            ' %s %s%s' . \PHP_EOL,
            $this->colorizeTextBox($style['color'], $style['symbol']),
            $testName,
            $this->verbose ? ' ' . $this->formatRuntime($result['time'], $style['color']) : ''
        );

        $this->write($line);

        // additional information when verbose
        $this->write($result['message']);
    }

    protected function formatThrowable(\Throwable $t, ?int $status = null): string
    {
        return \trim(\PHPUnit\Framework\TestFailure::exceptionToString($t));
    }

    protected function colorizeMessageAndDiff(string $style, string $buffer): array
    {
        $lines      = $buffer ? \array_map('\rtrim', \explode(\PHP_EOL, $buffer)) : [];
        $message    = [];
        $diff       = [];
        $insideDiff = false;

        foreach ($lines as $line) {
            if ($line === '--- Expected') {
                $insideDiff = true;
            }

            if (!$insideDiff) {
                $message[] = $line;
            } else {
                if (\strpos($line, '-') === 0) {
                    $line = Color::colorize('fg-red', Color::visualizeWhitespace($line, true));
                } elseif (\strpos($line, '+') === 0) {
                    $line = Color::colorize('fg-green', Color::visualizeWhitespace($line, true));
                } elseif ($line === '@@ @@') {
                    $line = Color::colorize('fg-cyan', $line);
                }
                $diff[] = $line;
            }
        }
        $diff = \implode(\PHP_EOL, $diff);

        if (!empty($message)) {
            $message = $this->colorizeTextBox($style, \implode(\PHP_EOL, $message));
        }

        return [$message, $diff];
    }

    protected function formatStacktrace(\Throwable $t): string
    {
        $trace = \PHPUnit\Util\Filter::getFilteredStacktrace($t);

        if (!$this->colors) {
            return $trace;
        }

        $lines    = [];
        $prevPath = '';

        foreach (\explode(\PHP_EOL, $trace) as $line) {
            if (\preg_match('/^(.*):(\d+)$/', $line, $matches)) {
                $lines[] = Color::colorizePath($matches[1], $prevPath) .
                    Color::dim(':') .
                    Color::colorize('fg-blue', $matches[2]) .
                    "\n";
                $prevPath = $matches[1];
            } else {
                $lines[]  = $line;
                $prevPath = '';
            }
        }

        return \implode('', $lines);
    }

    protected function formatTestResultMessage(\Throwable $t, array $result, ?string $prefix = null): string
    {
        $message = $this->formatThrowable($t, $result['status']);
        $diff    = '';

        if (!($this->verbose || $result['verbose'])) {
            return '';
        }

        if ($message && $this->colors) {
            $style            = self::STATUS_STYLES[$result['status']]['message'] ?? '';
            [$message, $diff] = $this->colorizeMessageAndDiff($style, $message);
        }

        if ($prefix === null || !$this->colors) {
            $prefix = self::PREFIX_SIMPLE;
        }

        if ($this->colors) {
            $color  = self::STATUS_STYLES[$result['status']]['color'] ?? '';
            $prefix = \array_map(static function ($p) use ($color) {
                return Color::colorize($color, $p);
            }, self::PREFIX_DECORATED);
        }

        $trace = $this->formatStacktrace($t);
        $out   = $this->prefixLines($prefix['start'], \PHP_EOL) . \PHP_EOL;

        if ($message) {
            $out .= $this->prefixLines($prefix['message'], $message . \PHP_EOL) . \PHP_EOL;
        }

        if ($diff) {
            $out .= $this->prefixLines($prefix['diff'], $diff . \PHP_EOL) . \PHP_EOL;
        }

        if ($trace) {
            if ($message || $diff) {
                $out .= $this->prefixLines($prefix['default'], \PHP_EOL) . \PHP_EOL;
            }
            $out .= $this->prefixLines($prefix['trace'], $trace . \PHP_EOL) . \PHP_EOL;
        }
        $out .= $this->prefixLines($prefix['last'], \PHP_EOL) . \PHP_EOL;

        return $out;
    }

    protected function drawSpinner(): void
    {
        if ($this->colors) {
            $id =  $this->spinState % \count(self::SPINNER_ICONS);
            $this->write(self::SPINNER_ICONS[$id]);
        }
    }

    protected function undrawSpinner(): void
    {
        if ($this->colors) {
            $id =  $this->spinState % \count(self::SPINNER_ICONS);
            $this->write("\e[1K\e[" . \strlen(self::SPINNER_ICONS[$id]) . 'D');
        }
    }

    private function formatRuntime(float $time, string $color = ''): string
    {
        if (!$this->colors) {
            return \sprintf('[%.2f ms]', $time * 1000);
        }

        if ($time > 1) {
            $color = 'fg-magenta';
        }

        return Color::colorize($color, ' ' . (int) \ceil($time * 1000) . ' ' . Color::dim('ms'));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    private function printNonSuccessfulTestsSummary(int $numberOfExecutedTests): void
    {
        if (empty($this->nonSuccessfulTestResults)) {
            return;
        }

        if ((\count($this->nonSuccessfulTestResults) / $numberOfExecutedTests) >= 0.7) {
            return;
        }

        $this->write("Summary of non-successful tests:\n\n");

        $prevResult = $this->getEmptyTestResult();

        foreach ($this->nonSuccessfulTestResults as $testIndex) {
<<<<<<< HEAD
            $result = $this->outputBuffer[$testIndex];
            $this->writeBufferTestResult($prevResult, $result);
            $prevResult = $result;
        }
    }

    private function getEmptyTestResult(): array
    {
        return [
            'className' => '',
            'testName'  => '',
            'message'   => '',
            'failed'    => '',
            'verbose'   => '',
        ];
    }
=======
            $result = $this->testResults[$testIndex];
            $this->writeTestResult($prevResult, $result);
            $prevResult = $result;
        }
    }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
