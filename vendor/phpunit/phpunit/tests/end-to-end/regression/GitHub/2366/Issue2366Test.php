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

class Issue2366
{
    public function foo(): bool
    {
        return false;
    }
}

class Issue2366Test extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testOne($o): void
    {
<<<<<<< HEAD
        $this->assertEquals(1, $o->foo());
=======
        $this->assertEquals(true, $o->foo());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function provider()
    {
        $o = $this->createMock(Issue2366::class);

<<<<<<< HEAD
        $o->method('foo')->willReturn(1);
=======
        $o->method('foo')->willReturn(true);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return [
            [$o],
            [$o],
        ];
    }
}
