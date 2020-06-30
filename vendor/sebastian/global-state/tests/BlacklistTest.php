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
use SebastianBergmann\GlobalState\TestFixture\BlacklistedChildClass;
use SebastianBergmann\GlobalState\TestFixture\BlacklistedClass;
use SebastianBergmann\GlobalState\TestFixture\BlacklistedImplementor;
use SebastianBergmann\GlobalState\TestFixture\BlacklistedInterface;

/**
 * @covers \SebastianBergmann\GlobalState\Blacklist
 */
<<<<<<< HEAD
class BlacklistTest extends TestCase
=======
final class BlacklistTest extends TestCase
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @var \SebastianBergmann\GlobalState\Blacklist
     */
    private $blacklist;

<<<<<<< HEAD
    protected function setUp()
=======
    protected function setUp(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->blacklist = new Blacklist;
    }

<<<<<<< HEAD
    public function testGlobalVariableThatIsNotBlacklistedIsNotTreatedAsBlacklisted()
=======
    public function testGlobalVariableThatIsNotBlacklistedIsNotTreatedAsBlacklisted(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->assertFalse($this->blacklist->isGlobalVariableBlacklisted('variable'));
    }

<<<<<<< HEAD
    public function testGlobalVariableCanBeBlacklisted()
=======
    public function testGlobalVariableCanBeBlacklisted(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->blacklist->addGlobalVariable('variable');

        $this->assertTrue($this->blacklist->isGlobalVariableBlacklisted('variable'));
    }

<<<<<<< HEAD
    public function testStaticAttributeThatIsNotBlacklistedIsNotTreatedAsBlacklisted()
=======
    public function testStaticAttributeThatIsNotBlacklistedIsNotTreatedAsBlacklisted(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->assertFalse(
            $this->blacklist->isStaticAttributeBlacklisted(
                BlacklistedClass::class,
                'attribute'
            )
        );
    }

<<<<<<< HEAD
    public function testClassCanBeBlacklisted()
=======
    public function testClassCanBeBlacklisted(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->blacklist->addClass(BlacklistedClass::class);

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                BlacklistedClass::class,
                'attribute'
            )
        );
    }

<<<<<<< HEAD
    public function testSubclassesCanBeBlacklisted()
=======
    public function testSubclassesCanBeBlacklisted(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->blacklist->addSubclassesOf(BlacklistedClass::class);

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                BlacklistedChildClass::class,
                'attribute'
            )
        );
    }

<<<<<<< HEAD
    public function testImplementorsCanBeBlacklisted()
=======
    public function testImplementorsCanBeBlacklisted(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->blacklist->addImplementorsOf(BlacklistedInterface::class);

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                BlacklistedImplementor::class,
                'attribute'
            )
        );
    }

<<<<<<< HEAD
    public function testClassNamePrefixesCanBeBlacklisted()
=======
    public function testClassNamePrefixesCanBeBlacklisted(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->blacklist->addClassNamePrefix('SebastianBergmann\GlobalState');

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                BlacklistedClass::class,
                'attribute'
            )
        );
    }

<<<<<<< HEAD
    public function testStaticAttributeCanBeBlacklisted()
=======
    public function testStaticAttributeCanBeBlacklisted(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->blacklist->addStaticAttribute(
            BlacklistedClass::class,
            'attribute'
        );

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                BlacklistedClass::class,
                'attribute'
            )
        );
    }
}
