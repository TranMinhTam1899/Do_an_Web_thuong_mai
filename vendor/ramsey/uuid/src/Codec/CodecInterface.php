<?php
/**
 * This file is part of the ramsey/uuid library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license http://opensource.org/licenses/MIT MIT
 * @link https://benramsey.com/projects/ramsey-uuid/ Documentation
 * @link https://packagist.org/packages/ramsey/uuid Packagist
 * @link https://github.com/ramsey/uuid GitHub
 */

namespace Ramsey\Uuid\Codec;

<<<<<<< HEAD
use InvalidArgumentException;
use Ramsey\Uuid\Exception\InvalidUuidStringException;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use Ramsey\Uuid\UuidInterface;

/**
 * CodecInterface represents a UUID coder-decoder
 */
interface CodecInterface
{
    /**
     * Encodes a UuidInterface as a string representation of a UUID
     *
     * @param UuidInterface $uuid
     * @return string Hexadecimal string representation of a UUID
     */
    public function encode(UuidInterface $uuid);

    /**
     * Encodes a UuidInterface as a binary representation of a UUID
     *
     * @param UuidInterface $uuid
     * @return string Binary string representation of a UUID
     */
    public function encodeBinary(UuidInterface $uuid);

    /**
     * Decodes a string representation of a UUID into a UuidInterface object instance
     *
     * @param string $encodedUuid
     * @return UuidInterface
<<<<<<< HEAD
     * @throws InvalidUuidStringException
=======
     * @throws \Ramsey\Uuid\Exception\InvalidUuidStringException
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function decode($encodedUuid);

    /**
     * Decodes a binary representation of a UUID into a UuidInterface object instance
     *
     * @param string $bytes
     * @return UuidInterface
<<<<<<< HEAD
     * @throws InvalidUuidStringException
     * @throws InvalidArgumentException if string has not 16 characters
=======
     * @throws \Ramsey\Uuid\Exception\InvalidUuidStringException
     * @throws \InvalidArgumentException if string has not 16 characters
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function decodeBytes($bytes);
}
