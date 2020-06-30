<?php
<<<<<<< HEAD

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
declare(strict_types=1);

/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
<<<<<<< HEAD
=======
 * @copyright 2010-2018 Mike van Riel<mike@phpdoc.org>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Reflection;

/**
 * Interface for files processed by the ProjectFactory
 */
interface File
{
    /**
     * Returns the content of the file as a string.
     */
<<<<<<< HEAD
    public function getContents() : string;
=======
    public function getContents(): string;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Returns md5 hash of the file.
     */
<<<<<<< HEAD
    public function md5() : string;
=======
    public function md5(): string;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Returns an relative path to the file.
     */
<<<<<<< HEAD
    public function path() : string;
=======
    public function path(): string;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
