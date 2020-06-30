<?php declare(strict_types=1);

namespace PhpParser\Node\Stmt;

use PhpParser\Node;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\NullableType;
<<<<<<< HEAD
use PhpParser\Node\UnionType;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

class Property extends Node\Stmt
{
    /** @var int Modifiers */
    public $flags;
    /** @var PropertyProperty[] Properties */
    public $props;
<<<<<<< HEAD
    /** @var null|Identifier|Name|NullableType|UnionType Type declaration */
=======
    /** @var null|Identifier|Name|NullableType Type declaration */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public $type;

    /**
     * Constructs a class property list node.
     *
<<<<<<< HEAD
     * @param int                                                $flags      Modifiers
     * @param PropertyProperty[]                                 $props      Properties
     * @param array                                              $attributes Additional attributes
     * @param null|string|Identifier|Name|NullableType|UnionType $type       Type declaration
=======
     * @param int                                      $flags      Modifiers
     * @param PropertyProperty[]                       $props      Properties
     * @param array                                    $attributes Additional attributes
     * @param null|string|Identifier|Name|NullableType $type       Type declaration
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function __construct(int $flags, array $props, array $attributes = [], $type = null) {
        $this->attributes = $attributes;
        $this->flags = $flags;
        $this->props = $props;
        $this->type = \is_string($type) ? new Identifier($type) : $type;
    }

    public function getSubNodeNames() : array {
        return ['flags', 'type', 'props'];
    }

    /**
     * Whether the property is explicitly or implicitly public.
     *
     * @return bool
     */
    public function isPublic() : bool {
        return ($this->flags & Class_::MODIFIER_PUBLIC) !== 0
            || ($this->flags & Class_::VISIBILITY_MODIFIER_MASK) === 0;
    }

    /**
     * Whether the property is protected.
     *
     * @return bool
     */
    public function isProtected() : bool {
        return (bool) ($this->flags & Class_::MODIFIER_PROTECTED);
    }

    /**
     * Whether the property is private.
     *
     * @return bool
     */
    public function isPrivate() : bool {
        return (bool) ($this->flags & Class_::MODIFIER_PRIVATE);
    }

    /**
     * Whether the property is static.
     *
     * @return bool
     */
    public function isStatic() : bool {
        return (bool) ($this->flags & Class_::MODIFIER_STATIC);
    }

    public function getType() : string {
        return 'Stmt_Property';
    }
}
