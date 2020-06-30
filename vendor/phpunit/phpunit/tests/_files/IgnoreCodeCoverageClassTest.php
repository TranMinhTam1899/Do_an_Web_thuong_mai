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

class IgnoreCodeCoverageClassTest extends TestCase
{
    public function testReturnTrue(): void
    {
        $sut = new IgnoreCodeCoverageClass;
        $this->assertTrue($sut->returnTrue());
    }

    public function testReturnFalse(): void
    {
        $sut = new IgnoreCodeCoverageClass;
        $this->assertFalse($sut->returnFalse());
    }
}
