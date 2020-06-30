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

namespace SebastianBergmann\GlobalState\TestFixture;

use DomDocument;
use ArrayObject;

class SnapshotClass
{
    private static $string = 'snapshot';
    private static $dom;
    private static $closure;
    private static $arrayObject;
    private static $snapshotDomDocument;
    private static $resource;
    private static $stdClass;

    public static function init()
    {
        self::$dom                 = new DomDocument();
        self::$closure             = function () {};
        self::$arrayObject         = new ArrayObject([1, 2, 3]);
        self::$snapshotDomDocument = new SnapshotDomDocument();
        self::$resource            = \fopen('php://memory', 'r');
        self::$stdClass            = new \stdClass();
=======
namespace SebastianBergmann\GlobalState\TestFixture;

class SnapshotClass
{
    private static $string = 'string';

    private static $closures = [];

    private static $files = [];

    private static $resources = [];

    private static $objects = [];

    public static function init(): void
    {
        self::$closures[] = function (): void {
        };

        self::$files[] = new \SplFileInfo(__FILE__);

        self::$resources[] = \fopen('php://memory', 'r');

        self::$objects[] = new \stdClass;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
