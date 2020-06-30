<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mime;

<<<<<<< HEAD
use Symfony\Component\Mime\Exception\LogicException;

/**
 * @author Fabien Potencier <fabien@symfony.com>
=======
/**
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @experimental in 4.3
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
class RawMessage implements \Serializable
{
    private $message;

    /**
     * @param iterable|string $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    public function toString(): string
    {
        if (\is_string($this->message)) {
            return $this->message;
        }

        return $this->message = implode('', iterator_to_array($this->message, false));
    }

    public function toIterable(): iterable
    {
        if (\is_string($this->message)) {
            yield $this->message;

            return;
        }

        $message = '';
        foreach ($this->message as $chunk) {
            $message .= $chunk;
            yield $chunk;
        }
        $this->message = $message;
    }

    /**
<<<<<<< HEAD
     * @throws LogicException if the message is not valid
     */
    public function ensureValidity()
    {
    }

    /**
     * @internal
     */
    final public function serialize(): string
=======
     * @internal
     */
    final public function serialize()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return serialize($this->__serialize());
    }

    /**
     * @internal
     */
    final public function unserialize($serialized)
    {
        $this->__unserialize(unserialize($serialized));
    }

    public function __serialize(): array
    {
        return [$this->message];
    }

    public function __unserialize(array $data): void
    {
        [$this->message] = $data;
    }
}
