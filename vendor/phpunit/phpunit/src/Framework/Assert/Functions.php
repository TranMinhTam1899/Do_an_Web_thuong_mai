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

use PHPUnit\Framework\Assert;
<<<<<<< HEAD
=======
use PHPUnit\Framework\AssertionFailedError;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use PHPUnit\Framework\Constraint\ArrayHasKey;
use PHPUnit\Framework\Constraint\Attribute;
use PHPUnit\Framework\Constraint\Callback;
use PHPUnit\Framework\Constraint\ClassHasAttribute;
use PHPUnit\Framework\Constraint\ClassHasStaticAttribute;
use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\Constraint\Count;
use PHPUnit\Framework\Constraint\DirectoryExists;
use PHPUnit\Framework\Constraint\FileExists;
use PHPUnit\Framework\Constraint\GreaterThan;
use PHPUnit\Framework\Constraint\IsAnything;
use PHPUnit\Framework\Constraint\IsEmpty;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsFinite;
use PHPUnit\Framework\Constraint\IsIdentical;
use PHPUnit\Framework\Constraint\IsInfinite;
use PHPUnit\Framework\Constraint\IsInstanceOf;
use PHPUnit\Framework\Constraint\IsJson;
use PHPUnit\Framework\Constraint\IsNan;
use PHPUnit\Framework\Constraint\IsNull;
use PHPUnit\Framework\Constraint\IsReadable;
use PHPUnit\Framework\Constraint\IsTrue;
use PHPUnit\Framework\Constraint\IsType;
use PHPUnit\Framework\Constraint\IsWritable;
use PHPUnit\Framework\Constraint\LessThan;
use PHPUnit\Framework\Constraint\LogicalAnd;
use PHPUnit\Framework\Constraint\LogicalNot;
use PHPUnit\Framework\Constraint\LogicalOr;
use PHPUnit\Framework\Constraint\LogicalXor;
use PHPUnit\Framework\Constraint\ObjectHasAttribute;
use PHPUnit\Framework\Constraint\RegularExpression;
use PHPUnit\Framework\Constraint\StringContains;
use PHPUnit\Framework\Constraint\StringEndsWith;
use PHPUnit\Framework\Constraint\StringMatchesFormatDescription;
use PHPUnit\Framework\Constraint\StringStartsWith;
use PHPUnit\Framework\Constraint\TraversableContains;
use PHPUnit\Framework\Constraint\TraversableContainsOnly;
use PHPUnit\Framework\ExpectationFailedException;
<<<<<<< HEAD
use PHPUnit\Framework\MockObject\Matcher\AnyInvokedCount as AnyInvokedCountMatcher;
use PHPUnit\Framework\MockObject\Matcher\InvokedAtIndex as InvokedAtIndexMatcher;
use PHPUnit\Framework\MockObject\Matcher\InvokedAtLeastCount as InvokedAtLeastCountMatcher;
use PHPUnit\Framework\MockObject\Matcher\InvokedAtLeastOnce as InvokedAtLeastOnceMatcher;
use PHPUnit\Framework\MockObject\Matcher\InvokedAtMostCount as InvokedAtMostCountMatcher;
use PHPUnit\Framework\MockObject\Matcher\InvokedCount as InvokedCountMatcher;
=======
use PHPUnit\Framework\MockObject\Rule\AnyInvokedCount as AnyInvokedCountMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtIndex as InvokedAtIndexMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtLeastCount as InvokedAtLeastCountMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtLeastOnce as InvokedAtLeastOnceMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtMostCount as InvokedAtMostCountMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedCount as InvokedCountMatcher;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use PHPUnit\Framework\MockObject\Stub\ConsecutiveCalls as ConsecutiveCallsStub;
use PHPUnit\Framework\MockObject\Stub\Exception as ExceptionStub;
use PHPUnit\Framework\MockObject\Stub\ReturnArgument as ReturnArgumentStub;
use PHPUnit\Framework\MockObject\Stub\ReturnCallback as ReturnCallbackStub;
use PHPUnit\Framework\MockObject\Stub\ReturnSelf as ReturnSelfStub;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;
use PHPUnit\Framework\MockObject\Stub\ReturnValueMap as ReturnValueMapStub;

