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

use PHPUnit\Framework\Exception;
use PHPUnit\Framework\TestCase;

<<<<<<< HEAD
class JsonTest extends TestCase
{
    /**
=======
/**
 * @small
 */
final class JsonTest extends TestCase
{
    /**
     * @testdox Canonicalize $actual
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * @dataProvider canonicalizeProvider
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testCanonicalize($actual, $expected, $expectError): void
    {
        [$error, $canonicalized] = Json::canonicalize($actual);
        $this->assertEquals($expectError, $error);

        if (!$expectError) {
            $this->assertEquals($expected, $canonicalized);
        }
    }

    public function canonicalizeProvider(): array
    {
        return [
            ['{"name":"John","age":"35"}', '{"age":"35","name":"John"}', false],
            ['{"name":"John","age":"35","kids":[{"name":"Petr","age":"5"}]}', '{"age":"35","kids":[{"age":"5","name":"Petr"}],"name":"John"}', false],
            ['"name":"John","age":"35"}', '{"age":"35","name":"John"}', true],
        ];
    }

    /**
<<<<<<< HEAD
=======
     * @testdox Prettify $actual to $expected
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * @dataProvider prettifyProvider
     *
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testPrettify($actual, $expected): void
    {
        $this->assertEquals($expected, Json::prettify($actual));
    }

    public function prettifyProvider(): array
    {
        return [
            ['{"name":"John","age": "5"}', "{\n    \"name\": \"John\",\n    \"age\": \"5\"\n}"],
            ['{"url":"https://www.example.com/"}', "{\n    \"url\": \"https://www.example.com/\"\n}"],
        ];
    }

    /**
     * @dataProvider prettifyExceptionProvider
     */
    public function testPrettifyException($json): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Cannot prettify invalid json');

        Json::prettify($json);
    }

    public function prettifyExceptionProvider(): array
    {
        return [
            ['"name":"John","age": "5"}'],
            [''],
        ];
    }
}
