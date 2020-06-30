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

use PHPUnit\Framework\MockObject\MockBuilder;
use PHPUnit\Framework\TestCase;

<<<<<<< HEAD
class MockBuilderTest extends TestCase
=======
/**
 * @small
 */
final class MockBuilderTest extends TestCase
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    public function testMockBuilderRequiresClassName(): void
    {
        $mock = $this->getMockBuilder(Mockable::class)->getMock();

        $this->assertInstanceOf(Mockable::class, $mock);
    }

    public function testByDefaultMocksAllMethods(): void
    {
        $mock = $this->getMockBuilder(Mockable::class)->getMock();

        $this->assertNull($mock->mockableMethod());
        $this->assertNull($mock->anotherMockableMethod());
    }

    public function testMethodsToMockCanBeSpecified(): void
    {
        $mock = $this->getMockBuilder(Mockable::class)
                     ->setMethods(['mockableMethod'])
                     ->getMock();

        $this->assertNull($mock->mockableMethod());
        $this->assertTrue($mock->anotherMockableMethod());
    }

    public function testMethodExceptionsToMockCanBeSpecified(): void
    {
        $mock = $this->getMockBuilder(Mockable::class)
<<<<<<< HEAD
            ->setMethodsExcept(['mockableMethod'])
            ->getMock();
=======
                     ->setMethodsExcept(['mockableMethod'])
                     ->getMock();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        $this->assertTrue($mock->mockableMethod());
        $this->assertNull($mock->anotherMockableMethod());
    }

<<<<<<< HEAD
    public function testEmptyMethodExceptionsToMockCanBeSpecified(): void
    {
        $mock = $this->getMockBuilder(Mockable::class)
            ->setMethodsExcept()
            ->getMock();
=======
    public function testSetMethodsAllowsNonExistentMethodNames(): void
    {
        $mock = $this->getMockBuilder(Mockable::class)
                     ->setMethods(['mockableMethodWithCrazyName'])
                     ->getMock();

        $this->assertNull($mock->mockableMethodWithCrazyName());
    }

    public function testOnlyMethodsWithNonExistentMethodNames(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Trying to set mock method "mockableMethodWithCrazyName" with onlyMethods, but it does not exist in class "Mockable". Use addMethods() for methods that don\'t exist in the class.');

        $this->getMockBuilder(Mockable::class)
             ->onlyMethods(['mockableMethodWithCrazyName'])
             ->getMock();
    }

    public function testOnlyMethodsWithExistingMethodNames(): void
    {
        $mock = $this->getMockBuilder(Mockable::class)
                     ->onlyMethods(['mockableMethod'])
                     ->getMock();

        $this->assertNull($mock->mockableMethod());
        $this->assertTrue($mock->anotherMockableMethod());
    }

    public function testOnlyMethodsWithEmptyArray(): void
    {
        $mock = $this->getMockBuilder(Mockable::class)
                     ->onlyMethods([])
                     ->getMock();

        $this->assertTrue($mock->mockableMethod());
    }

    public function testAddMethodsWithNonExistentMethodNames(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Trying to set mock method "mockableMethod" with addMethods(), but it exists in class "Mockable". Use onlyMethods() for methods that exist in the class.');

        $this->getMockBuilder(Mockable::class)
             ->addMethods(['mockableMethod'])
             ->getMock();
    }

    public function testAddMethodsWithExistingMethodNames(): void
    {
        $mock = $this->getMockBuilder(Mockable::class)
                     ->addMethods(['mockableMethodWithFakeMethod'])
                     ->getMock();

        $this->assertNull($mock->mockableMethodWithFakeMethod());
        $this->assertTrue($mock->anotherMockableMethod());
    }

    public function testAddMethodsWithEmptyArray(): void
    {
        $mock = $this->getMockBuilder(Mockable::class)
                     ->addMethods([])
                     ->getMock();

        $this->assertTrue($mock->mockableMethod());
    }

    public function testEmptyMethodExceptionsToMockCanBeSpecified(): void
    {
        $mock = $this->getMockBuilder(Mockable::class)
                     ->setMethodsExcept()
                     ->getMock();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        $this->assertNull($mock->mockableMethod());
        $this->assertNull($mock->anotherMockableMethod());
    }

