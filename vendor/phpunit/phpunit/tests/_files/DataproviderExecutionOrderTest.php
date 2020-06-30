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

class DataproviderExecutionOrderTest extends TestCase
{
<<<<<<< HEAD
    public function testFirstTestThatAlwaysWorks()
=======
    public function testFirstTestThatAlwaysWorks(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->assertTrue(true);
    }

    /**
     * @dataProvider dataproviderAdditions
     */
<<<<<<< HEAD
    public function testAddNumbersWithADataprovider(int $a, int $b, int $sum)
=======
    public function testAddNumbersWithADataprovider(int $a, int $b, int $sum): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->assertSame($sum, $a + $b);
    }

<<<<<<< HEAD
    public function testTestInTheMiddleThatAlwaysWorks()
=======
    public function testTestInTheMiddleThatAlwaysWorks(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->assertTrue(true);
    }

    /**
     * @dataProvider dataproviderAdditions
     */
<<<<<<< HEAD
    public function testAddMoreNumbersWithADataprovider(int $a, int $b, int $sum)
=======
    public function testAddMoreNumbersWithADataprovider(int $a, int $b, int $sum): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->assertSame($sum, $a + $b);
    }

    public function dataproviderAdditions()
    {
        return [
            '1+2=3' => [1, 2, 3],
            '2+1=3' => [2, 1, 3],
            '1+1=3' => [1, 1, 3],
        ];
    }
}
