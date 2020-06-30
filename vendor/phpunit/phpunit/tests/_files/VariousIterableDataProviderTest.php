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
<<<<<<< HEAD
class VariousIterableDataProviderTest
{
    public static function asArrayProvider()
=======
class VariousIterableDataProviderTest extends AbstractVariousIterableDataProviderTest
{
    public static function asArrayStaticProvider()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return [
            ['A'],
            ['B'],
            ['C'],
        ];
    }

<<<<<<< HEAD
    public static function asIteratorProvider()
=======
    public static function asIteratorStaticProvider()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        yield ['D'];

        yield ['E'];

        yield ['F'];
    }

<<<<<<< HEAD
    public static function asTraversableProvider()
=======
    public static function asTraversableStaticProvider()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return new WrapperIteratorAggregate([
            ['G'],
            ['H'],
            ['I'],
        ]);
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider asArrayStaticProvider
     * @dataProvider asIteratorStaticProvider
     * @dataProvider asTraversableStaticProvider
     */
    public function testStatic(): void
    {
    }

    public function asArrayProvider()
    {
        return [
            ['S'],
            ['T'],
            ['U'],
        ];
    }

    public function asIteratorProvider()
    {
        yield ['V'];

        yield ['W'];

        yield ['X'];
    }

    public function asTraversableProvider()
    {
        return new WrapperIteratorAggregate([
            ['Y'],
            ['Z'],
            ['P'],
        ]);
    }

    /**
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * @dataProvider asArrayProvider
     * @dataProvider asIteratorProvider
     * @dataProvider asTraversableProvider
     */
<<<<<<< HEAD
    public function test(): void
=======
    public function testNonStatic(): void
    {
    }

    /**
     * @dataProvider asArrayProviderInParent
     * @dataProvider asIteratorProviderInParent
     * @dataProvider asTraversableProviderInParent
     */
    public function testFromParent(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
    }
}
