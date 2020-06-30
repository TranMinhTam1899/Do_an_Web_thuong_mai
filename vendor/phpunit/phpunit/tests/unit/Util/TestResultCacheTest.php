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
use PHPUnit\Runner\BaseTestRunner;
<<<<<<< HEAD
use PHPUnit\Runner\TestResultCache;

/**
 * @group test-reorder
 */
class TestResultCacheTest extends TestCase
{
    public function testReadsCacheFromProvidedFilename(): void
    {
        $cacheFile = TEST_FILES_PATH . '/MultiDependencyTest_result_cache.txt';
        $cache     = new TestResultCache($cacheFile);
=======
use PHPUnit\Runner\DefaultTestResultCache;

/**
 * @group test-reorder
 * @small
 */
final class TestResultCacheTest extends TestCase
{
    public function testReadsCacheFromProvidedFilename(): void
    {
        $cacheFile = TEST_FILES_PATH . '../end-to-end/execution-order/_files/MultiDependencyTest_result_cache.txt';
        $cache     = new DefaultTestResultCache($cacheFile);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $cache->load();

        $this->assertSame(BaseTestRunner::STATUS_UNKNOWN, $cache->getState(\MultiDependencyTest::class . '::testOne'));
        $this->assertSame(BaseTestRunner::STATUS_SKIPPED, $cache->getState(\MultiDependencyTest::class . '::testFive'));
    }

    public function testDoesClearCacheBeforeLoad(): void
    {
<<<<<<< HEAD
        $cacheFile = TEST_FILES_PATH . '/MultiDependencyTest_result_cache.txt';
        $cache     = new TestResultCache($cacheFile);
=======
        $cacheFile = TEST_FILES_PATH . '../end-to-end/execution-order/_files/MultiDependencyTest_result_cache.txt';
        $cache     = new DefaultTestResultCache($cacheFile);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $cache->setState('someTest', BaseTestRunner::STATUS_FAILURE);

        $this->assertSame(BaseTestRunner::STATUS_UNKNOWN, $cache->getState(\MultiDependencyTest::class . '::testFive'));

        $cache->load();

        $this->assertSame(BaseTestRunner::STATUS_UNKNOWN, $cache->getState(\MultiDependencyTest::class . '::someTest'));
        $this->assertSame(BaseTestRunner::STATUS_SKIPPED, $cache->getState(\MultiDependencyTest::class . '::testFive'));
    }

    public function testShouldNotSerializePassedTestsAsDefectButTimeIsStored(): void
    {
<<<<<<< HEAD
        $cache = new TestResultCache;
=======
        $cache = new DefaultTestResultCache;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $cache->setState('testOne', BaseTestRunner::STATUS_PASSED);
        $cache->setTime('testOne', 123);

        $data = \serialize($cache);
<<<<<<< HEAD
        $this->assertSame('C:30:"PHPUnit\Runner\TestResultCache":64:{a:2:{s:7:"defects";a:0:{}s:5:"times";a:1:{s:7:"testOne";d:123;}}}', $data);
=======
        $this->assertSame('C:37:"PHPUnit\Runner\DefaultTestResultCache":64:{a:2:{s:7:"defects";a:0:{}s:5:"times";a:1:{s:7:"testOne";d:123;}}}', $data);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function testCanPersistCacheToFile(): void
    {
        // Create a cache with one result and store it
        $cacheFile = \tempnam(\sys_get_temp_dir(), 'phpunit_');
<<<<<<< HEAD
        $cache     = new TestResultCache($cacheFile);
=======
        $cache     = new DefaultTestResultCache($cacheFile);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $testName  = 'test' . \uniqid();
        $cache->setState($testName, BaseTestRunner::STATUS_SKIPPED);
        $cache->persist();
        unset($cache);

        // Load the cache we just created
<<<<<<< HEAD
        $loadedCache = new TestResultCache($cacheFile);
=======
        $loadedCache = new DefaultTestResultCache($cacheFile);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $loadedCache->load();
        $this->assertSame(BaseTestRunner::STATUS_SKIPPED, $loadedCache->getState($testName));

        // Clean up
        \unlink($cacheFile);
    }

    public function testShouldReturnEmptyCacheWhenFileDoesNotExist(): void
    {
<<<<<<< HEAD
        $cache = new TestResultCache('/a/wrong/path/file');
=======
        $cache = new DefaultTestResultCache('/a/wrong/path/file');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $cache->load();

        $this->assertTrue($this->isSerializedEmptyCache(\serialize($cache)));
    }

    public function testShouldReturnEmptyCacheFromInvalidFile(): void
    {
        $cacheFile = \tempnam(\sys_get_temp_dir(), 'phpunit_');
        \file_put_contents($cacheFile, '<certainly not serialized php>');

<<<<<<< HEAD
        $cache = new TestResultCache($cacheFile);
=======
        $cache = new DefaultTestResultCache($cacheFile);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $cache->load();

        $this->assertTrue($this->isSerializedEmptyCache(\serialize($cache)));
    }

    public function isSerializedEmptyCache(string $data): bool
    {
<<<<<<< HEAD
        return $data === 'C:30:"PHPUnit\Runner\TestResultCache":44:{a:2:{s:7:"defects";a:0:{}s:5:"times";a:0:{}}}';
=======
        return $data === 'C:37:"PHPUnit\Runner\DefaultTestResultCache":44:{a:2:{s:7:"defects";a:0:{}s:5:"times";a:0:{}}}';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
