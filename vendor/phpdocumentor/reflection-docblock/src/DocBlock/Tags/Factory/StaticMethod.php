<?php
<<<<<<< HEAD

declare(strict_types=1);

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
<<<<<<< HEAD
=======
 * @copyright 2010-2015 Mike van Riel<mike@phpdoc.org>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Reflection\DocBlock\Tags\Factory;

<<<<<<< HEAD
/**
 * @deprecated This contract is totally covered by Tag contract. Every class using StaticMethod also use Tag
 */
interface StaticMethod
{
    /**
     * @return mixed
     */
    public static function create(string $body);
=======
interface StaticMethod
{
    public static function create($body);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
