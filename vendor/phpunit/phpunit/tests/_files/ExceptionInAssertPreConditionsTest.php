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

class ExceptionInAssertPreConditionsTest extends TestCase
{
    public $setUp                = false;

    public $assertPreConditions  = false;

    public $assertPostConditions = false;

    public $tearDown             = false;

    public $testSomething        = false;

    protected function setUp(): void
    {
        $this->setUp = true;
    }

    protected function tearDown(): void
    {
        $this->tearDown = true;
    }

    public function testSomething(): void
    {
        $this->testSomething = true;
    }

    protected function assertPreConditions(): void
    {
        $this->assertPreConditions = true;

        throw new Exception;
    }

    protected function assertPostConditions(): void
    {
        $this->assertPostConditions = true;
    }
}
