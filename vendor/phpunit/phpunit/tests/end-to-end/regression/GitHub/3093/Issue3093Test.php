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
class Issue3093Test extends \PHPUnit\Framework\TestCase
{
    public function someDataProvider(): array
    {
        return [['some values']];
    }

    public function testFirstWithoutDependencies(): void
    {
        self::assertTrue(true);
    }

    /**
     * @depends testFirstWithoutDependencies
     * @dataProvider someDataProvider
     */
<<<<<<< HEAD
    public function testSecondThatDependsOnFirstAndDataprovider($value)
=======
    public function testSecondThatDependsOnFirstAndDataprovider($value): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        self::assertTrue(true);
    }
}
