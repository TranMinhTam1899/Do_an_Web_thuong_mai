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
namespace PHPUnit\Framework;

use PHPUnit\Framework\Error\Error;
use Throwable;

/**
<<<<<<< HEAD
 * A TestFailure collects a failed test together with the caught exception.
 */
class TestFailure
=======
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class TestFailure
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @var null|Test
     */
<<<<<<< HEAD
    protected $failedTest;
=======
    private $failedTest;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * @var Throwable
     */
<<<<<<< HEAD
    protected $thrownException;
=======
    private $thrownException;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * @var string
     */
    private $testName;

    /**
     * Returns a description for an exception.
<<<<<<< HEAD
     *
     * @throws \InvalidArgumentException
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public static function exceptionToString(Throwable $e): string
    {
        if ($e instanceof SelfDescribing) {
            $buffer = $e->toString();

            if ($e instanceof ExpectationFailedException && $e->getComparisonFailure()) {
                $buffer .= $e->getComparisonFailure()->getDiff();
            }

<<<<<<< HEAD
=======
            if ($e instanceof PHPTAssertionFailedError) {
                $buffer .= $e->getDiff();
            }

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            if (!empty($buffer)) {
                $buffer = \trim($buffer) . "\n";
            }

            return $buffer;
        }

        if ($e instanceof Error) {
            return $e->getMessage() . "\n";
        }

        if ($e instanceof ExceptionWrapper) {
            return $e->getClassName() . ': ' . $e->getMessage() . "\n";
        }

        return \get_class($e) . ': ' . $e->getMessage() . "\n";
    }

    /**
     * Constructs a TestFailure with the given test and exception.
     *
     * @param Throwable $t
     */
    public function __construct(Test $failedTest, $t)
    {
        if ($failedTest instanceof SelfDescribing) {
            $this->testName = $failedTest->toString();
        } else {
            $this->testName = \get_class($failedTest);
        }

        if (!$failedTest instanceof TestCase || !$failedTest->isInIsolation()) {
            $this->failedTest = $failedTest;
        }

        $this->thrownException = $t;
    }

    /**
     * Returns a short description of the failure.
     */
    public function toString(): string
    {
        return \sprintf(
            '%s: %s',
            $this->testName,
            $this->thrownException->getMessage()
        );
    }

    /**
     * Returns a description for the thrown exception.
<<<<<<< HEAD
     *
     * @throws \InvalidArgumentException
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function getExceptionAsString(): string
    {
        return self::exceptionToString($this->thrownException);
    }

    /**
     * Returns the name of the failing test (including data set, if any).
     */
    public function getTestName(): string
    {
        return $this->testName;
    }

    /**
     * Returns the failing test.
     *
     * Note: The test object is not set when the test is executed in process
     * isolation.
     *
     * @see Exception
     */
    public function failedTest(): ?Test
    {
        return $this->failedTest;
    }

    /**
     * Gets the thrown exception.
     */
    public function thrownException(): Throwable
    {
        return $this->thrownException;
    }

    /**
     * Returns the exception's message.
     */
    public function exceptionMessage(): string
    {
        return $this->thrownException()->getMessage();
    }

    /**
     * Returns true if the thrown exception
     * is of type AssertionFailedError.
     */
    public function isFailure(): bool
    {
        return $this->thrownException() instanceof AssertionFailedError;
    }
}