/**
 * Asserts that an array has a specified key.
 *
 * @param int|string        $key
 * @param array|ArrayAccess $array
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @see Assert::assertArrayHasKey
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertArrayHasKey($key, $array, string $message = ''): void
{
    Assert::assertArrayHasKey(...\func_get_args());
}

/**
 * Asserts that an array has a specified subset.
 *
 * @param array|ArrayAccess $subset
 * @param array|ArrayAccess $array
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3494
=======
 * @throws Exception
 *
 * @codeCoverageIgnore
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3494
 * @see Assert::assertArraySubset
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertArraySubset($subset, $array, bool $checkForObjectIdentity = false, string $message = ''): void
{
    Assert::assertArraySubset(...\func_get_args());
}

/**
 * Asserts that an array does not have a specified key.
 *
 * @param int|string        $key
 * @param array|ArrayAccess $array
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @see Assert::assertArrayNotHasKey
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertArrayNotHasKey($key, $array, string $message = ''): void
{
    Assert::assertArrayNotHasKey(...\func_get_args());
}

/**
 * Asserts that a haystack contains a needle.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @see Assert::assertContains
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertContains($needle, $haystack, string $message = '', bool $ignoreCase = false, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false): void
{
    Assert::assertContains(...\func_get_args());
}

<<<<<<< HEAD
=======
function assertContainsEquals($needle, iterable $haystack, string $message = ''): void
{
    Assert::assertContainsEquals(...\func_get_args());
}

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/**
 * Asserts that a haystack that is stored in a static attribute of a class
 * or an attribute of an object contains a needle.
 *
 * @param object|string $haystackClassOrObject
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 *
 * @see Assert::assertAttributeContains
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertAttributeContains($needle, string $haystackAttributeName, $haystackClassOrObject, string $message = '', bool $ignoreCase = false, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false): void
{
    Assert::assertAttributeContains(...\func_get_args());
}

/**
 * Asserts that a haystack does not contain a needle.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @see Assert::assertNotContains
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertNotContains($needle, $haystack, string $message = '', bool $ignoreCase = false, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false): void
{
    Assert::assertNotContains(...\func_get_args());
}

<<<<<<< HEAD
=======
function assertNotContainsEquals($needle, iterable $haystack, string $message = ''): void
{
    Assert::assertNotContainsEquals(...\func_get_args());
}

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/**
 * Asserts that a haystack that is stored in a static attribute of a class
 * or an attribute of an object does not contain a needle.
 *
 * @param object|string $haystackClassOrObject
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 *
 * @see Assert::assertAttributeNotContains
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertAttributeNotContains($needle, string $haystackAttributeName, $haystackClassOrObject, string $message = '', bool $ignoreCase = false, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false): void
{
    Assert::assertAttributeNotContains(...\func_get_args());
}

/**
 * Asserts that a haystack contains only values of a given type.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertContainsOnly
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertContainsOnly(string $type, iterable $haystack, ?bool $isNativeType = null, string $message = ''): void
{
    Assert::assertContainsOnly(...\func_get_args());
}

/**
 * Asserts that a haystack contains only instances of a given class name.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertContainsOnlyInstancesOf
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertContainsOnlyInstancesOf(string $className, iterable $haystack, string $message = ''): void
{
    Assert::assertContainsOnlyInstancesOf(...\func_get_args());
}

/**
 * Asserts that a haystack that is stored in a static attribute of a class
 * or an attribute of an object contains only values of a given type.
 *
 * @param object|string $haystackClassOrObject
 * @param bool          $isNativeType
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 *
 * @see Assert::assertAttributeContainsOnly
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertAttributeContainsOnly(string $type, string $haystackAttributeName, $haystackClassOrObject, ?bool $isNativeType = null, string $message = ''): void
{
    Assert::assertAttributeContainsOnly(...\func_get_args());
}

/**
 * Asserts that a haystack does not contain only values of a given type.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertNotContainsOnly
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertNotContainsOnly(string $type, iterable $haystack, ?bool $isNativeType = null, string $message = ''): void
{
    Assert::assertNotContainsOnly(...\func_get_args());
}

/**
 * Asserts that a haystack that is stored in a static attribute of a class
 * or an attribute of an object does not contain only values of a given
 * type.
 *
 * @param object|string $haystackClassOrObject
 * @param bool          $isNativeType
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 *
 * @see Assert::assertAttributeNotContainsOnly
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertAttributeNotContainsOnly(string $type, string $haystackAttributeName, $haystackClassOrObject, ?bool $isNativeType = null, string $message = ''): void
{
    Assert::assertAttributeNotContainsOnly(...\func_get_args());
}

/**
 * Asserts the number of elements of an array, Countable or Traversable.
 *
 * @param Countable|iterable $haystack
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @see Assert::assertCount
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertCount(int $expectedCount, $haystack, string $message = ''): void
{
    Assert::assertCount(...\func_get_args());
}

/**
 * Asserts the number of elements of an array, Countable or Traversable
 * that is stored in an attribute.
 *
 * @param object|string $haystackClassOrObject
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 *
 * @see Assert::assertAttributeCount
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertAttributeCount(int $expectedCount, string $haystackAttributeName, $haystackClassOrObject, string $message = ''): void
{
    Assert::assertAttributeCount(...\func_get_args());
}

/**
 * Asserts the number of elements of an array, Countable or Traversable.
 *
 * @param Countable|iterable $haystack
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @see Assert::assertNotCount
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertNotCount(int $expectedCount, $haystack, string $message = ''): void
{
    Assert::assertNotCount(...\func_get_args());
}

/**
 * Asserts the number of elements of an array, Countable or Traversable
 * that is stored in an attribute.
 *
 * @param object|string $haystackClassOrObject
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 *
 * @see Assert::assertAttributeNotCount
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertAttributeNotCount(int $expectedCount, string $haystackAttributeName, $haystackClassOrObject, string $message = ''): void
{
    Assert::assertAttributeNotCount(...\func_get_args());
}

/**
 * Asserts that two variables are equal.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertEquals
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertEquals($expected, $actual, string $message = '', float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false): void
{
    Assert::assertEquals(...\func_get_args());
}

/**
<<<<<<< HEAD
=======
 * Asserts that two variables are equal (canonicalizing).
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @see Assert::assertEqualsCanonicalizing
 */
function assertEqualsCanonicalizing($expected, $actual, string $message = ''): void
{
    Assert::assertEqualsCanonicalizing(...\func_get_args());
}

/**
 * Asserts that two variables are equal (ignoring case).
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @see Assert::assertEqualsIgnoringCase
 */
function assertEqualsIgnoringCase($expected, $actual, string $message = ''): void
{
    Assert::assertEqualsIgnoringCase(...\func_get_args());
}

/**
 * Asserts that two variables are equal (with delta).
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @see Assert::assertEqualsWithDelta
 */
function assertEqualsWithDelta($expected, $actual, float $delta, string $message = ''): void
{
    Assert::assertEqualsWithDelta(...\func_get_args());
}

/**
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 * Asserts that a variable is equal to an attribute of an object.
 *
 * @param object|string $actualClassOrObject
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 *
 * @see Assert::assertAttributeEquals
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertAttributeEquals($expected, string $actualAttributeName, $actualClassOrObject, string $message = '', float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false): void
{
    Assert::assertAttributeEquals(...\func_get_args());
}

/**
 * Asserts that two variables are not equal.
 *
 * @param float $delta
 * @param int   $maxDepth
 * @param bool  $canonicalize
 * @param bool  $ignoreCase
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertNotEquals
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertNotEquals($expected, $actual, string $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false): void
{
    Assert::assertNotEquals(...\func_get_args());
}

/**
<<<<<<< HEAD
=======
 * Asserts that two variables are not equal (canonicalizing).
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @see Assert::assertNotEqualsCanonicalizing
 */
function assertNotEqualsCanonicalizing($expected, $actual, string $message = ''): void
{
    Assert::assertNotEqualsCanonicalizing(...\func_get_args());
}

/**
 * Asserts that two variables are not equal (ignoring case).
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @see Assert::assertNotEqualsIgnoringCase
 */
function assertNotEqualsIgnoringCase($expected, $actual, string $message = ''): void
{
    Assert::assertNotEqualsIgnoringCase(...\func_get_args());
}

/**
 * Asserts that two variables are not equal (with delta).
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @see Assert::assertNotEqualsWithDelta
 */
function assertNotEqualsWithDelta($expected, $actual, float $delta, string $message = ''): void
{
    Assert::assertNotEqualsWithDelta(...\func_get_args());
}

