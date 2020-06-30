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

use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\DescriptionFactory;
use phpDocumentor\Reflection\Fqsen;
use phpDocumentor\Reflection\FqsenResolver;
use phpDocumentor\Reflection\Types\Context as TypeContext;
use Webmozart\Assert\Assert;
<<<<<<< HEAD
use function preg_split;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * Reflection class for a @covers tag in a Docblock.
 */
final class Covers extends BaseTag implements Factory\StaticMethod
{
<<<<<<< HEAD
    /** @var string */
    protected $name = 'covers';

    /** @var Fqsen */
    private $refers;

    /**
     * Initializes this tag.
     */
    public function __construct(Fqsen $refers, ?Description $description = null)
    {
        $this->refers      = $refers;
        $this->description = $description;
    }

    public static function create(
        string $body,
        ?DescriptionFactory $descriptionFactory = null,
        ?FqsenResolver $resolver = null,
        ?TypeContext $context = null
    ) : self {
        Assert::notEmpty($body);
        Assert::notNull($descriptionFactory);
        Assert::notNull($resolver);

        $parts = preg_split('/\s+/Su', $body, 2);
        Assert::isArray($parts);

        return new static(
            $resolver->resolve($parts[0], $context),
            $descriptionFactory->create($parts[1] ?? '', $context)
=======
    protected $name = 'covers';

    /** @var Fqsen */
    private $refers = null;

    /**
     * Initializes this tag.
     *
     * @param Fqsen $refers
     * @param Description $description
     */
    public function __construct(Fqsen $refers, Description $description = null)
    {
        $this->refers = $refers;
        $this->description = $description;
    }

    /**
     * {@inheritdoc}
     */
    public static function create(
        $body,
        DescriptionFactory $descriptionFactory = null,
        FqsenResolver $resolver = null,
        TypeContext $context = null
    ) {
        Assert::string($body);
        Assert::notEmpty($body);

        $parts = preg_split('/\s+/Su', $body, 2);

        return new static(
            $resolver->resolve($parts[0], $context),
            $descriptionFactory->create(isset($parts[1]) ? $parts[1] : '', $context)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );
    }

    /**
     * Returns the structural element this tag refers to.
<<<<<<< HEAD
     */
    public function getReference() : Fqsen
=======
     *
     * @return Fqsen
     */
    public function getReference()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->refers;
    }

    /**
     * Returns a string representation of this tag.
<<<<<<< HEAD
     */
    public function __toString() : string
=======
     *
     * @return string
     */
    public function __toString()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->refers . ($this->description ? ' ' . $this->description->render() : '');
    }
}
