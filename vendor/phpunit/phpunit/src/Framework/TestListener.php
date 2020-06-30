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

/**
<<<<<<< HEAD
 * A Listener for test progress.
=======
 * @deprecated Use the `TestHook` interfaces instead
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
interface TestListener
{
    /**
     * An error occurred.
<<<<<<< HEAD
=======
     *
     * @deprecated Use `AfterTestErrorHook::executeAfterTestError` instead
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function addError(Test $test, \Throwable $t, float $time): void;

    /**
     * A warning occurred.
<<<<<<< HEAD
=======
     *
     * @deprecated Use `AfterTestWarningHook::executeAfterTestWarning` instead
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function addWarning(Test $test, Warning $e, float $time): void;

    /**
     * A failure occurred.
<<<<<<< HEAD
=======
     *
     * @deprecated Use `AfterTestFailureHook::executeAfterTestFailure` instead
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function addFailure(Test $test, AssertionFailedError $e, float $time): void;

    /**
     * Incomplete test.
<<<<<<< HEAD
=======
     *
     * @deprecated Use `AfterIncompleteTestHook::executeAfterIncompleteTest` instead
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function addIncompleteTest(Test $test, \Throwable $t, float $time): void;

    /**
     * Risky test.
<<<<<<< HEAD
=======
     *
     * @deprecated Use `AfterRiskyTestHook::executeAfterRiskyTest` instead
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function addRiskyTest(Test $test, \Throwable $t, float $time): void;

    /**
     * Skipped test.
<<<<<<< HEAD
=======
     *
     * @deprecated Use `AfterSkippedTestHook::executeAfterSkippedTest` instead
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function addSkippedTest(Test $test, \Throwable $t, float $time): void;

    /**
     * A test suite started.
     */
    public function startTestSuite(TestSuite $suite): void;

    /**
     * A test suite ended.
     */
    public function endTestSuite(TestSuite $suite): void;

    /**
     * A test started.
<<<<<<< HEAD
=======
     *
     * @deprecated Use `BeforeTestHook::executeBeforeTest` instead
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function startTest(Test $test): void;

    /**
     * A test ended.
<<<<<<< HEAD
=======
     *
     * @deprecated Use `AfterTestHook::executeAfterTest` instead
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function endTest(Test $test, float $time): void;
}
