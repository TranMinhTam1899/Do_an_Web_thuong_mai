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
namespace PHPUnit\Util\PHP;

use PHPUnit\Framework\Exception;

/**
<<<<<<< HEAD
 * Windows utility for PHP sub-processes.
 *
 * Reading from STDOUT or STDERR hangs forever on Windows if the output is
 * too large.
 *
 * @see https://bugs.php.net/bug.php?id=51800
 */
class WindowsPhpProcess extends DefaultPhpProcess
=======
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 *
 * @see https://bugs.php.net/bug.php?id=51800
 */
final class WindowsPhpProcess extends DefaultPhpProcess
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    public function getCommand(array $settings, string $file = null): string
    {
        return '"' . parent::getCommand($settings, $file) . '"';
    }

<<<<<<< HEAD
=======
    /**
     * @throws Exception
     */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    protected function getHandles(): array
    {
        if (false === $stdout_handle = \tmpfile()) {
            throw new Exception(
                'A temporary file could not be created; verify that your TEMP environment variable is writable'
            );
        }

        return [
            1 => $stdout_handle,
        ];
    }

    protected function useTemporaryFile(): bool
    {
        return true;
    }
}
