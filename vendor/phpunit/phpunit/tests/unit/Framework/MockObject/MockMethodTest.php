<<<<<<< HEAD
<?php
declare(strict_types=1);
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
namespace PHPUnit\Framework\MockObject;

use PHPUnit\Framework\TestCase;
<<<<<<< HEAD

class MockMethodTest extends TestCase
{
    public function testGetNameReturnsMethodName()
=======
use PHPUnit\TestFixture\MockObject\ClassWithoutParentButParentReturnType;
use SebastianBergmann\Type\UnknownType;

/**
 * @small
 */
final class MockMethodTest extends TestCase
{
    public function testGetNameReturnsMethodName(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $method = new MockMethod(
            'ClassName',
            'methodName',
            false,
            '',
            '',
            '',
<<<<<<< HEAD
            '',
=======
            new UnknownType,
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            '',
            false,
            false,
            null,
            false
        );
        $this->assertEquals('methodName', $method->getName());
    }

<<<<<<< HEAD
    public function testFailWhenReturnTypeIsParentButThereIsNoParentClass()
    {
        $method = new MockMethod(
            \stdClass::class,
            'methodName',
            false,
            '',
            '',
            '',
            'parent',
            '',
            false,
            false,
            null,
            false
        );
        $this->expectException(\RuntimeException::class);
        $method->generateCode();
=======
    /**
     * @requires PHP < 7.4
     */
    public function testFailWhenReturnTypeIsParentButThereIsNoParentClass(): void
    {
        $class = new \ReflectionClass(ClassWithoutParentButParentReturnType::class);

        $this->expectException(\RuntimeException::class);
        MockMethod::fromReflection($class->getMethod('foo'), false, false);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
