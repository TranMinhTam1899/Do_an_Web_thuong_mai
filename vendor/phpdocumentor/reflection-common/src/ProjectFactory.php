<?php
<<<<<<< HEAD

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
declare(strict_types=1);

/**
 * phpDocumentor
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
<<<<<<< HEAD
=======
 * @copyright 2010-2018 Mike van Riel / Naenius (http://www.naenius.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Reflection;

/**
 * Interface for project factories. A project factory shall convert a set of files
 * into an object implementing the Project interface.
 */
interface ProjectFactory
{
    /**
     * Creates a project from the set of files.
     *
<<<<<<< HEAD
     * @param File[] $files
     */
    public function create(string $name, array $files) : Project;
=======
     * @param string $name
     * @param File[] $files
     * @return Project
     */
    public function create($name, array $files): Project;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
