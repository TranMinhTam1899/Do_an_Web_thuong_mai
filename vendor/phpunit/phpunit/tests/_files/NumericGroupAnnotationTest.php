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
class NumericGroupAnnotationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @testdox Empty test for @ticket numeric annotation values
     * @ticket  3502
     *
     * @see https://github.com/sebastianbergmann/phpunit/issues/3502
     */
    public function testTicketAnnotationSupportsNumericValue(): void
    {
        $this->assertTrue(true);
    }

    /**
     * @testdox Empty test for @group numeric annotation values
     * @group   3502
     *
     * @see https://github.com/sebastianbergmann/phpunit/issues/3502
     */
    public function testGroupAnnotationSupportsNumericValue(): void
    {
        $this->assertTrue(true);
    }

    public function testDummyTestThatShouldNotRun(): void
    {
        $this->doesNotPerformAssertions();
    }
}
