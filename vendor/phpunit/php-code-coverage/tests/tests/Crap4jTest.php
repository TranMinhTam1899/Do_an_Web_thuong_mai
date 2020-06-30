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
 * @covers SebastianBergmann\CodeCoverage\Report\Crap4j
 */
class Crap4jTest extends TestCase
{
<<<<<<< HEAD
    public function testForBankAccountTest()
=======
    public function testForBankAccountTest(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $crap4j = new Crap4j;

        $this->assertStringMatchesFormatFile(
            TEST_FILES_PATH . 'BankAccount-crap4j.xml',
            $crap4j->process($this->getCoverageForBankAccount(), null, 'BankAccount')
        );
    }

<<<<<<< HEAD
    public function testForFileWithIgnoredLines()
=======
    public function testForFileWithIgnoredLines(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $crap4j = new Crap4j;

        $this->assertStringMatchesFormatFile(
            TEST_FILES_PATH . 'ignored-lines-crap4j.xml',
            $crap4j->process($this->getCoverageForFileWithIgnoredLines(), null, 'CoverageForFileWithIgnoredLines')
        );
    }

<<<<<<< HEAD
    public function testForClassWithAnonymousFunction()
=======
    public function testForClassWithAnonymousFunction(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $crap4j = new Crap4j;

        $this->assertStringMatchesFormatFile(
            TEST_FILES_PATH . 'class-with-anonymous-function-crap4j.xml',
            $crap4j->process($this->getCoverageForClassWithAnonymousFunction(), null, 'CoverageForClassWithAnonymousFunction')
        );
    }
}