<<<<<<< HEAD
=======
    public function testNotAbleToUseAddMethodsAfterOnlyMethods(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Cannot use addMethods() on "Mockable" mock because mocked methods were already configured.');

        $this->getMockBuilder(Mockable::class)
             ->onlyMethods(['mockableMethod'])
             ->addMethods(['mockableMethodWithFakeMethod'])
             ->getMock();
    }

    public function testNotAbleToUseOnlyMethodsAfterAddMethods(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Cannot use onlyMethods() on "Mockable" mock because mocked methods were already configured.');

        $this->getMockBuilder(Mockable::class)
             ->addMethods(['mockableMethodWithFakeMethod'])
             ->onlyMethods(['mockableMethod'])
             ->getMock();
    }

    public function testAbleToUseSetMethodsAfterOnlyMethods(): void
    {
        $mock = $this->getMockBuilder(Mockable::class)
                     ->onlyMethods(['mockableMethod'])
                     ->setMethods(['mockableMethodWithCrazyName'])
                     ->getMock();

        $this->assertNull($mock->mockableMethodWithCrazyName());
    }

    public function testAbleToUseSetMethodsAfterAddMethods(): void
    {
        $mock = $this->getMockBuilder(Mockable::class)
                     ->addMethods(['notAMethod'])
                     ->setMethods(['mockableMethodWithCrazyName'])
                     ->getMock();

        $this->assertNull($mock->mockableMethodWithCrazyName());
    }

    public function testNotAbleToUseAddMethodsAfterSetMethods(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Cannot use addMethods() on "Mockable" mock because mocked methods were already configured.');

        $this->getMockBuilder(Mockable::class)
              ->setMethods(['mockableMethod'])
              ->addMethods(['mockableMethodWithFakeMethod'])
              ->getMock();
    }

    public function testNotAbleToUseOnlyMethodsAfterSetMethods(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Cannot use onlyMethods() on "Mockable" mock because mocked methods were already configured.');

        $this->getMockBuilder(Mockable::class)
             ->setMethods(['mockableMethodWithFakeMethod'])
             ->onlyMethods(['mockableMethod'])
             ->getMock();
    }

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function testByDefaultDoesNotPassArgumentsToTheConstructor(): void
    {
        $mock = $this->getMockBuilder(Mockable::class)->getMock();

        $this->assertEquals([null, null], $mock->constructorArgs);
    }

    public function testMockClassNameCanBeSpecified(): void
    {
        $mock = $this->getMockBuilder(Mockable::class)
                     ->setMockClassName('ACustomClassName')
                     ->getMock();

        $this->assertInstanceOf(ACustomClassName::class, $mock);
    }

    public function testConstructorArgumentsCanBeSpecified(): void
    {
        $mock = $this->getMockBuilder(Mockable::class)
                     ->setConstructorArgs([23, 42])
                     ->getMock();

        $this->assertEquals([23, 42], $mock->constructorArgs);
    }

    public function testOriginalConstructorCanBeDisabled(): void
    {
        $mock = $this->getMockBuilder(Mockable::class)
                     ->disableOriginalConstructor()
                     ->getMock();

        $this->assertNull($mock->constructorArgs);
    }

    public function testByDefaultOriginalCloneIsPreserved(): void
    {
        $mock = $this->getMockBuilder(Mockable::class)
                     ->getMock();

        $cloned = clone $mock;

        $this->assertTrue($cloned->cloned);
    }

    public function testOriginalCloneCanBeDisabled(): void
    {
        $mock = $this->getMockBuilder(Mockable::class)
                     ->disableOriginalClone()
                     ->getMock();

        $mock->cloned = false;
        $cloned       = clone $mock;

        $this->assertFalse($cloned->cloned);
    }

    public function testProvidesAFluentInterface(): void
    {
        $spec = $this->getMockBuilder(Mockable::class)
                     ->setMethods(['mockableMethod'])
                     ->setConstructorArgs([])
                     ->setMockClassName('DummyClassName')
                     ->disableOriginalConstructor()
                     ->disableOriginalClone()
                     ->disableAutoload();

        $this->assertInstanceOf(MockBuilder::class, $spec);
    }
}
