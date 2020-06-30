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
use PHPUnit\Runner\NullTestResultCache;

/**
 * @group test-reorder
<<<<<<< HEAD
 */
class NullTestResultCacheTest extends TestCase
=======
 * @small
 */
final class NullTestResultCacheTest extends TestCase
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    public function testHasWorkingStubs(): void
    {
        $cache = new NullTestResultCache;
        $cache->load();
        $cache->persist();

        $this->assertSame(BaseTestRunner::STATUS_UNKNOWN, $cache->getState('testName'));
        $this->assertSame(0.0, $cache->getTime('testName'));
    }
}
