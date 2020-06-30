<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class WrapperIteratorAggregate implements IteratorAggregate
{
    /**
     * @var array|\Traversable
     */
    private $baseCollection;

    public function __construct($baseCollection)
    {
        \assert(\is_array($baseCollection) || $baseCollection instanceof Traversable);
        $this->baseCollection = $baseCollection;
    }

    public function getIterator()
    {
        foreach ($this->baseCollection as $k => $v) {
            yield $k => $v;
        }
    }
}
