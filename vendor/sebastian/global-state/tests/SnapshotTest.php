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

namespace SebastianBergmann\GlobalState;

use ArrayObject;
=======
namespace SebastianBergmann\GlobalState;

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use PHPUnit\Framework\TestCase;
use SebastianBergmann\GlobalState\TestFixture\BlacklistedInterface;
use SebastianBergmann\GlobalState\TestFixture\SnapshotClass;
use SebastianBergmann\GlobalState\TestFixture\SnapshotTrait;

/**
 * @covers \SebastianBergmann\GlobalState\Snapshot
<<<<<<< HEAD
 */
class SnapshotTest extends TestCase
=======
 *
 * @uses \SebastianBergmann\GlobalState\Blacklist
 */
final class SnapshotTest extends TestCase
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @var Blacklist
     */
    private $blacklist;

<<<<<<< HEAD
    protected function setUp()
    {
        $this->blacklist = $this->createMock(Blacklist::class);
    }

    public function testStaticAttributes()
    {
        $this->blacklist->method('isStaticAttributeBlacklisted')->willReturnCallback(
            function ($class) {
                return $class !== SnapshotClass::class;
            }
        );

        SnapshotClass::init();

=======
    protected function setUp(): void
    {
        $this->blacklist = new Blacklist;
    }

    public function testStaticAttributes(): void
    {
        SnapshotClass::init();

        $this->blacklistAllLoadedClassesExceptSnapshotClass();

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $snapshot = new Snapshot($this->blacklist, false, true, false, false, false, false, false, false, false);

        $expected = [
            SnapshotClass::class => [
<<<<<<< HEAD
                'string'      => 'snapshot',
                'arrayObject' => new ArrayObject([1, 2, 3]),
                'stdClass'    => new \stdClass(),
            ]
=======
                'string'  => 'string',
                'objects' => [new \stdClass],
            ],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        ];

        $this->assertEquals($expected, $snapshot->staticAttributes());
    }

<<<<<<< HEAD
    public function testConstants()
=======
    public function testConstants(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $snapshot = new Snapshot($this->blacklist, false, false, true, false, false, false, false, false, false);

        $this->assertArrayHasKey('GLOBALSTATE_TESTSUITE', $snapshot->constants());
    }

<<<<<<< HEAD
    public function testFunctions()
=======
    public function testFunctions(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $snapshot  = new Snapshot($this->blacklist, false, false, false, true, false, false, false, false, false);
        $functions = $snapshot->functions();

        $this->assertContains('sebastianbergmann\globalstate\testfixture\snapshotfunction', $functions);
        $this->assertNotContains('assert', $functions);
    }

<<<<<<< HEAD
    public function testClasses()
=======
    public function testClasses(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $snapshot = new Snapshot($this->blacklist, false, false, false, false, true, false, false, false, false);
        $classes  = $snapshot->classes();

        $this->assertContains(TestCase::class, $classes);
        $this->assertNotContains(Exception::class, $classes);
    }

<<<<<<< HEAD
    public function testInterfaces()
=======
    public function testInterfaces(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $snapshot   = new Snapshot($this->blacklist, false, false, false, false, false, true, false, false, false);
        $interfaces = $snapshot->interfaces();

        $this->assertContains(BlacklistedInterface::class, $interfaces);
        $this->assertNotContains(\Countable::class, $interfaces);
    }

<<<<<<< HEAD
    public function testTraits()
=======
    public function testTraits(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        \spl_autoload_call('SebastianBergmann\GlobalState\TestFixture\SnapshotTrait');

        $snapshot = new Snapshot($this->blacklist, false, false, false, false, false, false, true, false, false);

        $this->assertContains(SnapshotTrait::class, $snapshot->traits());
    }

<<<<<<< HEAD
    public function testIniSettings()
=======
    public function testIniSettings(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $snapshot    = new Snapshot($this->blacklist, false, false, false, false, false, false, false, true, false);
        $iniSettings = $snapshot->iniSettings();

        $this->assertArrayHasKey('date.timezone', $iniSettings);
        $this->assertEquals('Etc/UTC', $iniSettings['date.timezone']);
    }

<<<<<<< HEAD
    public function testIncludedFiles()
=======
    public function testIncludedFiles(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $snapshot = new Snapshot($this->blacklist, false, false, false, false, false, false, false, false, true);
        $this->assertContains(__FILE__, $snapshot->includedFiles());
    }
<<<<<<< HEAD
=======

    private function blacklistAllLoadedClassesExceptSnapshotClass(): void
    {
        foreach (\get_declared_classes() as $class) {
            if ($class === SnapshotClass::class) {
                continue;
            }

            $this->blacklist->addClass($class);
        }
    }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
