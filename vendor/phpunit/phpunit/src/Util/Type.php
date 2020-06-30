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
namespace PHPUnit\Util;

<<<<<<< HEAD
=======
/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
final class Type
{
    public static function isType(string $type): bool
    {
        switch ($type) {
            case 'numeric':
            case 'integer':
            case 'int':
            case 'iterable':
            case 'float':
            case 'string':
            case 'boolean':
            case 'bool':
            case 'null':
            case 'array':
            case 'object':
            case 'resource':
            case 'scalar':
                return true;

            default:
                return false;
        }
    }
<<<<<<< HEAD
=======

    public static function isCloneable(object $object): bool
    {
        try {
            $clone = clone $object;
        } catch (\Throwable $t) {
            return false;
        }

        return $clone instanceof $object;
    }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