/**
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 * Asserts that a variable is not equal to an attribute of an object.
 *
 * @param object|string $actualClassOrObject
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 *
 * @see Assert::assertAttributeNotEquals
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertAttributeNotEquals($expected, string $actualAttributeName, $actualClassOrObject, string $message = '', float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false): void
{
    Assert::assertAttributeNotEquals(...\func_get_args());
}

/**
 * Asserts that a variable is empty.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @psalm-assert empty $actual
 *
 * @see Assert::assertEmpty
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertEmpty($actual, string $message = ''): void
{
    Assert::assertEmpty(...\func_get_args());
}

/**
 * Asserts that a static attribute of a class or an attribute of an object
 * is empty.
 *
 * @param object|string $haystackClassOrObject
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 *
 * @see Assert::assertAttributeEmpty
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertAttributeEmpty(string $haystackAttributeName, $haystackClassOrObject, string $message = ''): void
{
    Assert::assertAttributeEmpty(...\func_get_args());
}

/**
 * Asserts that a variable is not empty.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @psalm-assert !empty $actual
 *
 * @see Assert::assertNotEmpty
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertNotEmpty($actual, string $message = ''): void
{
    Assert::assertNotEmpty(...\func_get_args());
}

/**
 * Asserts that a static attribute of a class or an attribute of an object
 * is not empty.
 *
 * @param object|string $haystackClassOrObject
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 *
 * @see Assert::assertAttributeNotEmpty
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertAttributeNotEmpty(string $haystackAttributeName, $haystackClassOrObject, string $message = ''): void
{
    Assert::assertAttributeNotEmpty(...\func_get_args());
}

/**
 * Asserts that a value is greater than another value.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertGreaterThan
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertGreaterThan($expected, $actual, string $message = ''): void
{
    Assert::assertGreaterThan(...\func_get_args());
}

/**
 * Asserts that an attribute is greater than another value.
 *
 * @param object|string $actualClassOrObject
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 *
 * @see Assert::assertAttributeGreaterThan
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertAttributeGreaterThan($expected, string $actualAttributeName, $actualClassOrObject, string $message = ''): void
{
    Assert::assertAttributeGreaterThan(...\func_get_args());
}

/**
 * Asserts that a value is greater than or equal to another value.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertGreaterThanOrEqual
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertGreaterThanOrEqual($expected, $actual, string $message = ''): void
{
    Assert::assertGreaterThanOrEqual(...\func_get_args());
}

/**
 * Asserts that an attribute is greater than or equal to another value.
 *
 * @param object|string $actualClassOrObject
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 *
 * @see Assert::assertAttributeGreaterThanOrEqual
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertAttributeGreaterThanOrEqual($expected, string $actualAttributeName, $actualClassOrObject, string $message = ''): void
{
    Assert::assertAttributeGreaterThanOrEqual(...\func_get_args());
}

/**
 * Asserts that a value is smaller than another value.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertLessThan
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertLessThan($expected, $actual, string $message = ''): void
{
    Assert::assertLessThan(...\func_get_args());
}

/**
 * Asserts that an attribute is smaller than another value.
 *
 * @param object|string $actualClassOrObject
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 *
 * @see Assert::assertAttributeLessThan
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertAttributeLessThan($expected, string $actualAttributeName, $actualClassOrObject, string $message = ''): void
{
    Assert::assertAttributeLessThan(...\func_get_args());
}

/**
 * Asserts that a value is smaller than or equal to another value.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertLessThanOrEqual
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertLessThanOrEqual($expected, $actual, string $message = ''): void
{
    Assert::assertLessThanOrEqual(...\func_get_args());
}

/**
 * Asserts that an attribute is smaller than or equal to another value.
 *
 * @param object|string $actualClassOrObject
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 *
 * @see Assert::assertAttributeLessThanOrEqual
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertAttributeLessThanOrEqual($expected, string $actualAttributeName, $actualClassOrObject, string $message = ''): void
{
    Assert::assertAttributeLessThanOrEqual(...\func_get_args());
}

/**
 * Asserts that the contents of one file is equal to the contents of another
 * file.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertFileEquals
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertFileEquals(string $expected, string $actual, string $message = '', bool $canonicalize = false, bool $ignoreCase = false): void
{
    Assert::assertFileEquals(...\func_get_args());
}

/**
 * Asserts that the contents of one file is not equal to the contents of
 * another file.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertFileNotEquals
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertFileNotEquals(string $expected, string $actual, string $message = '', bool $canonicalize = false, bool $ignoreCase = false): void
{
    Assert::assertFileNotEquals(...\func_get_args());
}

/**
 * Asserts that the contents of a string is equal
 * to the contents of a file.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertStringEqualsFile
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertStringEqualsFile(string $expectedFile, string $actualString, string $message = '', bool $canonicalize = false, bool $ignoreCase = false): void
{
    Assert::assertStringEqualsFile(...\func_get_args());
}

/**
 * Asserts that the contents of a string is not equal
 * to the contents of a file.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertStringNotEqualsFile
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertStringNotEqualsFile(string $expectedFile, string $actualString, string $message = '', bool $canonicalize = false, bool $ignoreCase = false): void
{
    Assert::assertStringNotEqualsFile(...\func_get_args());
}

/**
 * Asserts that a file/dir is readable.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertIsReadable
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertIsReadable(string $filename, string $message = ''): void
{
    Assert::assertIsReadable(...\func_get_args());
}

/**
 * Asserts that a file/dir exists and is not readable.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertNotIsReadable
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertNotIsReadable(string $filename, string $message = ''): void
{
    Assert::assertNotIsReadable(...\func_get_args());
}

/**
 * Asserts that a file/dir exists and is writable.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertIsWritable
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertIsWritable(string $filename, string $message = ''): void
{
    Assert::assertIsWritable(...\func_get_args());
}

/**
 * Asserts that a file/dir exists and is not writable.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertNotIsWritable
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertNotIsWritable(string $filename, string $message = ''): void
{
    Assert::assertNotIsWritable(...\func_get_args());
}

/**
 * Asserts that a directory exists.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertDirectoryExists
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertDirectoryExists(string $directory, string $message = ''): void
{
    Assert::assertDirectoryExists(...\func_get_args());
}

/**
 * Asserts that a directory does not exist.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertDirectoryNotExists
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertDirectoryNotExists(string $directory, string $message = ''): void
{
    Assert::assertDirectoryNotExists(...\func_get_args());
}

/**
 * Asserts that a directory exists and is readable.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertDirectoryIsReadable
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertDirectoryIsReadable(string $directory, string $message = ''): void
{
    Assert::assertDirectoryIsReadable(...\func_get_args());
}

/**
 * Asserts that a directory exists and is not readable.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertDirectoryNotIsReadable
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertDirectoryNotIsReadable(string $directory, string $message = ''): void
{
    Assert::assertDirectoryNotIsReadable(...\func_get_args());
}

/**
 * Asserts that a directory exists and is writable.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertDirectoryIsWritable
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertDirectoryIsWritable(string $directory, string $message = ''): void
{
    Assert::assertDirectoryIsWritable(...\func_get_args());
}

/**
 * Asserts that a directory exists and is not writable.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertDirectoryNotIsWritable
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertDirectoryNotIsWritable(string $directory, string $message = ''): void
{
    Assert::assertDirectoryNotIsWritable(...\func_get_args());
}

/**
 * Asserts that a file exists.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertFileExists
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertFileExists(string $filename, string $message = ''): void
{
    Assert::assertFileExists(...\func_get_args());
}

/**
 * Asserts that a file does not exist.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertFileNotExists
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertFileNotExists(string $filename, string $message = ''): void
{
    Assert::assertFileNotExists(...\func_get_args());
}

/**
 * Asserts that a file exists and is readable.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertFileIsReadable
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertFileIsReadable(string $file, string $message = ''): void
{
    Assert::assertFileIsReadable(...\func_get_args());
}

/**
 * Asserts that a file exists and is not readable.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertFileNotIsReadable
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertFileNotIsReadable(string $file, string $message = ''): void
{
    Assert::assertFileNotIsReadable(...\func_get_args());
}

/**
 * Asserts that a file exists and is writable.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertFileIsWritable
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertFileIsWritable(string $file, string $message = ''): void
{
    Assert::assertFileIsWritable(...\func_get_args());
}

/**
 * Asserts that a file exists and is not writable.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertFileNotIsWritable
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertFileNotIsWritable(string $file, string $message = ''): void
{
    Assert::assertFileNotIsWritable(...\func_get_args());
}

/**
 * Asserts that a condition is true.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @psalm-assert true $condition
 *
 * @see Assert::assertTrue
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertTrue($condition, string $message = ''): void
{
    Assert::assertTrue(...\func_get_args());
}

/**
 * Asserts that a condition is not true.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @psalm-assert !true $condition
 *
 * @see Assert::assertNotTrue
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertNotTrue($condition, string $message = ''): void
{
    Assert::assertNotTrue(...\func_get_args());
}

/**
 * Asserts that a condition is false.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @psalm-assert false $condition
 *
 * @see Assert::assertFalse
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertFalse($condition, string $message = ''): void
{
    Assert::assertFalse(...\func_get_args());
}

/**
 * Asserts that a condition is not false.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @psalm-assert !false $condition
 *
 * @see Assert::assertNotFalse
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertNotFalse($condition, string $message = ''): void
{
    Assert::assertNotFalse(...\func_get_args());
}

/**
 * Asserts that a variable is null.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @psalm-assert null $actual
 *
 * @see Assert::assertNull
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertNull($actual, string $message = ''): void
{
    Assert::assertNull(...\func_get_args());
}

/**
 * Asserts that a variable is not null.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @psalm-assert !null $actual
 *
 * @see Assert::assertNotNull
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertNotNull($actual, string $message = ''): void
{
    Assert::assertNotNull(...\func_get_args());
}

/**
 * Asserts that a variable is finite.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertFinite
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertFinite($actual, string $message = ''): void
{
    Assert::assertFinite(...\func_get_args());
}

/**
 * Asserts that a variable is infinite.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertInfinite
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertInfinite($actual, string $message = ''): void
{
    Assert::assertInfinite(...\func_get_args());
}

/**
 * Asserts that a variable is nan.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertNan
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertNan($actual, string $message = ''): void
{
    Assert::assertNan(...\func_get_args());
}

/**
 * Asserts that a class has a specified attribute.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @see Assert::assertClassHasAttribute
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertClassHasAttribute(string $attributeName, string $className, string $message = ''): void
{
    Assert::assertClassHasAttribute(...\func_get_args());
}

/**
 * Asserts that a class does not have a specified attribute.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @see Assert::assertClassNotHasAttribute
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertClassNotHasAttribute(string $attributeName, string $className, string $message = ''): void
{
    Assert::assertClassNotHasAttribute(...\func_get_args());
}

/**
 * Asserts that a class has a specified static attribute.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @see Assert::assertClassHasStaticAttribute
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertClassHasStaticAttribute(string $attributeName, string $className, string $message = ''): void
{
    Assert::assertClassHasStaticAttribute(...\func_get_args());
}

/**
 * Asserts that a class does not have a specified static attribute.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @see Assert::assertClassNotHasStaticAttribute
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertClassNotHasStaticAttribute(string $attributeName, string $className, string $message = ''): void
{
    Assert::assertClassNotHasStaticAttribute(...\func_get_args());
}

/**
 * Asserts that an object has a specified attribute.
 *
 * @param object $object
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @see Assert::assertObjectHasAttribute
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertObjectHasAttribute(string $attributeName, $object, string $message = ''): void
{
    Assert::assertObjectHasAttribute(...\func_get_args());
}

/**
 * Asserts that an object does not have a specified attribute.
 *
 * @param object $object
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @see Assert::assertObjectNotHasAttribute
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertObjectNotHasAttribute(string $attributeName, $object, string $message = ''): void
{
    Assert::assertObjectNotHasAttribute(...\func_get_args());
}

/**
 * Asserts that two variables have the same type and value.
 * Used on objects, it asserts that two variables reference
 * the same object.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @psalm-template ExpectedType
 * @psalm-param ExpectedType $expected
 * @psalm-assert =ExpectedType $actual
 *
 * @see Assert::assertSame
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertSame($expected, $actual, string $message = ''): void
{
    Assert::assertSame(...\func_get_args());
}

/**
 * Asserts that a variable and an attribute of an object have the same type
 * and value.
 *
 * @param object|string $actualClassOrObject
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 *
 * @see Assert::assertAttributeSame
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertAttributeSame($expected, string $actualAttributeName, $actualClassOrObject, string $message = ''): void
{
    Assert::assertAttributeSame(...\func_get_args());
}

/**
 * Asserts that two variables do not have the same type and value.
 * Used on objects, it asserts that two variables do not reference
 * the same object.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertNotSame
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertNotSame($expected, $actual, string $message = ''): void
{
    Assert::assertNotSame(...\func_get_args());
}

/**
 * Asserts that a variable and an attribute of an object do not have the
 * same type and value.
 *
 * @param object|string $actualClassOrObject
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 *
 * @see Assert::assertAttributeNotSame
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertAttributeNotSame($expected, string $actualAttributeName, $actualClassOrObject, string $message = ''): void
{
    Assert::assertAttributeNotSame(...\func_get_args());
}

/**
 * Asserts that a variable is of a given type.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @psalm-template ExpectedType of object
 * @psalm-param class-string<ExpectedType> $expected
 * @psalm-assert ExpectedType $actual
 *
 * @see Assert::assertInstanceOf
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertInstanceOf(string $expected, $actual, string $message = ''): void
{
    Assert::assertInstanceOf(...\func_get_args());
}

/**
 * Asserts that an attribute is of a given type.
 *
 * @param object|string $classOrObject
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 *
 * @psalm-param class-string $expected
 *
 * @see Assert::assertAttributeInstanceOf
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertAttributeInstanceOf(string $expected, string $attributeName, $classOrObject, string $message = ''): void
{
    Assert::assertAttributeInstanceOf(...\func_get_args());
}

/**
 * Asserts that a variable is not of a given type.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @psalm-template ExpectedType of object
 * @psalm-param class-string<ExpectedType> $expected
 * @psalm-assert !ExpectedType $actual
 *
 * @see Assert::assertNotInstanceOf
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertNotInstanceOf(string $expected, $actual, string $message = ''): void
{
    Assert::assertNotInstanceOf(...\func_get_args());
}

/**
 * Asserts that an attribute is of a given type.
 *
 * @param object|string $classOrObject
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 *
 * @psalm-param class-string $expected
 *
 * @see Assert::assertAttributeNotInstanceOf
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertAttributeNotInstanceOf(string $expected, string $attributeName, $classOrObject, string $message = ''): void
{
    Assert::assertAttributeNotInstanceOf(...\func_get_args());
}

/**
 * Asserts that a variable is of a given type.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3369
 * @codeCoverageIgnore
 *
 * @see Assert::assertInternalType
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertInternalType(string $expected, $actual, string $message = ''): void
{
    Assert::assertInternalType(...\func_get_args());
}

/**
 * Asserts that an attribute is of a given type.
 *
 * @param object|string $classOrObject
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 *
 * @see Assert::assertAttributeInternalType
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertAttributeInternalType(string $expected, string $attributeName, $classOrObject, string $message = ''): void
{
    Assert::assertAttributeInternalType(...\func_get_args());
}

/**
<<<<<<< HEAD
=======
 * Asserts that a variable is of type array.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert array $actual
 *
 * @see Assert::assertIsArray
 */
