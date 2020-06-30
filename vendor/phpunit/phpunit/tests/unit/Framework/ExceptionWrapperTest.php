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
namespace PHPUnit\Framework;

<<<<<<< HEAD
class ExceptionWrapperTest extends TestCase
=======
/**
 * @small
 */
final class ExceptionWrapperTest extends TestCase
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @runInSeparateProcess
     */
    public function testGetOriginalException(): void
    {
        $e       = new \BadFunctionCallException('custom class exception');
        $wrapper = new ExceptionWrapper($e);

        $this->assertInstanceOf(\BadFunctionCallException::class, $wrapper->getOriginalException());
    }

    /**
     * @runInSeparateProcess
     */
    public function testGetOriginalExceptionWithPrevious(): void
    {
        $e       = new \BadFunctionCallException('custom class exception', 0, new \Exception('previous'));
        $wrapper = new ExceptionWrapper($e);

        $this->assertInstanceOf(\BadFunctionCallException::class, $wrapper->getOriginalException());
    }

    /**
     * @runInSeparateProcess
     */
    public function testNoOriginalExceptionInStacktrace(): void
    {
        $e       = new \BadFunctionCallException('custom class exception');
        $wrapper = new ExceptionWrapper($e);

        // Replace the only mention of "BadFunctionCallException" in wrapper
        $wrapper->setClassName('MyException');

<<<<<<< HEAD
        $data = \print_r($wrapper, 1);

        $this->assertNotContains(
=======
        $data = \print_r($wrapper, true);

        $this->assertStringNotContainsString(
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            'BadFunctionCallException',
            $data,
            'Assert there is s no other BadFunctionCallException mention in stacktrace'
        );
    }
}
