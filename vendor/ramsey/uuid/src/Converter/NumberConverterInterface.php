<?php
/**
 * This file is part of the ramsey/uuid library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license http://opensource.org/licenses/MIT MIT
 * @link https://benramsey.com/projects/ramsey-uuid/ Documentation
 * @link https://packagist.org/packages/ramsey/uuid Packagist
 * @link https://github.com/ramsey/uuid GitHub
 */

namespace Ramsey\Uuid\Converter;

<<<<<<< HEAD
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/**
 * NumberConverterInterface converts UUIDs from hexadecimal characters into
 * representations of integers and vice versa
 */
interface NumberConverterInterface
{
    /**
     * Converts a hexadecimal number into an integer representation of the number
     *
     * The integer representation returned may be an object or a string
     * representation of the integer, depending on the implementation.
     *
     * @param string $hex The hexadecimal string representation to convert
     * @return mixed
<<<<<<< HEAD
     * @throws UnsatisfiedDependencyException if `Moontoast\Math\BigNumber` is not present
=======
     * @throws \Ramsey\Uuid\Exception\UnsatisfiedDependencyException if `Moontoast\Math\BigNumber` is not present
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function fromHex($hex);

    /**
     * Converts an integer representation into a hexadecimal string representation
     * of the number
     *
     * @param mixed $integer An integer representation to convert; this may be
     *     a true integer, a string integer, or a object representation that
     *     this converter can understand
     * @return string Hexadecimal string
<<<<<<< HEAD
     * @throws UnsatisfiedDependencyException if `Moontoast\Math\BigNumber` is not present
=======
     * @throws \Ramsey\Uuid\Exception\UnsatisfiedDependencyException if `Moontoast\Math\BigNumber` is not present
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function toHex($integer);
}