function assertIsArray($actual, string $message = ''): void
{
    Assert::assertIsArray(...\func_get_args());
}

/**
 * Asserts that a variable is of type bool.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert bool $actual
 *
 * @see Assert::assertIsBool
 */
function assertIsBool($actual, string $message = ''): void
{
    Assert::assertIsBool(...\func_get_args());
}

/**
 * Asserts that a variable is of type float.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert float $actual
 *
 * @see Assert::assertIsFloat
 */
function assertIsFloat($actual, string $message = ''): void
{
    Assert::assertIsFloat(...\func_get_args());
}

/**
 * Asserts that a variable is of type int.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert int $actual
 *
 * @see Assert::assertIsInt
 */
function assertIsInt($actual, string $message = ''): void
{
    Assert::assertIsInt(...\func_get_args());
}

/**
 * Asserts that a variable is of type numeric.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert numeric $actual
 *
 * @see Assert::assertIsNumeric
 */
function assertIsNumeric($actual, string $message = ''): void
{
    Assert::assertIsNumeric(...\func_get_args());
}

/**
 * Asserts that a variable is of type object.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert object $actual
 *
 * @see Assert::assertIsObject
 */
function assertIsObject($actual, string $message = ''): void
{
    Assert::assertIsObject(...\func_get_args());
}

