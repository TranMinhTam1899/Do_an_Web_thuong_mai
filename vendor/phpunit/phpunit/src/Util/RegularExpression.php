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

<<<<<<< HEAD
final class RegularExpression
{
    /**
     * @throws \Exception
     *
=======
/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class RegularExpression
{
    /**
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * @return false|int
     */
    public static function safeMatch(string $pattern, string $subject, ?array $matches = null, int $flags = 0, int $offset = 0)
    {
<<<<<<< HEAD
        $handler_terminator = ErrorHandler::handleErrorOnce();
        $match              = \preg_match($pattern, $subject, $matches, $flags, $offset);
        $handler_terminator();

        return $match;
=======
        return ErrorHandler::invokeIgnoringWarnings(
            static function () use ($pattern, $subject, $matches, $flags, $offset) {
                return \preg_match($pattern, $subject, $matches, $flags, $offset);
            }
        );
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
