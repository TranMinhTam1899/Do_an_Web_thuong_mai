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
namespace PHPUnit\Util;

use PHPUnit\Framework\TestCase;

<<<<<<< HEAD
class RegularExpressionTest extends TestCase
=======
/**
 * @small
 */
final class RegularExpressionTest extends TestCase
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    public function validRegexpProvider(): array
    {
        return [
            ['#valid regexp#', 'valid regexp', 1],
            [';val.*xp;', 'valid regexp', 1],
            ['/val.*xp/i', 'VALID REGEXP', 1],
            ['/a val.*p/', 'valid regexp', 0],
        ];
    }

    public function invalidRegexpProvider(): array
    {
        return [
            ['valid regexp', 'valid regexp'],
            [';val.*xp', 'valid regexp'],
            ['val.*xp/i', 'VALID REGEXP'],
        ];
    }

    /**
<<<<<<< HEAD
=======
     * @testdox Valid regex $pattern on $subject returns $return
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * @dataProvider validRegexpProvider
     *
     * @throws \Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testValidRegex($pattern, $subject, $return): void
    {
        $this->assertEquals($return, RegularExpression::safeMatch($pattern, $subject));
    }

    /**
<<<<<<< HEAD
=======
     * @testdox Invalid regex $pattern on $subject
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * @dataProvider invalidRegexpProvider
     *
     * @throws \Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testInvalidRegex($pattern, $subject): void
    {
        $this->assertFalse(RegularExpression::safeMatch($pattern, $subject));
    }
}
