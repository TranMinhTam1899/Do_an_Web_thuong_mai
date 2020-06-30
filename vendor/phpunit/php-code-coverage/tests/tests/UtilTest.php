<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/*
 * This file is part of the php-code-coverage package.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
namespace SebastianBergmann\CodeCoverage;

use PHPUnit\Framework\TestCase;

/**
 * @covers SebastianBergmann\CodeCoverage\Util
 */
class UtilTest extends TestCase
{
<<<<<<< HEAD
    public function testPercent()
=======
    public function testPercent(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->assertEquals(100, Util::percent(100, 0));
        $this->assertEquals(100, Util::percent(100, 100));
        $this->assertEquals(
            '100.00%',
            Util::percent(100, 100, true)
        );
    }
}
