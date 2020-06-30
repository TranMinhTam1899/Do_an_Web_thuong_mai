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

class ThrowExceptionTestCase extends TestCase
{
    public function test(): void
    {
        throw new RuntimeException('A runtime error occurred');
    }
<<<<<<< HEAD
=======

    public function testWithExpectExceptionObject(): void
    {
        throw new RuntimeException(
            'Cannot compute at this time.',
            9000
        );
    }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
