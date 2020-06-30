<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/*
 * This file is part of the php-code-coverage package.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD

namespace SebastianBergmann\CodeCoverage;

require __DIR__ . '/../_files/BankAccount.php';
require __DIR__ . '/../_files/BankAccountTest.php';

use SebastianBergmann\CodeCoverage\Driver\Driver;
use SebastianBergmann\CodeCoverage\Driver\PHPDBG;
use SebastianBergmann\CodeCoverage\Driver\Xdebug;
=======
namespace SebastianBergmann\CodeCoverage;

use SebastianBergmann\CodeCoverage\Driver\Driver;
use SebastianBergmann\Environment\Runtime;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * @covers SebastianBergmann\CodeCoverage\CodeCoverage
 */
class CodeCoverageTest extends TestCase
{
    /**
     * @var CodeCoverage
     */
    private $coverage;

<<<<<<< HEAD
    protected function setUp()
    {
        $this->coverage = new CodeCoverage;
    }

    public function testCanBeConstructedForXdebugWithoutGivenFilterObject()
    {
        if (PHP_SAPI == 'phpdbg') {
            $this->markTestSkipped('Requires PHP CLI and Xdebug');
        }

        $this->assertAttributeInstanceOf(
            Xdebug::class,
            'driver',
            $this->coverage
        );

        $this->assertAttributeInstanceOf(
            Filter::class,
            'filter',
            $this->coverage
        );
    }

    public function testCanBeConstructedForXdebugWithGivenFilterObject()
    {
        if (PHP_SAPI == 'phpdbg') {
            $this->markTestSkipped('Requires PHP CLI and Xdebug');
        }

        $filter   = new Filter;
        $coverage = new CodeCoverage(null, $filter);

        $this->assertAttributeInstanceOf(
            Xdebug::class,
            'driver',
            $coverage
        );

        $this->assertSame($filter, $coverage->filter());
    }

    public function testCanBeConstructedForPhpdbgWithoutGivenFilterObject()
    {
        if (PHP_SAPI != 'phpdbg') {
            $this->markTestSkipped('Requires PHPDBG');
        }

        $this->assertAttributeInstanceOf(
            PHPDBG::class,
            'driver',
            $this->coverage
        );

        $this->assertAttributeInstanceOf(
            Filter::class,
            'filter',
            $this->coverage
        );
    }

    public function testCanBeConstructedForPhpdbgWithGivenFilterObject()
    {
        if (PHP_SAPI != 'phpdbg') {
            $this->markTestSkipped('Requires PHPDBG');
        }

        $filter   = new Filter;
        $coverage = new CodeCoverage(null, $filter);

        $this->assertAttributeInstanceOf(
            PHPDBG::class,
            'driver',
            $coverage
        );

        $this->assertSame($filter, $coverage->filter());
    }

    public function testCannotStopWithInvalidSecondArgument()
=======
    protected function setUp(): void
    {
        $runtime = new Runtime;

        if (!$runtime->canCollectCodeCoverage()) {
            $this->markTestSkipped('No code coverage driver available');
        }

        $this->coverage = new CodeCoverage;
    }

    public function testCannotStopWithInvalidSecondArgument(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->expectException(Exception::class);

        $this->coverage->stop(true, null);
    }

<<<<<<< HEAD
    public function testCannotAppendWithInvalidArgument()
=======
    public function testCannotAppendWithInvalidArgument(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->expectException(Exception::class);

        $this->coverage->append([], null);
    }

<<<<<<< HEAD
    public function testSetCacheTokens()
    {
        $this->coverage->setCacheTokens(true);

        $this->assertAttributeEquals(true, 'cacheTokens', $this->coverage);
    }

    public function testSetCheckForUnintentionallyCoveredCode()
    {
        $this->coverage->setCheckForUnintentionallyCoveredCode(true);

        $this->assertAttributeEquals(
            true,
            'checkForUnintentionallyCoveredCode',
            $this->coverage
        );
    }

    public function testSetCheckForMissingCoversAnnotation()
    {
        $this->coverage->setCheckForMissingCoversAnnotation(true);

        $this->assertAttributeEquals(
            true,
            'checkForMissingCoversAnnotation',
            $this->coverage
        );
    }

    public function testSetForceCoversAnnotation()
    {
        $this->coverage->setForceCoversAnnotation(true);

        $this->assertAttributeEquals(
            true,
            'forceCoversAnnotation',
            $this->coverage
        );
    }

    public function testSetCheckForUnexecutedCoveredCode()
    {
        $this->coverage->setCheckForUnexecutedCoveredCode(true);

        $this->assertAttributeEquals(
            true,
            'checkForUnexecutedCoveredCode',
            $this->coverage
        );
    }