/**
 * Asserts that a variable is of type resource.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert resource $actual
 *
 * @see Assert::assertIsResource
 */
function assertIsResource($actual, string $message = ''): void
{
    Assert::assertIsResource(...\func_get_args());
}

/**
 * Asserts that a variable is of type string.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert string $actual
 *
 * @see Assert::assertIsString
 */
function assertIsString($actual, string $message = ''): void
{
    Assert::assertIsString(...\func_get_args());
}

/**
 * Asserts that a variable is of type scalar.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert scalar $actual
 *
 * @see Assert::assertIsScalar
 */
function assertIsScalar($actual, string $message = ''): void
{
    Assert::assertIsScalar(...\func_get_args());
}

/**
 * Asserts that a variable is of type callable.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert callable $actual
 *
 * @see Assert::assertIsCallable
 */
function assertIsCallable($actual, string $message = ''): void
{
    Assert::assertIsCallable(...\func_get_args());
}

/**
 * Asserts that a variable is of type iterable.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert iterable $actual
 *
 * @see Assert::assertIsIterable
 */
function assertIsIterable($actual, string $message = ''): void
{
    Assert::assertIsIterable(...\func_get_args());
}

/**
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 * Asserts that a variable is not of a given type.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3369
 * @codeCoverageIgnore
 *
 * @see Assert::assertNotInternalType
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertNotInternalType(string $expected, $actual, string $message = ''): void
{
    Assert::assertNotInternalType(...\func_get_args());
}

/**
<<<<<<< HEAD
=======
 * Asserts that a variable is not of type array.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert !array $actual
 *
 * @see Assert::assertIsNotArray
 */
function assertIsNotArray($actual, string $message = ''): void
{
    Assert::assertIsNotArray(...\func_get_args());
}

/**
 * Asserts that a variable is not of type bool.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert !bool $actual
 *
 * @see Assert::assertIsNotBool
 */
function assertIsNotBool($actual, string $message = ''): void
{
    Assert::assertIsNotBool(...\func_get_args());
}

/**
 * Asserts that a variable is not of type float.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert !float $actual
 *
 * @see Assert::assertIsNotFloat
 */
function assertIsNotFloat($actual, string $message = ''): void
{
    Assert::assertIsNotFloat(...\func_get_args());
}

/**
 * Asserts that a variable is not of type int.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert !int $actual
 *
 * @see Assert::assertIsNotInt
 */
function assertIsNotInt($actual, string $message = ''): void
{
    Assert::assertIsNotInt(...\func_get_args());
}

