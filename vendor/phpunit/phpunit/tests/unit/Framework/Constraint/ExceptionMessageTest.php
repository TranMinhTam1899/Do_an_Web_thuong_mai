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
namespace PHPUnit\Framework\Constraint;

use PHPUnit\Framework\TestCase;

<<<<<<< HEAD
class ExceptionMessageTest extends TestCase
=======
/**
 * @small
 */
final class ExceptionMessageTest extends TestCase
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    public function testLiteralMessage(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('A literal exception message');

        throw new \Exception('A literal exception message');
    }

    public function testPartialMessageBegin(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('A partial');

        throw new \Exception('A partial exception message');
    }

    public function testPartialMessageMiddle(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('partial exception');

        throw new \Exception('A partial exception message');
    }

    public function testPartialMessageEnd(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('exception message');

        throw new \Exception('A partial exception message');
    }
<<<<<<< HEAD
=======

    public function testEmptyMessageExportToString(): void
    {
        $exceptionMessage = new ExceptionMessage('');

        $this->assertSame('exception message is empty', $exceptionMessage->toString());
    }

    public function testMessageExportToString(): void
    {
        $exceptionMessage = new ExceptionMessage('test');

        $this->assertSame('exception message contains ', $exceptionMessage->toString());
    }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
