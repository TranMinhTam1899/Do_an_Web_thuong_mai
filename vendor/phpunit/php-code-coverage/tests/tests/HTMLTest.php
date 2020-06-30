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

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
namespace SebastianBergmann\CodeCoverage\Report\Html;

use SebastianBergmann\CodeCoverage\TestCase;

class HTMLTest extends TestCase
{
    private static $TEST_REPORT_PATH_SOURCE;

<<<<<<< HEAD
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        self::$TEST_REPORT_PATH_SOURCE = TEST_FILES_PATH . 'Report' . DIRECTORY_SEPARATOR . 'HTML';
    }

    protected function tearDown()
=======
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        self::$TEST_REPORT_PATH_SOURCE = TEST_FILES_PATH . 'Report' . \DIRECTORY_SEPARATOR . 'HTML';
    }

    protected function tearDown(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        parent::tearDown();

        $tmpFilesIterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(self::$TEST_TMP_PATH, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($tmpFilesIterator as $path => $fileInfo) {
            /* @var \SplFileInfo $fileInfo */
            $pathname = $fileInfo->getPathname();
<<<<<<< HEAD
            $fileInfo->isDir() ? rmdir($pathname) : unlink($pathname);
        }
    }

    public function testForBankAccountTest()
    {
        $expectedFilesPath = self::$TEST_REPORT_PATH_SOURCE . DIRECTORY_SEPARATOR . 'CoverageForBankAccount';
=======
            $fileInfo->isDir() ? \rmdir($pathname) : \unlink($pathname);
        }
    }

    public function testForBankAccountTest(): void
    {
        $expectedFilesPath = self::$TEST_REPORT_PATH_SOURCE . \DIRECTORY_SEPARATOR . 'CoverageForBankAccount';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        $report = new Facade;
        $report->process($this->getCoverageForBankAccount(), self::$TEST_TMP_PATH);

        $this->assertFilesEquals($expectedFilesPath, self::$TEST_TMP_PATH);
    }

<<<<<<< HEAD
    public function testForFileWithIgnoredLines()
    {
        $expectedFilesPath = self::$TEST_REPORT_PATH_SOURCE . DIRECTORY_SEPARATOR . 'CoverageForFileWithIgnoredLines';
=======
    public function testForFileWithIgnoredLines(): void
    {
        $expectedFilesPath = self::$TEST_REPORT_PATH_SOURCE . \DIRECTORY_SEPARATOR . 'CoverageForFileWithIgnoredLines';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        $report = new Facade;
        $report->process($this->getCoverageForFileWithIgnoredLines(), self::$TEST_TMP_PATH);

        $this->assertFilesEquals($expectedFilesPath, self::$TEST_TMP_PATH);
    }

<<<<<<< HEAD
    public function testForClassWithAnonymousFunction()
    {
        $expectedFilesPath =
            self::$TEST_REPORT_PATH_SOURCE . DIRECTORY_SEPARATOR . 'CoverageForClassWithAnonymousFunction';
=======
    public function testForClassWithAnonymousFunction(): void
    {
        $expectedFilesPath =
            self::$TEST_REPORT_PATH_SOURCE . \DIRECTORY_SEPARATOR . 'CoverageForClassWithAnonymousFunction';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        $report = new Facade;
        $report->process($this->getCoverageForClassWithAnonymousFunction(), self::$TEST_TMP_PATH);

        $this->assertFilesEquals($expectedFilesPath, self::$TEST_TMP_PATH);
    }

    /**
     * @param string $expectedFilesPath
     * @param string $actualFilesPath
     */
<<<<<<< HEAD
    private function assertFilesEquals($expectedFilesPath, $actualFilesPath)
=======
    private function assertFilesEquals($expectedFilesPath, $actualFilesPath): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $expectedFilesIterator = new \FilesystemIterator($expectedFilesPath);
        $actualFilesIterator   = new \RegexIterator(new \FilesystemIterator($actualFilesPath), '/.html/');

        $this->assertEquals(
<<<<<<< HEAD
            iterator_count($expectedFilesIterator),
            iterator_count($actualFilesIterator),
=======
            \iterator_count($expectedFilesIterator),
            \iterator_count($actualFilesIterator),
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            'Generated files and expected files not match'
        );

        foreach ($expectedFilesIterator as $path => $fileInfo) {
            /* @var \SplFileInfo $fileInfo */
            $filename = $fileInfo->getFilename();

<<<<<<< HEAD
            $actualFile = $actualFilesPath . DIRECTORY_SEPARATOR . $filename;
=======
            $actualFile = $actualFilesPath . \DIRECTORY_SEPARATOR . $filename;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

            $this->assertFileExists($actualFile);

            $this->assertStringMatchesFormatFile(
                $fileInfo->getPathname(),
<<<<<<< HEAD
                str_replace(PHP_EOL, "\n", file_get_contents($actualFile)),
=======
                \str_replace(\PHP_EOL, "\n", \file_get_contents($actualFile)),
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                "${filename} not match"
            );
        }
    }
}