    public function testSetAddUncoveredFilesFromWhitelist()
    {
        $this->coverage->setAddUncoveredFilesFromWhitelist(true);

        $this->assertAttributeEquals(
            true,
            'addUncoveredFilesFromWhitelist',
            $this->coverage
        );
    }

    public function testSetProcessUncoveredFilesFromWhitelist()
    {
        $this->coverage->setProcessUncoveredFilesFromWhitelist(true);

        $this->assertAttributeEquals(
            true,
            'processUncoveredFilesFromWhitelist',
            $this->coverage
        );
    }

    public function testSetIgnoreDeprecatedCode()
    {
        $this->coverage->setIgnoreDeprecatedCode(true);

        $this->assertAttributeEquals(
            true,
            'ignoreDeprecatedCode',
            $this->coverage
        );
    }

    public function testClear()
    {
        $this->coverage->clear();

        $this->assertAttributeEquals(null, 'currentId', $this->coverage);
        $this->assertAttributeEquals([], 'data', $this->coverage);
        $this->assertAttributeEquals([], 'tests', $this->coverage);
    }

    public function testCollect()
=======
    public function testCollect(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $coverage = $this->getCoverageForBankAccount();

        $this->assertEquals(
            $this->getExpectedDataArrayForBankAccount(),
            $coverage->getData()
        );

        $this->assertEquals(
            [
                'BankAccountTest::testBalanceIsInitiallyZero'       => ['size' => 'unknown', 'status' => -1],
                'BankAccountTest::testBalanceCannotBecomeNegative'  => ['size' => 'unknown', 'status' => -1],
                'BankAccountTest::testBalanceCannotBecomeNegative2' => ['size' => 'unknown', 'status' => -1],
<<<<<<< HEAD
                'BankAccountTest::testDepositWithdrawMoney'         => ['size' => 'unknown', 'status' => -1]
=======
                'BankAccountTest::testDepositWithdrawMoney'         => ['size' => 'unknown', 'status' => -1],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            ],
            $coverage->getTests()
        );
    }

<<<<<<< HEAD
    public function testMerge()
=======
    public function testMerge(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $coverage = $this->getCoverageForBankAccountForFirstTwoTests();
        $coverage->merge($this->getCoverageForBankAccountForLastTwoTests());

        $this->assertEquals(
            $this->getExpectedDataArrayForBankAccount(),
            $coverage->getData()
        );
    }

<<<<<<< HEAD
    public function testMergeReverseOrder()
=======
    public function testMergeReverseOrder(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $coverage = $this->getCoverageForBankAccountForLastTwoTests();
        $coverage->merge($this->getCoverageForBankAccountForFirstTwoTests());

        $this->assertEquals(
            $this->getExpectedDataArrayForBankAccountInReverseOrder(),
            $coverage->getData()
        );
    }

<<<<<<< HEAD
    public function testMerge2()
=======
    public function testMerge2(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $coverage = new CodeCoverage(
            $this->createMock(Driver::class),
            new Filter
        );

        $coverage->merge($this->getCoverageForBankAccount());

        $this->assertEquals(
            $this->getExpectedDataArrayForBankAccount(),
            $coverage->getData()
        );
    }

<<<<<<< HEAD
    public function testGetLinesToBeIgnored()
=======
    public function testGetLinesToBeIgnored(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->assertEquals(
            [
                1,
                3,
                4,
                5,
                7,
                8,
                9,
                10,
                11,
                12,
                13,
                14,
                15,
                16,
                17,
                18,
                19,
                20,
                21,
                22,
                23,
                24,
                25,
                26,
                27,
                28,
                30,
                32,
                33,
                34,
                35,
                36,
                37,
<<<<<<< HEAD
                38
=======
                38,
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            ],
            $this->getLinesToBeIgnored()->invoke(
                $this->coverage,
                TEST_FILES_PATH . 'source_with_ignore.php'
            )
        );
    }

<<<<<<< HEAD
    public function testGetLinesToBeIgnored2()
=======
    public function testGetLinesToBeIgnored2(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->assertEquals(
            [1, 5],
            $this->getLinesToBeIgnored()->invoke(
                $this->coverage,
                TEST_FILES_PATH . 'source_without_ignore.php'
            )
        );
    }

<<<<<<< HEAD
    public function testGetLinesToBeIgnored3()
=======
    public function testGetLinesToBeIgnored3(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->assertEquals(
            [
                1,
                2,
                3,
                4,
                5,
                8,
                11,
                15,
                16,
                19,
<<<<<<< HEAD
                20
=======
                20,
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            ],
            $this->getLinesToBeIgnored()->invoke(
                $this->coverage,
                TEST_FILES_PATH . 'source_with_class_and_anonymous_function.php'
            )
        );
    }

<<<<<<< HEAD
    public function testGetLinesToBeIgnoredOneLineAnnotations()
=======
    public function testGetLinesToBeIgnoredOneLineAnnotations(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->assertEquals(
            [
                1,
                2,
                3,
                4,
                5,
                6,
                7,
                8,
                9,
                10,
                11,
                14,
                15,
                16,
                18,
                20,
                21,
                23,
                24,
                25,
                27,
                28,
                29,
                30,
                31,
                32,
                33,
                34,
<<<<<<< HEAD
                37
=======
                37,
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            ],
            $this->getLinesToBeIgnored()->invoke(
                $this->coverage,
                TEST_FILES_PATH . 'source_with_oneline_annotations.php'
            )
        );
    }

<<<<<<< HEAD
    /**
     * @return \ReflectionMethod
     */
    private function getLinesToBeIgnored()
    {
        $getLinesToBeIgnored = new \ReflectionMethod(
            'SebastianBergmann\CodeCoverage\CodeCoverage',
            'getLinesToBeIgnored'
        );

        $getLinesToBeIgnored->setAccessible(true);

        return $getLinesToBeIgnored;
    }

