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

use MyTestListener;

<<<<<<< HEAD
=======
/**
 * @small
 */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
final class TestListenerTest extends TestCase
{
    /**
     * @var TestResult
     */
    private $result;

    /**
     * @var MyTestListener
     */
    private $listener;

    protected function setUp(): void
    {
        $this->result   = new TestResult;
        $this->listener = new MyTestListener;

        $this->result->addListener($this->listener);
    }

    public function testError(): void
    {
        $test = new \TestError;
        $test->run($this->result);

        $this->assertEquals(1, $this->listener->errorCount());
        $this->assertEquals(1, $this->listener->endCount());
    }

    public function testFailure(): void
    {
        $test = new \Failure;
        $test->run($this->result);

        $this->assertEquals(1, $this->listener->failureCount());
        $this->assertEquals(1, $this->listener->endCount());
    }

    public function testStartStop(): void
    {
        $test = new \Success;
        $test->run($this->result);

        $this->assertEquals(1, $this->listener->startCount());
        $this->assertEquals(1, $this->listener->endCount());
    }
}
