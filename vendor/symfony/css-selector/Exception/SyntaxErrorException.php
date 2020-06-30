<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\CssSelector\Exception;

use Symfony\Component\CssSelector\Parser\Token;

/**
 * ParseException is thrown when a CSS selector syntax is not valid.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 */
class SyntaxErrorException extends ParseException
{
    /**
<<<<<<< HEAD
     * @return self
     */
    public static function unexpectedToken(string $expectedValue, Token $foundToken)
=======
     * @param string $expectedValue
     *
     * @return self
     */
    public static function unexpectedToken($expectedValue, Token $foundToken)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return new self(sprintf('Expected %s, but %s found.', $expectedValue, $foundToken));
    }

    /**
<<<<<<< HEAD
     * @return self
     */
    public static function pseudoElementFound(string $pseudoElement, string $unexpectedLocation)
=======
     * @param string $pseudoElement
     * @param string $unexpectedLocation
     *
     * @return self
     */
    public static function pseudoElementFound($pseudoElement, $unexpectedLocation)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return new self(sprintf('Unexpected pseudo-element "::%s" found %s.', $pseudoElement, $unexpectedLocation));
    }

    /**
<<<<<<< HEAD
     * @return self
     */
    public static function unclosedString(int $position)
=======
     * @param int $position
     *
     * @return self
     */
    public static function unclosedString($position)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return new self(sprintf('Unclosed/invalid string at %s.', $position));
    }

    /**
     * @return self
     */
    public static function nestedNot()
    {
        return new self('Got nested ::not().');
    }

    /**
     * @return self
     */
    public static function stringAsFunctionArgument()
    {
        return new self('String not allowed as function argument.');
    }
}
