<?php

declare(strict_types=1);

/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Reflection\Types;

<<<<<<< HEAD
/**
 * Value Object representing iterable type
 */
final class Iterable_ extends AbstractList
=======
use phpDocumentor\Reflection\Type;

/**
 * Value Object representing iterable type
 */
final class Iterable_ implements Type
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * Returns a rendered output of the Type as it would be used in a DocBlock.
     */
    public function __toString() : string
    {
<<<<<<< HEAD
        if ($this->keyType) {
            return 'iterable<' . $this->keyType . ',' . $this->valueType . '>';
        }

        if ($this->valueType instanceof Mixed_) {
            return 'iterable';
        }

        return 'iterable<' . $this->valueType . '>';
=======
        return 'iterable';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
