<?php declare(strict_types=1);

namespace PhpParser\Node;

use PhpParser\NodeAbstract;

class Param extends NodeAbstract
{
<<<<<<< HEAD
    /** @var null|Identifier|Name|NullableType|UnionType Type declaration */
=======
    /** @var null|Identifier|Name|NullableType Type declaration */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public $type;
    /** @var bool Whether parameter is passed by reference */
    public $byRef;
    /** @var bool Whether this is a variadic argument */
    public $variadic;
    /** @var Expr\Variable|Expr\Error Parameter variable */
    public $var;
    /** @var null|Expr Default value */
    public $default;

    /**
     * Constructs a parameter node.
     *
<<<<<<< HEAD
     * @param Expr\Variable|Expr\Error                           $var        Parameter variable
     * @param null|Expr                                          $default    Default value
     * @param null|string|Identifier|Name|NullableType|UnionType $type       Type declaration
     * @param bool                                               $byRef      Whether is passed by reference
     * @param bool                                               $variadic   Whether this is a variadic argument
     * @param array                                              $attributes Additional attributes
=======
     * @param Expr\Variable|Expr\Error                 $var        Parameter variable
     * @param null|Expr                                $default    Default value
     * @param null|string|Identifier|Name|NullableType $type       Type declaration
     * @param bool                                     $byRef      Whether is passed by reference
     * @param bool                                     $variadic   Whether this is a variadic argument
     * @param array                                    $attributes Additional attributes
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function __construct(
        $var, Expr $default = null, $type = null,
        bool $byRef = false, bool $variadic = false, array $attributes = []
    ) {
        $this->attributes = $attributes;
        $this->type = \is_string($type) ? new Identifier($type) : $type;
        $this->byRef = $byRef;
        $this->variadic = $variadic;
        $this->var = $var;
        $this->default = $default;
    }

    public function getSubNodeNames() : array {
        return ['type', 'byRef', 'variadic', 'var', 'default'];
    }

    public function getType() : string {
        return 'Param';
    }
}
