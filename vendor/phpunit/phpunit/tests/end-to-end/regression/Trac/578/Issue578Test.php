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
use PHPUnit\Framework\TestCase;

class Issue578Test extends TestCase
{
    public function testNoticesDoublePrintStackTrace(): void
    {
<<<<<<< HEAD
        $this->iniSet('error_reporting', \E_ALL | \E_NOTICE);
=======
        $this->iniSet('error_reporting', (string) (\E_ALL | \E_NOTICE));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        \trigger_error('Stack Trace Test Notice', \E_NOTICE);
    }

    public function testWarningsDoublePrintStackTrace(): void
    {
<<<<<<< HEAD
        $this->iniSet('error_reporting', \E_ALL | \E_NOTICE);
=======
        $this->iniSet('error_reporting', (string) (\E_ALL | \E_NOTICE));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        \trigger_error('Stack Trace Test Notice', \E_WARNING);
    }

    public function testUnexpectedExceptionsPrintsCorrectly(): void
    {
        throw new Exception('Double printed exception');
    }
}
