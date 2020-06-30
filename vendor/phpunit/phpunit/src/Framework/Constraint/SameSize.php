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
namespace PHPUnit\Framework\Constraint;

<<<<<<< HEAD
class SameSize extends Count
=======
final class SameSize extends Count
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    public function __construct(iterable $expected)
    {
        parent::__construct($this->getCountOf($expected));
    }
}
