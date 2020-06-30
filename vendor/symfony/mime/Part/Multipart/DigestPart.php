<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mime\Part\Multipart;

use Symfony\Component\Mime\Part\AbstractMultipartPart;
use Symfony\Component\Mime\Part\MessagePart;

/**
 * @author Fabien Potencier <fabien@symfony.com>
<<<<<<< HEAD
=======
 *
 * @experimental in 4.3
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
final class DigestPart extends AbstractMultipartPart
{
    public function __construct(MessagePart ...$parts)
    {
        parent::__construct(...$parts);
    }

    public function getMediaSubtype(): string
    {
        return 'digest';
    }
}
