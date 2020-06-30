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

class DependencyFailureTest extends TestCase
{
    public function testOne(): void
    {
        $this->fail();
    }

    /**
     * @depends testOne
     */
    public function testTwo(): void
    {
        $this->assertTrue(true);
    }

    /**
     * @depends !clone testTwo
     */
    public function testThree(): void
    {
        $this->assertTrue(true);
    }

    /**
     * @depends clone testOne
     */
    public function testFour(): void
    {
        $this->assertTrue(true);
    }

    /**
     * This test has been added to check the printed warnings for the user
     * when a dependency simply doesn't exist.
     *
     * @depends doesNotExist
     *
     * @see https://github.com/sebastianbergmann/phpunit/issues/3517
     */
    public function testHandlesDependsAnnotationForNonexistentTests(): void
    {
        $this->assertTrue(true);
    }
<<<<<<< HEAD
=======

    /**
     * @depends
     */
    public function testHandlesDependsAnnotationWithNoMethodSpecified(): void
    {
        $this->assertTrue(true);
    }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
