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

namespace Ramsey\Uuid\Generator;

<<<<<<< HEAD
use Exception;
use InvalidArgumentException;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/**
 * RandomGeneratorInterface provides functionality to generate strings of random
 * binary data
 */
interface RandomGeneratorInterface
{
    /**
     * Generates a string of random binary data of the specified length
     *
     * @param integer $length The number of bytes of random binary data to generate
     * @return string A binary string
<<<<<<< HEAD
     * @throws UnsatisfiedDependencyException if `Moontoast\Math\BigNumber` is not present
     * @throws InvalidArgumentException
     * @throws Exception if it was not possible to gather sufficient entropy
=======
     * @throws \Ramsey\Uuid\Exception\UnsatisfiedDependencyException if `Moontoast\Math\BigNumber` is not present
     * @throws \InvalidArgumentException
     * @throws \Exception if it was not possible to gather sufficient entropy
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function generate($length);
}