    public function testGetLinesToBeIgnoredWhenIgnoreIsDisabled()
=======
    public function testGetLinesToBeIgnoredWhenIgnoreIsDisabled(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->coverage->setDisableIgnoredLines(true);

        $this->assertEquals(
            [
                7,
                11,
                12,
                13,
                16,
                17,
                18,
                19,
                20,
                21,
                22,
                23,
                26,
                27,
                32,
                33,
                34,
                35,
                36,
<<<<<<< HEAD
                37
=======
                37,
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            ],
            $this->getLinesToBeIgnored()->invoke(
                $this->coverage,
                TEST_FILES_PATH . 'source_with_ignore.php'
            )
        );
    }

<<<<<<< HEAD
    public function testAppendThrowsExceptionIfCoveredCodeWasNotExecuted()
=======
    public function testUseStatementsAreIgnored(): void
    {
        $this->assertEquals(
            [
                1,
                2,
                3,
                4,
                5,
                6,
                7,
                8,
                9,
                10,
                13,
                16,
                23,
                24,
            ],
            $this->getLinesToBeIgnored()->invoke(
                $this->coverage,
                TEST_FILES_PATH . 'source_with_use_statements.php'
            )
        );
    }

    public function testAppendThrowsExceptionIfCoveredCodeWasNotExecuted(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->coverage->filter()->addDirectoryToWhitelist(TEST_FILES_PATH);
        $this->coverage->setCheckForUnexecutedCoveredCode(true);

        $data = [
            TEST_FILES_PATH . 'BankAccount.php' => [
                29 => -1,
<<<<<<< HEAD
                31 => -1
            ]
=======
                31 => -1,
            ],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        ];

        $linesToBeCovered = [
            TEST_FILES_PATH . 'BankAccount.php' => [
                22,
<<<<<<< HEAD
                24
            ]
=======
                24,
            ],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        ];

        $linesToBeUsed = [];

        $this->expectException(CoveredCodeNotExecutedException::class);

        $this->coverage->append($data, 'File1.php', true, $linesToBeCovered, $linesToBeUsed);
    }

<<<<<<< HEAD
    public function testAppendThrowsExceptionIfUsedCodeWasNotExecuted()
=======
    public function testAppendThrowsExceptionIfUsedCodeWasNotExecuted(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->coverage->filter()->addDirectoryToWhitelist(TEST_FILES_PATH);
        $this->coverage->setCheckForUnexecutedCoveredCode(true);

        $data = [
            TEST_FILES_PATH . 'BankAccount.php' => [
                29 => -1,
<<<<<<< HEAD
                31 => -1
            ]
=======
                31 => -1,
            ],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        ];

        $linesToBeCovered = [
            TEST_FILES_PATH . 'BankAccount.php' => [
                29,
<<<<<<< HEAD
                31
            ]
=======
                31,
            ],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        ];

        $linesToBeUsed = [
            TEST_FILES_PATH . 'BankAccount.php' => [
                22,
<<<<<<< HEAD
                24
            ]
=======
                24,
            ],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        ];

        $this->expectException(CoveredCodeNotExecutedException::class);

        $this->coverage->append($data, 'File1.php', true, $linesToBeCovered, $linesToBeUsed);
    }
<<<<<<< HEAD
=======

    /**
     * @return \ReflectionMethod
     */
    private function getLinesToBeIgnored()
    {
        $getLinesToBeIgnored = new \ReflectionMethod(
            'SebastianBergmann\CodeCoverage\CodeCoverage',
            'getLinesToBeIgnored'
        );

        $getLinesToBeIgnored->setAccessible(true);

        return $getLinesToBeIgnored;
    }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
