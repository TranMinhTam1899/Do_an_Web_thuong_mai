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
namespace PHPUnit\Framework\Constraint;

use PHPUnit\Framework\TestCase;

<<<<<<< HEAD
class JsonMatchesErrorMessageProviderTest extends TestCase
=======
/**
 * @small
 */
final class JsonMatchesErrorMessageProviderTest extends TestCase
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    public static function determineJsonErrorDataprovider(): array
    {
        return [
            'JSON_ERROR_NONE'  => [
                null, 'json_error_none', '',
            ],
            'JSON_ERROR_DEPTH' => [
                'Maximum stack depth exceeded', \JSON_ERROR_DEPTH, '',
            ],
            'prefixed JSON_ERROR_DEPTH' => [
                'TUX: Maximum stack depth exceeded', \JSON_ERROR_DEPTH, 'TUX: ',
            ],
            'JSON_ERROR_STATE_MISMatch' => [
                'Underflow or the modes mismatch', \JSON_ERROR_STATE_MISMATCH, '',
            ],
            'JSON_ERROR_CTRL_CHAR' => [
                'Unexpected control character found', \JSON_ERROR_CTRL_CHAR, '',
            ],
            'JSON_ERROR_SYNTAX' => [
                'Syntax error, malformed JSON', \JSON_ERROR_SYNTAX, '',
            ],
            'JSON_ERROR_UTF8`' => [
                'Malformed UTF-8 characters, possibly incorrectly encoded',
                \JSON_ERROR_UTF8,
                '',
            ],
            'Invalid error indicator' => [
                'Unknown error', 55, '',
            ],
        ];
    }

    public static function translateTypeToPrefixDataprovider(): array
    {
        return [
            'expected' => ['Expected value JSON decode error - ', 'expected'],
            'actual'   => ['Actual value JSON decode error - ', 'actual'],
            'default'  => ['', ''],
        ];
    }

    /**
     * @dataProvider translateTypeToPrefixDataprovider
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testTranslateTypeToPrefix($expected, $type): void
    {
        $this->assertEquals(
            $expected,
            JsonMatchesErrorMessageProvider::translateTypeToPrefix($type)
        );
    }

    /**
<<<<<<< HEAD
=======
     * @testdox Determine JSON error $_dataName
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * @dataProvider determineJsonErrorDataprovider
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testDetermineJsonError($expected, $error, $prefix): void
    {
        $this->assertEquals(
            $expected,
            JsonMatchesErrorMessageProvider::determineJsonError(
<<<<<<< HEAD
                $error,
=======
                (string) $error,
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                $prefix
            )
        );
    }
}
