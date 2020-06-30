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

use Symfony\Component\Mime\Exception\LogicException;
use Symfony\Component\Mime\Header\Headers;
use Symfony\Component\Mime\Part\AbstractPart;
use Symfony\Component\Mime\Part\TextPart;

/**
 * @author Fabien Potencier <fabien@symfony.com>
<<<<<<< HEAD
=======
 *
 * @experimental in 4.3
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
class Message extends RawMessage
{
    private $headers;
    private $body;

    public function __construct(Headers $headers = null, AbstractPart $body = null)
    {
        $this->headers = $headers ? clone $headers : new Headers();
        $this->body = $body;
    }

    public function __clone()
    {
<<<<<<< HEAD
        $this->headers = clone $this->headers;
=======
        if (null !== $this->headers) {
            $this->headers = clone $this->headers;
        }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        if (null !== $this->body) {
            $this->body = clone $this->body;
        }
    }

    /**
     * @return $this
     */
    public function setBody(AbstractPart $body = null)
    {
        $this->body = $body;

        return $this;
    }

    public function getBody(): ?AbstractPart
    {
        return $this->body;
    }

    /**
     * @return $this
     */
    public function setHeaders(Headers $headers)
    {
        $this->headers = $headers;

        return $this;
    }

    public function getHeaders(): Headers
    {
        return $this->headers;
    }

    public function getPreparedHeaders(): Headers
    {
        $headers = clone $this->headers;

        if (!$headers->has('From')) {
<<<<<<< HEAD
            if (!$headers->has('Sender')) {
                throw new LogicException('An email must have a "From" or a "Sender" header.');
            }
            $headers->addMailboxListHeader('From', [$headers->get('Sender')->getAddress()]);
=======
            throw new LogicException('An email must have a "From" header.');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        $headers->addTextHeader('MIME-Version', '1.0');

        if (!$headers->has('Date')) {
            $headers->addDateHeader('Date', new \DateTimeImmutable());
        }

        // determine the "real" sender
<<<<<<< HEAD
        if (!$headers->has('Sender') && \count($froms = $headers->get('From')->getAddresses()) > 1) {
            $headers->addMailboxHeader('Sender', $froms[0]);
        }

        if (!$headers->has('Message-ID')) {
            $headers->addIdHeader('Message-ID', $this->generateMessageId());
=======
        $senders = $headers->get('From')->getAddresses();
        $sender = $senders[0];
        if ($headers->has('Sender')) {
            $sender = $headers->get('Sender')->getAddress();
        } elseif (\count($senders) > 1) {
            $headers->addMailboxHeader('Sender', $sender);
        }

        if (!$headers->has('Message-ID')) {
            $headers->addIdHeader('Message-ID', $this->generateMessageId($sender->getAddress()));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        // remove the Bcc field which should NOT be part of the sent message
        $headers->remove('Bcc');

        return $headers;
    }

    public function toString(): string
    {
        if (null === $body = $this->getBody()) {
            $body = new TextPart('');
        }

        return $this->getPreparedHeaders()->toString().$body->toString();
    }

    public function toIterable(): iterable
    {
        if (null === $body = $this->getBody()) {
            $body = new TextPart('');
        }

        yield $this->getPreparedHeaders()->toString();
        yield from $body->toIterable();
    }

<<<<<<< HEAD
    public function ensureValidity()
    {
        if (!$this->headers->has('To')) {
            throw new LogicException('An email must have a "To" header.');
        }

        if (!$this->headers->has('From') && !$this->headers->has('Sender')) {
            throw new LogicException('An email must have a "From" or a "Sender" header.');
        }

        parent::ensureValidity();
    }

    public function generateMessageId(): string
    {
        if ($this->headers->has('Sender')) {
            $sender = $this->headers->get('Sender')->getAddress();
        } elseif ($this->headers->has('From')) {
            $sender = $this->headers->get('From')->getAddresses()[0];
        } else {
            throw new LogicException('An email must have a "From" or a "Sender" header.');
        }

        return bin2hex(random_bytes(16)).strstr($sender->getAddress(), '@');
=======
    private function generateMessageId(string $email): string
    {
        return bin2hex(random_bytes(16)).strstr($email, '@');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function __serialize(): array
    {
        return [$this->headers, $this->body];
    }

    public function __unserialize(array $data): void
    {
        [$this->headers, $this->body] = $data;
    }
}
