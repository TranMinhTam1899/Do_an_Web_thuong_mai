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
 * @link http://phpdoc.org
=======
 * @copyright 2010-2015 Mike van Riel<mike@phpdoc.org>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */

namespace phpDocumentor\Reflection\DocBlock\Tags;

<<<<<<< HEAD
use InvalidArgumentException;
use function filter_var;
use function preg_match;
use function trim;
use const FILTER_VALIDATE_EMAIL;
=======
use Webmozart\Assert\Assert;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * Reflection class for an {@}author tag in a Docblock.
 */
final class Author extends BaseTag implements Factory\StaticMethod
{
    /** @var string register that this is the author tag. */
    protected $name = 'author';

    /** @var string The name of the author */
<<<<<<< HEAD
    private $authorName;

    /** @var string The email of the author */
    private $authorEmail;

    /**
     * Initializes this tag with the author name and e-mail.
     */
    public function __construct(string $authorName, string $authorEmail)
    {
        if ($authorEmail && !filter_var($authorEmail, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('The author tag does not have a valid e-mail address');
=======
    private $authorName = '';

    /** @var string The email of the author */
    private $authorEmail = '';

    /**
     * Initializes this tag with the author name and e-mail.
     *
     * @param string $authorName
     * @param string $authorEmail
     */
    public function __construct($authorName, $authorEmail)
    {
        Assert::string($authorName);
        Assert::string($authorEmail);
        if ($authorEmail && !filter_var($authorEmail, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('The author tag does not have a valid e-mail address');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        $this->authorName  = $authorName;
        $this->authorEmail = $authorEmail;
    }

    /**
     * Gets the author's name.
     *
     * @return string The author's name.
     */
<<<<<<< HEAD
    public function getAuthorName() : string
=======
    public function getAuthorName()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->authorName;
    }

    /**
     * Returns the author's email.
     *
     * @return string The author's email.
     */
<<<<<<< HEAD
    public function getEmail() : string
=======
    public function getEmail()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->authorEmail;
    }

    /**
     * Returns this tag in string form.
<<<<<<< HEAD
     */
    public function __toString() : string
    {
        return $this->authorName . ($this->authorEmail !== '' ? ' <' . $this->authorEmail . '>' : '');
=======
     *
     * @return string
     */
    public function __toString()
    {
        return $this->authorName . (strlen($this->authorEmail) ? ' <' . $this->authorEmail . '>' : '');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Attempts to create a new Author object based on †he tag body.
<<<<<<< HEAD
     */
    public static function create(string $body) : ?self
    {
=======
     *
     * @param string $body
     *
     * @return static
     */
    public static function create($body)
    {
        Assert::string($body);

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $splitTagContent = preg_match('/^([^\<]*)(?:\<([^\>]*)\>)?$/u', $body, $matches);
        if (!$splitTagContent) {
            return null;
        }

        $authorName = trim($matches[1]);
<<<<<<< HEAD
        $email      = isset($matches[2]) ? trim($matches[2]) : '';
=======
        $email = isset($matches[2]) ? trim($matches[2]) : '';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return new static($authorName, $email);
    }
}
