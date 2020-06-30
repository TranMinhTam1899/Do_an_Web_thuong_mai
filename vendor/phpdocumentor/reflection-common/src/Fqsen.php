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

use InvalidArgumentException;
<<<<<<< HEAD
use function assert;
use function end;
use function explode;
use function is_string;
use function preg_match;
use function sprintf;
use function trim;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * Value Object for Fqsen.
 *
 * @link https://github.com/phpDocumentor/fig-standards/blob/master/proposed/phpdoc-meta.md
<<<<<<< HEAD
 *
 * @psalm-immutable
 */
final class Fqsen
{
    /** @var string full quallified class name */
    private $fqsen;

    /** @var string name of the element without path. */
=======
 */
final class Fqsen
{
    /**
     * @var string full quallified class name
     */
    private $fqsen;

    /**
     * @var string name of the element without path.
     */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    private $name;

    /**
     * Initializes the object.
     *
     * @throws InvalidArgumentException when $fqsen is not matching the format.
     */
    public function __construct(string $fqsen)
    {
        $matches = [];
<<<<<<< HEAD

        $result = preg_match(
            //phpcs:ignore Generic.Files.LineLength.TooLong
=======
        $result = preg_match(
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            '/^\\\\([a-zA-Z_\\x7f-\\xff][a-zA-Z0-9_\\x7f-\\xff\\\\]*)?(?:[:]{2}\\$?([a-zA-Z_\\x7f-\\xff][a-zA-Z0-9_\\x7f-\\xff]*))?(?:\\(\\))?$/',
            $fqsen,
            $matches
        );

        if ($result === 0) {
            throw new InvalidArgumentException(
                sprintf('"%s" is not a valid Fqsen.', $fqsen)
            );
        }

        $this->fqsen = $fqsen;

        if (isset($matches[2])) {
            $this->name = $matches[2];
        } else {
            $matches = explode('\\', $fqsen);
<<<<<<< HEAD
            $name = end($matches);
            assert(is_string($name));
            $this->name = trim($name, '()');
=======
            $this->name = trim(end($matches), '()');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }
    }

    /**
     * converts this class to string.
     */
<<<<<<< HEAD
    public function __toString() : string
=======
    public function __toString(): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->fqsen;
    }

    /**
     * Returns the name of the element without path.
     */
<<<<<<< HEAD
    public function getName() : string
=======
    public function getName(): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->name;
    }
}
