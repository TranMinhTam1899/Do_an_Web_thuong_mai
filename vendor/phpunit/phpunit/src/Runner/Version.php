<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Runner;

use SebastianBergmann\Version as VersionId;

<<<<<<< HEAD
/**
 * This class defines the current version of PHPUnit.
 */
class Version
{
    private static $pharVersion;

    private static $version;
=======
final class Version
{
    /**
     * @var string
     */
    private static $pharVersion = '';

    /**
     * @var string
     */
    private static $version = '';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Returns the current version of PHPUnit.
     */
    public static function id(): string
    {
<<<<<<< HEAD
        if (self::$pharVersion !== null) {
            return self::$pharVersion;
        }

        if (self::$version === null) {
            $version       = new VersionId('7.5.20', \dirname(__DIR__, 2));
            self::$version = $version->getVersion();
=======
        if (self::$pharVersion !== '') {
            return self::$pharVersion;
        }

        if (self::$version === '') {
            self::$version = (new VersionId('8.4.1', \dirname(__DIR__, 2)))->getVersion();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return self::$version;
    }

    public static function series(): string
    {
        if (\strpos(self::id(), '-')) {
            $version = \explode('-', self::id())[0];
        } else {
            $version = self::id();
        }

        return \implode('.', \array_slice(\explode('.', $version), 0, 2));
    }

    public static function getVersionString(): string
    {
        return 'PHPUnit ' . self::id() . ' by Sebastian Bergmann and contributors.';
    }

    public static function getReleaseChannel(): string
    {
        if (\strpos(self::$pharVersion, '-') !== false) {
            return '-nightly';
        }

        return '';
    }
}
