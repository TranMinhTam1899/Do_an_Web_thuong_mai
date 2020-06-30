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
class ExceptionMessageRegExpTest extends TestCase
=======
/**
 * @small
 */
final class ExceptionMessageRegExpTest extends TestCase
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    public function testRegexMessage(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessageRegExp('/^A polymorphic \w+ message/');

        throw new \Exception('A polymorphic exception message');
    }

    public function testRegexMessageExtreme(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessageRegExp('/^a poly[a-z]+ [a-zA-Z0-9_]+ me(s){2}age$/i');

        throw new \Exception('A polymorphic exception message');
    }

    /**
     * @runInSeparateProcess
     * @requires extension xdebug
     */
    public function testMessageXdebugScreamCompatibility(): void
    {
        \ini_set('xdebug.scream', '1');

        $this->expectException(\Exception::class);
        $this->expectExceptionMessageRegExp('#Screaming preg_match#');

        throw new \Exception('Screaming preg_match');
    }

<<<<<<< HEAD
    public function testSimultaneousLiteralAndRegExpExceptionMessage(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessageRegExp('/^A variadic \w+ message/');

        throw new \Exception('A variadic exception message');
=======
    public function testRegExMessageCanBeExportedAsString(): void
    {
        $exceptionMessageReExp = new ExceptionMessageRegularExpression('/^a poly[a-z]+ [a-zA-Z0-9_]+ me(s){2}age$/i');

        $this->assertSame('exception message matches ', $exceptionMessageReExp->toString());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
