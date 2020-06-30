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
class ParentClassWithPrivateAttributes
{
    private static $privateStaticParentAttribute = 'foo';

    private $privateParentAttribute              = 'bar';
}

class ParentClassWithProtectedAttributes extends ParentClassWithPrivateAttributes
{
    protected static $protectedStaticParentAttribute = 'foo';

    protected $protectedParentAttribute              = 'bar';
}

class ClassWithNonPublicAttributes extends ParentClassWithProtectedAttributes
{
    public static $publicStaticAttribute       = 'foo';

    protected static $protectedStaticAttribute = 'bar';

    protected static $privateStaticAttribute   = 'baz';

    public $publicAttribute       = 'foo';

    public $foo                   = 1;

    public $bar                   = 2;

    public $publicArray           = ['foo'];

    protected $protectedAttribute = 'bar';

    protected $privateAttribute   = 'baz';

    protected $protectedArray     = ['bar'];

    protected $privateArray       = ['baz'];
}
