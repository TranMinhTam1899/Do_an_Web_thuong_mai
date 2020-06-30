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

/**
<<<<<<< HEAD
 * Prints TestDox documentation in text format to files.
 * For the CLI testdox printer please refer to \PHPUnit\TextUI\TextDoxPrinter.
 */
class TextResultPrinter extends ResultPrinter
=======
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class TextResultPrinter extends ResultPrinter
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * Handler for 'start class' event.
     */
    protected function startClass(string $name): void
    {
        $this->write($this->currentTestClassPrettified . "\n");
    }

    /**
     * Handler for 'on test' event.
     */
    protected function onTest($name, bool $success = true): void
    {
        if ($success) {
            $this->write(' [x] ');
        } else {
            $this->write(' [ ] ');
        }

        $this->write($name . "\n");
    }

    /**
     * Handler for 'end class' event.
     */
    protected function endClass(string $name): void
    {
        $this->write("\n");
    }
}
