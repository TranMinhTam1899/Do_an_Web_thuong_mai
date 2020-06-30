<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/*
 * This file is part of sebastian/global-state.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD

declare(strict_types=1);

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
namespace SebastianBergmann\GlobalState;

use PHPUnit\Framework\TestCase;

/**
<<<<<<< HEAD
 * Class Restorer.
 */
class RestorerTest extends TestCase
{
    public static function setUpBeforeClass()
=======
 * @covers \SebastianBergmann\GlobalState\Restorer
 *
 * @uses \SebastianBergmann\GlobalState\Blacklist
 * @uses \SebastianBergmann\GlobalState\Snapshot
 */
final class RestorerTest extends TestCase
{
    public static function setUpBeforeClass(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $GLOBALS['varBool'] = false;
        $GLOBALS['varNull'] = null;
        $_GET['varGet']     = 0;
    }

<<<<<<< HEAD
    /**
     * Check global variables are correctly backuped and restored (unit test).
     *
     * @covers \SebastianBergmann\GlobalState\Restorer::restoreGlobalVariables
     * @covers \SebastianBergmann\GlobalState\Restorer::restoreSuperGlobalArray
     *
     * @uses \SebastianBergmann\GlobalState\Blacklist::isGlobalVariableBlacklisted
     * @uses \SebastianBergmann\GlobalState\Snapshot::__construct
     * @uses \SebastianBergmann\GlobalState\Snapshot::blacklist
     * @uses \SebastianBergmann\GlobalState\Snapshot::canBeSerialized
     * @uses \SebastianBergmann\GlobalState\Snapshot::globalVariables
     * @uses \SebastianBergmann\GlobalState\Snapshot::setupSuperGlobalArrays
     * @uses \SebastianBergmann\GlobalState\Snapshot::snapshotGlobals
     * @uses \SebastianBergmann\GlobalState\Snapshot::snapshotSuperGlobalArray
     * @uses \SebastianBergmann\GlobalState\Snapshot::superGlobalArrays
     * @uses \SebastianBergmann\GlobalState\Snapshot::superGlobalVariables
     */
    public function testRestorerGlobalVariable()
=======
    public function testRestorerGlobalVariable(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $snapshot = new Snapshot(null, true, false, false, false, false, false, false, false, false);
        $restorer = new Restorer;
        $restorer->restoreGlobalVariables($snapshot);

        $this->assertArrayHasKey('varBool', $GLOBALS);
        $this->assertEquals(false, $GLOBALS['varBool']);
        $this->assertArrayHasKey('varNull', $GLOBALS);
        $this->assertEquals(null, $GLOBALS['varNull']);
        $this->assertArrayHasKey('varGet', $_GET);
        $this->assertEquals(0, $_GET['varGet']);
    }

    /**
<<<<<<< HEAD
     * Check global variables are correctly backuped and restored.
     *
     * The real test is the second, but the first has to be executed to backup the globals.
     *
     * @backupGlobals enabled
     * @covers \SebastianBergmann\GlobalState\Restorer::restoreGlobalVariables
     * @covers \SebastianBergmann\GlobalState\Restorer::restoreSuperGlobalArray
     *
     * @uses \SebastianBergmann\GlobalState\Blacklist::addClassNamePrefix
     * @uses \SebastianBergmann\GlobalState\Blacklist::isGlobalVariableBlacklisted
     * @uses \SebastianBergmann\GlobalState\Snapshot::__construct
     * @uses \SebastianBergmann\GlobalState\Snapshot::blacklist
     * @uses \SebastianBergmann\GlobalState\Snapshot::canBeSerialized
     * @uses \SebastianBergmann\GlobalState\Snapshot::globalVariables
     * @uses \SebastianBergmann\GlobalState\Snapshot::setupSuperGlobalArrays
     * @uses \SebastianBergmann\GlobalState\Snapshot::snapshotGlobals
     * @uses \SebastianBergmann\GlobalState\Snapshot::snapshotSuperGlobalArray
     * @uses \SebastianBergmann\GlobalState\Snapshot::superGlobalArrays
     * @uses \SebastianBergmann\GlobalState\Snapshot::superGlobalVariables
     */
    public function testIntegrationRestorerGlobalVariables()
=======
     * @backupGlobals enabled
     */
    public function testIntegrationRestorerGlobalVariables(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->assertArrayHasKey('varBool', $GLOBALS);
        $this->assertEquals(false, $GLOBALS['varBool']);
        $this->assertArrayHasKey('varNull', $GLOBALS);
        $this->assertEquals(null, $GLOBALS['varNull']);
        $this->assertArrayHasKey('varGet', $_GET);
        $this->assertEquals(0, $_GET['varGet']);
    }

    /**
<<<<<<< HEAD
     * Check global variables are correctly backuped and restored.
     *
     * @depends testIntegrationRestorerGlobalVariables
     */
    public function testIntegrationRestorerGlobalVariables2()
=======
     * @depends testIntegrationRestorerGlobalVariables
     */
    public function testIntegrationRestorerGlobalVariables2(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->assertArrayHasKey('varBool', $GLOBALS);
        $this->assertEquals(false, $GLOBALS['varBool']);
        $this->assertArrayHasKey('varNull', $GLOBALS);
        $this->assertEquals(null, $GLOBALS['varNull']);
        $this->assertArrayHasKey('varGet', $_GET);
        $this->assertEquals(0, $_GET['varGet']);
    }
}
