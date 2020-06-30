<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\CacheClearer;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class Psr6CacheClearer implements CacheClearerInterface
{
    private $pools = [];

    public function __construct(array $pools = [])
    {
        $this->pools = $pools;
    }

    public function hasPool($name)
    {
        return isset($this->pools[$name]);
    }

    public function getPool($name)
    {
        if (!$this->hasPool($name)) {
<<<<<<< HEAD
            throw new \InvalidArgumentException(sprintf('Cache pool not found: "%s".', $name));
=======
            throw new \InvalidArgumentException(sprintf('Cache pool not found: %s.', $name));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return $this->pools[$name];
    }

    public function clearPool($name)
    {
        if (!isset($this->pools[$name])) {
<<<<<<< HEAD
            throw new \InvalidArgumentException(sprintf('Cache pool not found: "%s".', $name));
=======
            throw new \InvalidArgumentException(sprintf('Cache pool not found: %s.', $name));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return $this->pools[$name]->clear();
    }

    /**
     * {@inheritdoc}
     */
    public function clear($cacheDir)
    {
        foreach ($this->pools as $pool) {
            $pool->clear();
        }
    }
}