/**
 * Asserts that a variable is not of type numeric.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert !numeric $actual
 *
 * @see Assert::assertIsNotNumeric
 */
function assertIsNotNumeric($actual, string $message = ''): void
{
    Assert::assertIsNotNumeric(...\func_get_args());
}

/**
 * Asserts that a variable is not of type object.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert !object $actual
 *
 * @see Assert::assertIsNotObject
 */
function assertIsNotObject($actual, string $message = ''): void
{
    Assert::assertIsNotObject(...\func_get_args());
}

/**
 * Asserts that a variable is not of type resource.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert !resource $actual
 *
 * @see Assert::assertIsNotResource
 */
function assertIsNotResource($actual, string $message = ''): void
{
    Assert::assertIsNotResource(...\func_get_args());
}

/**
 * Asserts that a variable is not of type string.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert !string $actual
 *
 * @see Assert::assertIsNotString
 */
function assertIsNotString($actual, string $message = ''): void
{
    Assert::assertIsNotString(...\func_get_args());
}

/**
 * Asserts that a variable is not of type scalar.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert !scalar $actual
 *
 * @see Assert::assertIsNotScalar
 */
function assertIsNotScalar($actual, string $message = ''): void
{
    Assert::assertIsNotScalar(...\func_get_args());
}

/**
 * Asserts that a variable is not of type callable.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert !callable $actual
 *
 * @see Assert::assertIsNotCallable
 */
function assertIsNotCallable($actual, string $message = ''): void
{
    Assert::assertIsNotCallable(...\func_get_args());
}

/**
 * Asserts that a variable is not of type iterable.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @psalm-assert !iterable $actual
 *
 * @see Assert::assertIsNotIterable
 */
function assertIsNotIterable($actual, string $message = ''): void
{
    Assert::assertIsNotIterable(...\func_get_args());
}

/**
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 * Asserts that an attribute is of a given type.
 *
 * @param object|string $classOrObject
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 *
 * @see Assert::assertAttributeNotInternalType
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertAttributeNotInternalType(string $expected, string $attributeName, $classOrObject, string $message = ''): void
{
    Assert::assertAttributeNotInternalType(...\func_get_args());
}

/**
 * Asserts that a string matches a given regular expression.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertRegExp
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertRegExp(string $pattern, string $string, string $message = ''): void
{
    Assert::assertRegExp(...\func_get_args());
}

/**
 * Asserts that a string does not match a given regular expression.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertNotRegExp
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertNotRegExp(string $pattern, string $string, string $message = ''): void
{
    Assert::assertNotRegExp(...\func_get_args());
}

/**
 * Assert that the size of two arrays (or `Countable` or `Traversable` objects)
 * is the same.
 *
 * @param Countable|iterable $expected
 * @param Countable|iterable $actual
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @see Assert::assertSameSize
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertSameSize($expected, $actual, string $message = ''): void
{
    Assert::assertSameSize(...\func_get_args());
}

/**
 * Assert that the size of two arrays (or `Countable` or `Traversable` objects)
 * is not the same.
 *
 * @param Countable|iterable $expected
 * @param Countable|iterable $actual
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @see Assert::assertNotSameSize
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertNotSameSize($expected, $actual, string $message = ''): void
{
    Assert::assertNotSameSize(...\func_get_args());
}

/**
 * Asserts that a string matches a given format string.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertStringMatchesFormat
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertStringMatchesFormat(string $format, string $string, string $message = ''): void
{
    Assert::assertStringMatchesFormat(...\func_get_args());
}

/**
 * Asserts that a string does not match a given format string.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertStringNotMatchesFormat
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertStringNotMatchesFormat(string $format, string $string, string $message = ''): void
{
    Assert::assertStringNotMatchesFormat(...\func_get_args());
}

/**
 * Asserts that a string matches a given format file.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertStringMatchesFormatFile
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertStringMatchesFormatFile(string $formatFile, string $string, string $message = ''): void
{
    Assert::assertStringMatchesFormatFile(...\func_get_args());
}

/**
 * Asserts that a string does not match a given format string.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertStringNotMatchesFormatFile
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertStringNotMatchesFormatFile(string $formatFile, string $string, string $message = ''): void
{
    Assert::assertStringNotMatchesFormatFile(...\func_get_args());
}

/**
 * Asserts that a string starts with a given prefix.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertStringStartsWith
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertStringStartsWith(string $prefix, string $string, string $message = ''): void
{
    Assert::assertStringStartsWith(...\func_get_args());
}

/**
 * Asserts that a string starts not with a given prefix.
 *
 * @param string $prefix
 * @param string $string
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertStringStartsNotWith
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertStringStartsNotWith($prefix, $string, string $message = ''): void
{
    Assert::assertStringStartsNotWith(...\func_get_args());
}

/**
<<<<<<< HEAD
=======
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @see Assert::assertStringContainsString
 */
function assertStringContainsString(string $needle, string $haystack, string $message = ''): void
{
    Assert::assertStringContainsString(...\func_get_args());
}

/**
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @see Assert::assertStringContainsStringIgnoringCase
 */
function assertStringContainsStringIgnoringCase(string $needle, string $haystack, string $message = ''): void
{
    Assert::assertStringContainsStringIgnoringCase(...\func_get_args());
}

/**
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @see Assert::assertStringNotContainsString
 */
function assertStringNotContainsString(string $needle, string $haystack, string $message = ''): void
{
    Assert::assertStringNotContainsString(...\func_get_args());
}

/**
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
 *
 * @see Assert::assertStringNotContainsStringIgnoringCase
 */
function assertStringNotContainsStringIgnoringCase(string $needle, string $haystack, string $message = ''): void
{
    Assert::assertStringNotContainsStringIgnoringCase(...\func_get_args());
}

