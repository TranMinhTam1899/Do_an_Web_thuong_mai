<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/*
 * This file is part of the php-code-coverage package.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
namespace SebastianBergmann\CodeCoverage\Report;

use SebastianBergmann\CodeCoverage\TestCase;

/**
 * @covers SebastianBergmann\CodeCoverage\Report\Clover
 */
class CloverTest extends TestCase
{
<<<<<<< HEAD
    public function testCloverForBankAccountTest()
=======
    public function testCloverForBankAccountTest(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $clover = new Clover;

        $this->assertStringMatchesFormatFile(
            TEST_FILES_PATH . 'BankAccount-clover.xml',
            $clover->process($this->getCoverageForBankAccount(), null, 'BankAccount')
        );
    }

<<<<<<< HEAD
    public function testCloverForFileWithIgnoredLines()
=======
    public function testCloverForFileWithIgnoredLines(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $clover = new Clover;

        $this->assertStringMatchesFormatFile(
            TEST_FILES_PATH . 'ignored-lines-clover.xml',
            $clover->process($this->getCoverageForFileWithIgnoredLines())
        );
    }

<<<<<<< HEAD
    public function testCloverForClassWithAnonymousFunction()
=======
    public function testCloverForClassWithAnonymousFunction(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $clover = new Clover;

        $this->assertStringMatchesFormatFile(
            TEST_FILES_PATH . 'class-with-anonymous-function-clover.xml',
            $clover->process($this->getCoverageForClassWithAnonymousFunction())
        );
    }
}
