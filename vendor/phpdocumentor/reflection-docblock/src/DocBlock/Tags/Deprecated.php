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

namespace phpDocumentor\Reflection\DocBlock\Tags;

use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\DescriptionFactory;
use phpDocumentor\Reflection\Types\Context as TypeContext;
use Webmozart\Assert\Assert;
<<<<<<< HEAD
use function preg_match;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * Reflection class for a {@}deprecated tag in a Docblock.
 */
final class Deprecated extends BaseTag implements Factory\StaticMethod
{
<<<<<<< HEAD
    /** @var string */
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    protected $name = 'deprecated';

    /**
     * PCRE regular expression matching a version vector.
     * Assumes the "x" modifier.
     */
<<<<<<< HEAD
    public const REGEX_VECTOR = '(?:
=======
    const REGEX_VECTOR = '(?:
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        # Normal release vectors.
        \d\S*
        |
        # VCS version vectors. Per PHPCS, they are expected to
        # follow the form of the VCS name, followed by ":", followed
        # by the version vector itself.
        # By convention, popular VCSes like CVS, SVN and GIT use "$"
        # around the actual version vector.
        [^\s\:]+\:\s*\$[^\$]+\$
    )';

<<<<<<< HEAD
    /** @var string|null The version vector. */
    private $version;

    public function __construct(?string $version = null, ?Description $description = null)
    {
        Assert::nullOrStringNotEmpty($version);

        $this->version     = $version;
=======
    /** @var string The version vector. */
    private $version = '';

    public function __construct($version = null, Description $description = null)
    {
        Assert::nullOrStringNotEmpty($version);

        $this->version = $version;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $this->description = $description;
    }

    /**
     * @return static
     */
<<<<<<< HEAD
    public static function create(
        ?string $body,
        ?DescriptionFactory $descriptionFactory = null,
        ?TypeContext $context = null
    ) : self {
=======
    public static function create($body, DescriptionFactory $descriptionFactory = null, TypeContext $context = null)
    {
        Assert::nullOrString($body);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        if (empty($body)) {
            return new static();
        }

        $matches = [];
        if (!preg_match('/^(' . self::REGEX_VECTOR . ')\s*(.+)?$/sux', $body, $matches)) {
            return new static(
                null,
<<<<<<< HEAD
                $descriptionFactory !== null ? $descriptionFactory->create($body, $context) : null
            );
        }

        Assert::notNull($descriptionFactory);

        return new static(
            $matches[1],
            $descriptionFactory->create($matches[2] ?? '', $context)
=======
                null !== $descriptionFactory ? $descriptionFactory->create($body, $context) : null
            );
        }

        return new static(
            $matches[1],
            $descriptionFactory->create(isset($matches[2]) ? $matches[2] : '', $context)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );
    }

    /**
     * Gets the version section of the tag.
<<<<<<< HEAD
     */
    public function getVersion() : ?string
=======
     *
     * @return string
     */
    public function getVersion()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->version;
    }

    /**
     * Returns a string representation for this tag.
<<<<<<< HEAD
     */
    public function __toString() : string
    {
        return ($this->version ?? '') . ($this->description ? ' ' . $this->description->render() : '');
=======
     *
     * @return string
     */
    public function __toString()
    {
        return $this->version . ($this->description ? ' ' . $this->description->render() : '');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
