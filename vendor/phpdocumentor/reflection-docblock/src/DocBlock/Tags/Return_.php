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
use phpDocumentor\Reflection\Type;
use phpDocumentor\Reflection\TypeResolver;
use phpDocumentor\Reflection\Types\Context as TypeContext;
use Webmozart\Assert\Assert;

/**
 * Reflection class for a {@}return tag in a Docblock.
 */
<<<<<<< HEAD
final class Return_ extends TagWithType implements Factory\StaticMethod
{
    public function __construct(Type $type, ?Description $description = null)
    {
        $this->name        = 'return';
        $this->type        = $type;
        $this->description = $description;
    }

    public static function create(
        string $body,
        ?TypeResolver $typeResolver = null,
        ?DescriptionFactory $descriptionFactory = null,
        ?TypeContext $context = null
    ) : self {
        Assert::notNull($typeResolver);
        Assert::notNull($descriptionFactory);

        [$type, $description] = self::extractTypeFromBody($body);

        $type        = $typeResolver->resolve($type, $context);
        $description = $descriptionFactory->create($description, $context);
=======
final class Return_ extends BaseTag implements Factory\StaticMethod
{
    protected $name = 'return';

    /** @var Type */
    private $type;

    public function __construct(Type $type, Description $description = null)
    {
        $this->type = $type;
        $this->description = $description;
    }

    /**
     * {@inheritdoc}
     */
    public static function create(
        $body,
        TypeResolver $typeResolver = null,
        DescriptionFactory $descriptionFactory = null,
        TypeContext $context = null
    ) {
        Assert::string($body);
        Assert::allNotNull([$typeResolver, $descriptionFactory]);

        $parts = preg_split('/\s+/Su', $body, 2);

        $type = $typeResolver->resolve(isset($parts[0]) ? $parts[0] : '', $context);
        $description = $descriptionFactory->create(isset($parts[1]) ? $parts[1] : '', $context);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return new static($type, $description);
    }

<<<<<<< HEAD
    public function __toString() : string
    {
        return ($this->type ?: 'mixed') . ' ' . (string) $this->description;
=======
    /**
     * Returns the type section of the variable.
     *
     * @return Type
     */
    public function getType()
    {
        return $this->type;
    }

    public function __toString()
    {
        return $this->type . ' ' . $this->description;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
