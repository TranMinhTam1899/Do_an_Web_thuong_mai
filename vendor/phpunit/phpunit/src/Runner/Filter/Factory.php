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

use FilterIterator;
use InvalidArgumentException;
use Iterator;
use PHPUnit\Framework\TestSuite;
use ReflectionClass;

<<<<<<< HEAD
class Factory
=======
/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Factory
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @var array
     */
    private $filters = [];

    /**
     * @throws InvalidArgumentException
     */
    public function addFilter(ReflectionClass $filter, $args): void
    {
        if (!$filter->isSubclassOf(\RecursiveFilterIterator::class)) {
            throw new InvalidArgumentException(
                \sprintf(
                    'Class "%s" does not extend RecursiveFilterIterator',
                    $filter->name
                )
            );
        }

        $this->filters[] = [$filter, $args];
    }

    public function factory(Iterator $iterator, TestSuite $suite): FilterIterator
    {
        foreach ($this->filters as $filter) {
            [$class, $args] = $filter;
            $iterator       = $class->newInstance($iterator, $args, $suite);
        }

        return $iterator;
    }
}
