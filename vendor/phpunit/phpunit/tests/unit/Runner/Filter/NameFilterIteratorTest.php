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

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestSuite;

<<<<<<< HEAD
class NameFilterIteratorTest extends TestCase
=======
/**
 * @small
 */
final class NameFilterIteratorTest extends TestCase
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    public function testCaseSensitiveMatch(): void
    {
        $this->assertTrue($this->createFilter('BankAccountTest')->accept());
    }

    public function testCaseInsensitiveMatch(): void
    {
        $this->assertTrue($this->createFilter('bankaccounttest')->accept());
    }

    private function createFilter(string $filter): NameFilterIterator
    {
        $suite = new TestSuite;
        $suite->addTest(new \BankAccountTest('testBalanceIsInitiallyZero'));

        $iterator = new NameFilterIterator($suite->getIterator(), $filter);

        $iterator->rewind();

        return $iterator;
    }
}
