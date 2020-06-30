<?php

namespace Egulias\EmailValidator\Validation\Exception;

use Exception;

class EmptyValidationList extends \InvalidArgumentException
{
<<<<<<< HEAD
    /**
    * @param int $code
    */
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function __construct($code = 0, Exception $previous = null)
    {
        parent::__construct("Empty validation list is not allowed", $code, $previous);
    }
}
