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

namespace phpDocumentor\Reflection\DocBlock;

use phpDocumentor\Reflection\DocBlock\Tags\Formatter;

interface Tag
{
<<<<<<< HEAD
    public function getName() : string;

    /**
     * @return Tag|mixed Class that implements Tag
     *
     * @phpstan-return ?Tag
     */
    public static function create(string $body);

    public function render(?Formatter $formatter = null) : string;

    public function __toString() : string;
=======
    public function getName();

    public static function create($body);

    public function render(Formatter $formatter = null);

    public function __toString();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
