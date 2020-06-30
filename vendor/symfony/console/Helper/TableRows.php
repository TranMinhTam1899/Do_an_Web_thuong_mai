<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Helper;

/**
 * @internal
 */
class TableRows implements \IteratorAggregate
{
    private $generator;

    public function __construct(callable $generator)
    {
        $this->generator = $generator;
    }

<<<<<<< HEAD
    public function getIterator(): \Traversable
=======
    public function getIterator()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $g = $this->generator;

        return $g();
    }
}
