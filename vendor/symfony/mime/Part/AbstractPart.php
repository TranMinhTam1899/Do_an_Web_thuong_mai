<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mime\Part;

use Symfony\Component\Mime\Header\Headers;

/**
 * @author Fabien Potencier <fabien@symfony.com>
<<<<<<< HEAD
=======
 *
 * @experimental in 4.3
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
abstract class AbstractPart
{
    private $headers;

    public function __construct()
    {
        $this->headers = new Headers();
    }

    public function getHeaders(): Headers
    {
        return $this->headers;
    }

    public function getPreparedHeaders(): Headers
    {
        $headers = clone $this->headers;
        $headers->setHeaderBody('Parameterized', 'Content-Type', $this->getMediaType().'/'.$this->getMediaSubtype());

        return $headers;
    }

    public function toString(): string
    {
        return $this->getPreparedHeaders()->toString()."\r\n".$this->bodyToString();
    }

    public function toIterable(): iterable
    {
        yield $this->getPreparedHeaders()->toString();
        yield "\r\n";
        yield from $this->bodyToIterable();
    }

<<<<<<< HEAD
    public function asDebugString(): string
    {
        return $this->getMediaType().'/'.$this->getMediaSubtype();
    }

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    abstract public function bodyToString(): string;

    abstract public function bodyToIterable(): iterable;

    abstract public function getMediaType(): string;

    abstract public function getMediaSubtype(): string;
}
