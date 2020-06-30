<?php

namespace Egulias\EmailValidator\Validation;

use Egulias\EmailValidator\Exception\InvalidEmail;

class MultipleErrors extends InvalidEmail
{
    const CODE = 999;
    const REASON = "Accumulated errors for multiple validations";
    /**
<<<<<<< HEAD
     * @var InvalidEmail[]
     */
    private $errors = [];

    /**
     * @param InvalidEmail[] $errors
     */
=======
     * @var array
     */
    private $errors = [];

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function __construct(array $errors)
    {
        $this->errors = $errors;
        parent::__construct();
    }

<<<<<<< HEAD
    /**
     * @return InvalidEmail[]
     */
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function getErrors()
    {
        return $this->errors;
    }
}
