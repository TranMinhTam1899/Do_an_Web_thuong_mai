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
namespace PHPUnit\Util\TestDox;

class TestableCliTestDoxPrinter extends CliTestDoxPrinter
{
    private $buffer;

    public function write(string $text): void
    {
        $this->buffer .= $text;
    }

    public function getBuffer(): string
    {
        return $this->buffer;
    }
}
