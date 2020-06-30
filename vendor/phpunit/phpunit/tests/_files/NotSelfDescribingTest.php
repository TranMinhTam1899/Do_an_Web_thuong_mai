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
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestResult;

class NotSelfDescribingTest implements Test
{
    public function log($msg): void
    {
        print $msg;
    }

    public function count(): int
    {
        return 0;
    }

    public function run(TestResult $result = null): TestResult
    {
        return new TestResult();
    }
}
