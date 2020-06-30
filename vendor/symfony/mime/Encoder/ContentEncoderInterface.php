<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mime\Encoder;

/**
 * @author Chris Corbyn
<<<<<<< HEAD
=======
 *
 * @experimental in 4.3
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
interface ContentEncoderInterface extends EncoderInterface
{
    /**
     * Encodes the stream to a Generator.
     *
     * @param resource $stream
     */
    public function encodeByteStream($stream, int $maxLineLength = 0): iterable;

    /**
     * Gets the MIME name of this content encoding scheme.
     */
    public function getName(): string;
}
