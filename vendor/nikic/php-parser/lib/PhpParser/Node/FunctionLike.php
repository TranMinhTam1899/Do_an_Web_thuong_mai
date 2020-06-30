<?php declare(strict_types=1);

namespace PhpParser\Node;

use PhpParser\Node;

interface FunctionLike extends Node
{
    /**
     * Whether to return by reference
     *
     * @return bool
     */
    public function returnsByRef() : bool;

    /**
     * List of parameters
     *
     * @return Node\Param[]
     */
    public function getParams() : array;

    /**
     * Get the declared return type or null
     *
<<<<<<< HEAD
     * @return null|Identifier|Node\Name|Node\NullableType|Node\UnionType
=======
     * @return null|Identifier|Node\Name|Node\NullableType
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function getReturnType();

    /**
     * The function body
     *
     * @return Node\Stmt[]|null
     */
    public function getStmts();
}