/**
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 * Asserts that a string ends with a given suffix.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertStringEndsWith
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertStringEndsWith(string $suffix, string $string, string $message = ''): void
{
    Assert::assertStringEndsWith(...\func_get_args());
}

/**
 * Asserts that a string ends not with a given suffix.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertStringEndsNotWith
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertStringEndsNotWith(string $suffix, string $string, string $message = ''): void
{
    Assert::assertStringEndsNotWith(...\func_get_args());
}

/**
 * Asserts that two XML files are equal.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @see Assert::assertXmlFileEqualsXmlFile
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertXmlFileEqualsXmlFile(string $expectedFile, string $actualFile, string $message = ''): void
{
    Assert::assertXmlFileEqualsXmlFile(...\func_get_args());
}

/**
 * Asserts that two XML files are not equal.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @see Assert::assertXmlFileNotEqualsXmlFile
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertXmlFileNotEqualsXmlFile(string $expectedFile, string $actualFile, string $message = ''): void
{
    Assert::assertXmlFileNotEqualsXmlFile(...\func_get_args());
}

/**
 * Asserts that two XML documents are equal.
 *
 * @param DOMDocument|string $actualXml
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @see Assert::assertXmlStringEqualsXmlFile
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertXmlStringEqualsXmlFile(string $expectedFile, $actualXml, string $message = ''): void
{
    Assert::assertXmlStringEqualsXmlFile(...\func_get_args());
}

/**
 * Asserts that two XML documents are not equal.
 *
 * @param DOMDocument|string $actualXml
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @see Assert::assertXmlStringNotEqualsXmlFile
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertXmlStringNotEqualsXmlFile(string $expectedFile, $actualXml, string $message = ''): void
{
    Assert::assertXmlStringNotEqualsXmlFile(...\func_get_args());
}

/**
 * Asserts that two XML documents are equal.
 *
 * @param DOMDocument|string $expectedXml
 * @param DOMDocument|string $actualXml
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @see Assert::assertXmlStringEqualsXmlString
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertXmlStringEqualsXmlString($expectedXml, $actualXml, string $message = ''): void
{
    Assert::assertXmlStringEqualsXmlString(...\func_get_args());
}

/**
 * Asserts that two XML documents are not equal.
 *
 * @param DOMDocument|string $expectedXml
 * @param DOMDocument|string $actualXml
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 * @throws Exception
 *
 * @see Assert::assertXmlStringNotEqualsXmlString
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertXmlStringNotEqualsXmlString($expectedXml, $actualXml, string $message = ''): void
{
    Assert::assertXmlStringNotEqualsXmlString(...\func_get_args());
}

/**
 * Asserts that a hierarchy of DOMElements matches.
 *
 * @throws AssertionFailedError
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertEqualXMLStructure
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertEqualXMLStructure(DOMElement $expectedElement, DOMElement $actualElement, bool $checkAttributes = false, string $message = ''): void
{
    Assert::assertEqualXMLStructure(...\func_get_args());
}

/**
 * Evaluates a PHPUnit\Framework\Constraint matcher object.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertThat
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertThat($value, Constraint $constraint, string $message = ''): void
{
    Assert::assertThat(...\func_get_args());
}

/**
 * Asserts that a string is a valid JSON string.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertJson
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertJson(string $actualJson, string $message = ''): void
{
    Assert::assertJson(...\func_get_args());
}

/**
 * Asserts that two given JSON encoded objects or arrays are equal.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertJsonStringEqualsJsonString
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertJsonStringEqualsJsonString(string $expectedJson, string $actualJson, string $message = ''): void
{
    Assert::assertJsonStringEqualsJsonString(...\func_get_args());
}

/**
 * Asserts that two given JSON encoded objects or arrays are not equal.
 *
 * @param string $expectedJson
 * @param string $actualJson
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertJsonStringNotEqualsJsonString
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertJsonStringNotEqualsJsonString($expectedJson, $actualJson, string $message = ''): void
{
    Assert::assertJsonStringNotEqualsJsonString(...\func_get_args());
}

/**
 * Asserts that the generated JSON encoded object and the content of the given file are equal.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertJsonStringEqualsJsonFile
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertJsonStringEqualsJsonFile(string $expectedFile, string $actualJson, string $message = ''): void
{
    Assert::assertJsonStringEqualsJsonFile(...\func_get_args());
}

/**
 * Asserts that the generated JSON encoded object and the content of the given file are not equal.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertJsonStringNotEqualsJsonFile
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertJsonStringNotEqualsJsonFile(string $expectedFile, string $actualJson, string $message = ''): void
{
    Assert::assertJsonStringNotEqualsJsonFile(...\func_get_args());
}

/**
 * Asserts that two JSON files are equal.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertJsonFileEqualsJsonFile
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertJsonFileEqualsJsonFile(string $expectedFile, string $actualFile, string $message = ''): void
{
    Assert::assertJsonFileEqualsJsonFile(...\func_get_args());
}

/**
 * Asserts that two JSON files are not equal.
 *
 * @throws ExpectationFailedException
 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
<<<<<<< HEAD
=======
 *
 * @see Assert::assertJsonFileNotEqualsJsonFile
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
function assertJsonFileNotEqualsJsonFile(string $expectedFile, string $actualFile, string $message = ''): void
{
    Assert::assertJsonFileNotEqualsJsonFile(...\func_get_args());
}

function logicalAnd(): LogicalAnd
{
    return Assert::logicalAnd(...\func_get_args());
}

function logicalOr(): LogicalOr
{
    return Assert::logicalOr(...\func_get_args());
}

function logicalNot(Constraint $constraint): LogicalNot
{
    return Assert::logicalNot(...\func_get_args());
}

function logicalXor(): LogicalXor
{
    return Assert::logicalXor(...\func_get_args());
}

function anything(): IsAnything
{
<<<<<<< HEAD
    return Assert::anything();
=======
    return Assert::anything(...\func_get_args());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}

function isTrue(): IsTrue
{
<<<<<<< HEAD
    return Assert::isTrue();
=======
    return Assert::isTrue(...\func_get_args());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}

function callback(callable $callback): Callback
{
    return Assert::callback(...\func_get_args());
}

function isFalse(): IsFalse
{
<<<<<<< HEAD
    return Assert::isFalse();
=======
    return Assert::isFalse(...\func_get_args());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}

function isJson(): IsJson
{
<<<<<<< HEAD
    return Assert::isJson();
=======
    return Assert::isJson(...\func_get_args());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}

function isNull(): IsNull
{
<<<<<<< HEAD
    return Assert::isNull();
=======
    return Assert::isNull(...\func_get_args());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}

function isFinite(): IsFinite
{
<<<<<<< HEAD
    return Assert::isFinite();
=======
    return Assert::isFinite(...\func_get_args());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}

function isInfinite(): IsInfinite
{
<<<<<<< HEAD
    return Assert::isInfinite();
=======
    return Assert::isInfinite(...\func_get_args());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}

function isNan(): IsNan
{
<<<<<<< HEAD
    return Assert::isNan();
=======
    return Assert::isNan(...\func_get_args());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}

function attribute(Constraint $constraint, string $attributeName): Attribute
{
    return Assert::attribute(...\func_get_args());
}

function contains($value, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false): TraversableContains
{
    return Assert::contains(...\func_get_args());
}

function containsOnly(string $type): TraversableContainsOnly
{
    return Assert::containsOnly(...\func_get_args());
}

function containsOnlyInstancesOf(string $className): TraversableContainsOnly
{
    return Assert::containsOnlyInstancesOf(...\func_get_args());
}

function arrayHasKey($key): ArrayHasKey
{
    return Assert::arrayHasKey(...\func_get_args());
}

function equalTo($value, float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false): IsEqual
{
    return Assert::equalTo(...\func_get_args());
}

function attributeEqualTo(string $attributeName, $value, float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false): Attribute
{
    return Assert::attributeEqualTo(...\func_get_args());
}

function isEmpty(): IsEmpty
{
<<<<<<< HEAD
    return Assert::isEmpty();
=======
    return Assert::isEmpty(...\func_get_args());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}

function isWritable(): IsWritable
{
<<<<<<< HEAD
    return Assert::isWritable();
=======
    return Assert::isWritable(...\func_get_args());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}

function isReadable(): IsReadable
{
<<<<<<< HEAD
    return Assert::isReadable();
=======
    return Assert::isReadable(...\func_get_args());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}

function directoryExists(): DirectoryExists
{
<<<<<<< HEAD
    return Assert::directoryExists();
=======
    return Assert::directoryExists(...\func_get_args());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}

function fileExists(): FileExists
{
<<<<<<< HEAD
    return Assert::fileExists();
=======
    return Assert::fileExists(...\func_get_args());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}

function greaterThan($value): GreaterThan
{
    return Assert::greaterThan(...\func_get_args());
}

function greaterThanOrEqual($value): LogicalOr
{
    return Assert::greaterThanOrEqual(...\func_get_args());
}

function classHasAttribute(string $attributeName): ClassHasAttribute
{
    return Assert::classHasAttribute(...\func_get_args());
}

function classHasStaticAttribute(string $attributeName): ClassHasStaticAttribute
{
    return Assert::classHasStaticAttribute(...\func_get_args());
}

function objectHasAttribute($attributeName): ObjectHasAttribute
{
    return Assert::objectHasAttribute(...\func_get_args());
}

function identicalTo($value): IsIdentical
{
    return Assert::identicalTo(...\func_get_args());
}

function isInstanceOf(string $className): IsInstanceOf
{
    return Assert::isInstanceOf(...\func_get_args());
}

function isType(string $type): IsType
{
    return Assert::isType(...\func_get_args());
}

function lessThan($value): LessThan
{
    return Assert::lessThan(...\func_get_args());
}

function lessThanOrEqual($value): LogicalOr
{
    return Assert::lessThanOrEqual(...\func_get_args());
}

function matchesRegularExpression(string $pattern): RegularExpression
{
    return Assert::matchesRegularExpression(...\func_get_args());
}

function matches(string $string): StringMatchesFormatDescription
{
    return Assert::matches(...\func_get_args());
}

function stringStartsWith($prefix): StringStartsWith
{
    return Assert::stringStartsWith(...\func_get_args());
}

function stringContains(string $string, bool $case = true): StringContains
{
    return Assert::stringContains(...\func_get_args());
}

function stringEndsWith(string $suffix): StringEndsWith
{
    return Assert::stringEndsWith(...\func_get_args());
}

function countOf(int $count): Count
{
    return Assert::countOf(...\func_get_args());
}

/**
 * Returns a matcher that matches when the method is executed
 * zero or more times.
 */
