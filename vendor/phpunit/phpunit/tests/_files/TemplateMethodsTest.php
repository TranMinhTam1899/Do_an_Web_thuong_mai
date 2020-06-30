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

class TemplateMethodsTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        print __METHOD__ . "\n";
    }

    public static function tearDownAfterClass(): void
    {
        print __METHOD__ . "\n";
    }

    protected function setUp(): void
    {
        print __METHOD__ . "\n";
    }

    protected function tearDown(): void
    {
        print __METHOD__ . "\n";
    }

    public function testOne(): void
    {
        print __METHOD__ . "\n";
        $this->assertTrue(true);
    }

    public function testTwo(): void
    {
        print __METHOD__ . "\n";
        $this->assertTrue(false);
    }

    protected function assertPreConditions(): void
    {
        print __METHOD__ . "\n";
    }

    protected function assertPostConditions(): void
    {
        print __METHOD__ . "\n";
    }

    protected function onNotSuccessfulTest(Throwable $t): void
    {
        print __METHOD__ . "\n";

        throw $t;
    }
}
