<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mime\Header;

use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Exception\RfcComplianceException;
<<<<<<< HEAD
=======
use Symfony\Component\Mime\NamedAddress;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * A Mailbox list MIME Header for something like From, To, Cc, and Bcc (one or more named addresses).
 *
 * @author Chris Corbyn
<<<<<<< HEAD
=======
 *
 * @experimental in 4.3
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
final class MailboxListHeader extends AbstractHeader
{
    private $addresses = [];

    /**
<<<<<<< HEAD
     * @param Address[] $addresses
=======
     * @param (NamedAddress|Address)[] $addresses
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function __construct(string $name, array $addresses)
    {
        parent::__construct($name);

        $this->setAddresses($addresses);
    }

    /**
<<<<<<< HEAD
     * @param Address[] $body
=======
     * @param (NamedAddress|Address)[] $body
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     *
     * @throws RfcComplianceException
     */
    public function setBody($body)
    {
        $this->setAddresses($body);
    }

    /**
     * @throws RfcComplianceException
     *
<<<<<<< HEAD
     * @return Address[]
     */
    public function getBody(): array
=======
     * @return (NamedAddress|Address)[]
     */
    public function getBody()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->getAddresses();
    }

    /**
     * Sets a list of addresses to be shown in this Header.
     *
<<<<<<< HEAD
     * @param Address[] $addresses
=======
     * @param (NamedAddress|Address)[] $addresses
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     *
     * @throws RfcComplianceException
     */
    public function setAddresses(array $addresses)
    {
        $this->addresses = [];
        $this->addAddresses($addresses);
    }

    /**
     * Sets a list of addresses to be shown in this Header.
     *
<<<<<<< HEAD
     * @param Address[] $addresses
=======
     * @param (NamedAddress|Address)[] $addresses
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     *
     * @throws RfcComplianceException
     */
    public function addAddresses(array $addresses)
    {
        foreach ($addresses as $address) {
            $this->addAddress($address);
        }
    }

    /**
     * @throws RfcComplianceException
     */
    public function addAddress(Address $address)
    {
        $this->addresses[] = $address;
    }

    /**
<<<<<<< HEAD
     * @return Address[]
=======
     * @return (NamedAddress|Address)[]
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function getAddresses(): array
    {
        return $this->addresses;
    }

    /**
     * Gets the full mailbox list of this Header as an array of valid RFC 2822 strings.
     *
     * @throws RfcComplianceException
     *
     * @return string[]
     */
    public function getAddressStrings(): array
    {
        $strings = [];
        foreach ($this->addresses as $address) {
            $str = $address->getEncodedAddress();
<<<<<<< HEAD
            if ($name = $address->getName()) {
                $str = $this->createPhrase($this, $name, $this->getCharset(), !$strings).' <'.$str.'>';
=======
            if ($address instanceof NamedAddress && $name = $address->getName()) {
                $str = $this->createPhrase($this, $name, $this->getCharset(), empty($strings)).' <'.$str.'>';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            }
            $strings[] = $str;
        }

        return $strings;
    }

    public function getBodyAsString(): string
    {
        return implode(', ', $this->getAddressStrings());
    }

    /**
     * Redefine the encoding requirements for addresses.
     *
     * All "specials" must be encoded as the full header value will not be quoted
     *
     * @see RFC 2822 3.2.1
     */
    protected function tokenNeedsEncoding(string $token): bool
    {
        return preg_match('/[()<>\[\]:;@\,."]/', $token) || parent::tokenNeedsEncoding($token);
    }
}
