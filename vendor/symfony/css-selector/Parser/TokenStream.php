<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\CssSelector\Parser;

use Symfony\Component\CssSelector\Exception\InternalErrorException;
use Symfony\Component\CssSelector\Exception\SyntaxErrorException;

/**
 * CSS selector token stream.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class TokenStream
{
    /**
     * @var Token[]
     */
    private $tokens = [];

    /**
     * @var Token[]
     */
    private $used = [];

    /**
     * @var int
     */
    private $cursor = 0;

    /**
     * @var Token|null
     */
    private $peeked;

    /**
     * @var bool
     */
    private $peeking = false;

    /**
     * Pushes a token.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function push(Token $token): self
=======
    public function push(Token $token)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->tokens[] = $token;

        return $this;
    }

    /**
     * Freezes stream.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function freeze(): self
=======
    public function freeze()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this;
    }

    /**
     * Returns next token.
     *
<<<<<<< HEAD
     * @throws InternalErrorException If there is no more token
     */
    public function getNext(): Token
=======
     * @return Token
     *
     * @throws InternalErrorException If there is no more token
     */
    public function getNext()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if ($this->peeking) {
            $this->peeking = false;
            $this->used[] = $this->peeked;

            return $this->peeked;
        }

        if (!isset($this->tokens[$this->cursor])) {
            throw new InternalErrorException('Unexpected token stream end.');
        }

        return $this->tokens[$this->cursor++];
    }

    /**
     * Returns peeked token.
<<<<<<< HEAD
     */
    public function getPeek(): Token
=======
     *
     * @return Token
     */
    public function getPeek()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!$this->peeking) {
            $this->peeked = $this->getNext();
            $this->peeking = true;
        }

        return $this->peeked;
    }

    /**
     * Returns used tokens.
     *
     * @return Token[]
     */
<<<<<<< HEAD
    public function getUsed(): array
=======
    public function getUsed()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->used;
    }

    /**
     * Returns nex identifier token.
     *
     * @return string The identifier token value
     *
     * @throws SyntaxErrorException If next token is not an identifier
     */
<<<<<<< HEAD
    public function getNextIdentifier(): string
=======
    public function getNextIdentifier()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $next = $this->getNext();

        if (!$next->isIdentifier()) {
            throw SyntaxErrorException::unexpectedToken('identifier', $next);
        }

        return $next->getValue();
    }

    /**
     * Returns nex identifier or star delimiter token.
     *
     * @return string|null The identifier token value or null if star found
     *
     * @throws SyntaxErrorException If next token is not an identifier or a star delimiter
     */
<<<<<<< HEAD
    public function getNextIdentifierOrStar(): ?string
=======
    public function getNextIdentifierOrStar()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $next = $this->getNext();

        if ($next->isIdentifier()) {
            return $next->getValue();
        }

        if ($next->isDelimiter(['*'])) {
            return null;
        }

        throw SyntaxErrorException::unexpectedToken('identifier or "*"', $next);
    }

    /**
     * Skips next whitespace if any.
     */
    public function skipWhitespace()
    {
        $peek = $this->getPeek();

        if ($peek->isWhitespace()) {
            $this->getNext();
        }
    }
}
