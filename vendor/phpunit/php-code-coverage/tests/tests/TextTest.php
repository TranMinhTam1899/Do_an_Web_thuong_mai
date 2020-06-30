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
 * @covers SebastianBergmann\CodeCoverage\Report\Text
 */
class TextTest extends TestCase
{
<<<<<<< HEAD
    public function testTextForBankAccountTest()
=======
    public function testTextForBankAccountTest(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $text = new Text(50, 90, false, false);

        $this->assertStringMatchesFormatFile(
            TEST_FILES_PATH . 'BankAccount-text.txt',
<<<<<<< HEAD
            str_replace(PHP_EOL, "\n", $text->process($this->getCoverageForBankAccount()))
        );
    }

    public function testTextForFileWithIgnoredLines()
=======
            \str_replace(\PHP_EOL, "\n", $text->process($this->getCoverageForBankAccount()))
        );
    }

    public function testTextForFileWithIgnoredLines(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $text = new Text(50, 90, false, false);

        $this->assertStringMatchesFormatFile(
            TEST_FILES_PATH . 'ignored-lines-text.txt',
<<<<<<< HEAD
            str_replace(PHP_EOL, "\n", $text->process($this->getCoverageForFileWithIgnoredLines()))
        );
    }

    public function testTextForClassWithAnonymousFunction()
=======
            \str_replace(\PHP_EOL, "\n", $text->process($this->getCoverageForFileWithIgnoredLines()))
        );
    }

    public function testTextForClassWithAnonymousFunction(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $text = new Text(50, 90, false, false);

        $this->assertStringMatchesFormatFile(
            TEST_FILES_PATH . 'class-with-anonymous-function-text.txt',
<<<<<<< HEAD
            str_replace(PHP_EOL, "\n", $text->process($this->getCoverageForClassWithAnonymousFunction()))
=======
            \str_replace(\PHP_EOL, "\n", $text->process($this->getCoverageForClassWithAnonymousFunction()))
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );
    }
}
