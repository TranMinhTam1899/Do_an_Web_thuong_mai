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
use PHPUnit\Framework\TestCase;

use PHPUnit\Runner\BaseTestRunner;

class ExceptionInTestDetectedInTeardown extends TestCase
{
    public $exceptionDetected = false;

    protected function tearDown(): void
    {
        if (BaseTestRunner::STATUS_ERROR == $this->getStatus()) {
            $this->exceptionDetected = true;
        }
    }

    public function testSomething(): void
    {
        throw new Exception;
    }
}
