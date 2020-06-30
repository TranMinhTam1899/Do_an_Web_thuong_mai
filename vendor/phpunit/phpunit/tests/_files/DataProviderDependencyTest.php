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
class DataProviderDependencyTest extends PHPUnit\Framework\TestCase
{
    public function testReference(): void
    {
        $this->markTestSkipped('This test should be skipped.');
        $this->assertTrue(true);
    }

    /**
     * @see https://github.com/sebastianbergmann/phpunit/issues/1896
     * @depends testReference
     * @dataProvider provider
     */
    public function testDependency($param): void
    {
    }

    public function provider()
    {
        $this->markTestSkipped('Any test with this data provider should be skipped.');

        return [];
    }
}