function any(): AnyInvokedCountMatcher
{
    return new AnyInvokedCountMatcher;
}

/**
 * Returns a matcher that matches when the method is never executed.
 */
function never(): InvokedCountMatcher
{
    return new InvokedCountMatcher(0);
}

/**
 * Returns a matcher that matches when the method is executed
 * at least N times.
<<<<<<< HEAD
 *
 * @param int $requiredInvocations
 */
function atLeast($requiredInvocations): InvokedAtLeastCountMatcher
=======
 */
function atLeast(int $requiredInvocations): InvokedAtLeastCountMatcher
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    return new InvokedAtLeastCountMatcher(
        $requiredInvocations
    );
}

/**
 * Returns a matcher that matches when the method is executed at least once.
 */
function atLeastOnce(): InvokedAtLeastOnceMatcher
{
    return new InvokedAtLeastOnceMatcher;
}

/**
 * Returns a matcher that matches when the method is executed exactly once.
 */
function once(): InvokedCountMatcher
{
    return new InvokedCountMatcher(1);
}

/**
 * Returns a matcher that matches when the method is executed
 * exactly $count times.
<<<<<<< HEAD
 *
 * @param int $count
 */
function exactly($count): InvokedCountMatcher
=======
 */
function exactly(int $count): InvokedCountMatcher
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    return new InvokedCountMatcher($count);
}

/**
 * Returns a matcher that matches when the method is executed
 * at most N times.
<<<<<<< HEAD
 *
 * @param int $allowedInvocations
 */
function atMost($allowedInvocations): InvokedAtMostCountMatcher
=======
 */
function atMost(int $allowedInvocations): InvokedAtMostCountMatcher
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    return new InvokedAtMostCountMatcher($allowedInvocations);
}

/**
 * Returns a matcher that matches when the method is executed
 * at the given index.
<<<<<<< HEAD
 *
 * @param int $index
 */
function at($index): InvokedAtIndexMatcher
=======
 */
function at(int $index): InvokedAtIndexMatcher
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    return new InvokedAtIndexMatcher($index);
}

function returnValue($value): ReturnStub
{
    return new ReturnStub($value);
}

function returnValueMap(array $valueMap): ReturnValueMapStub
{
    return new ReturnValueMapStub($valueMap);
}

<<<<<<< HEAD
/**
 * @param int $argumentIndex
 */
function returnArgument($argumentIndex): ReturnArgumentStub
=======
function returnArgument(int $argumentIndex): ReturnArgumentStub
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    return new ReturnArgumentStub($argumentIndex);
}

function returnCallback($callback): ReturnCallbackStub
{
    return new ReturnCallbackStub($callback);
}

/**
 * Returns the current object.
 *
 * This method is useful when mocking a fluent interface.
 */
function returnSelf(): ReturnSelfStub
{
    return new ReturnSelfStub;
}

function throwException(Throwable $exception): ExceptionStub
{
    return new ExceptionStub($exception);
}

function onConsecutiveCalls(): ConsecutiveCallsStub
{
    $args = \func_get_args();

    return new ConsecutiveCallsStub($args);
}
