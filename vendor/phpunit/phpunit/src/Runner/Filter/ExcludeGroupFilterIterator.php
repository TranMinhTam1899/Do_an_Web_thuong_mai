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
namespace PHPUnit\Runner\Filter;

<<<<<<< HEAD
class ExcludeGroupFilterIterator extends GroupFilterIterator
=======
/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class ExcludeGroupFilterIterator extends GroupFilterIterator
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    protected function doAccept(string $hash): bool
    {
        return !\in_array($hash, $this->groupTests, true);
    }
}
