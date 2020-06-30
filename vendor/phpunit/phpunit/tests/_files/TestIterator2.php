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
class TestIterator2 implements Iterator
{
    protected $data;

    public function __construct(array $array)
    {
        $this->data = $array;
    }

    public function current()
    {
        return \current($this->data);
    }

    public function next(): void
    {
        \next($this->data);
    }

    public function key()
    {
        return \key($this->data);
    }

    public function valid()
    {
        return \key($this->data) !== null;
    }

    public function rewind(): void
    {
        \reset($this->data);
    }
}
