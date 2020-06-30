<?php

namespace Egulias\EmailValidator;

use Egulias\EmailValidator\Exception\InvalidEmail;
use Egulias\EmailValidator\Validation\EmailValidation;

class EmailValidator
{
    /**
     * @var EmailLexer
     */
    private $lexer;

    /**
<<<<<<< HEAD
     * @var Warning\Warning[]
     */
    protected $warnings = [];

    /**
     * @var InvalidEmail|null
=======
     * @var array
     */
    protected $warnings;

    /**
     * @var InvalidEmail
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    protected $error;

    public function __construct()
    {
        $this->lexer = new EmailLexer();
    }

    /**
     * @param string          $email
     * @param EmailValidation $emailValidation
     * @return bool
     */
    public function isValid($email, EmailValidation $emailValidation)
    {
        $isValid = $emailValidation->isValid($email, $this->lexer);
        $this->warnings = $emailValidation->getWarnings();
        $this->error = $emailValidation->getError();

        return $isValid;
    }

    /**
     * @return boolean
     */
    public function hasWarnings()
    {
        return !empty($this->warnings);
    }

    /**
     * @return array
     */
    public function getWarnings()
    {
        return $this->warnings;
    }

    /**
<<<<<<< HEAD
     * @return InvalidEmail|null
=======
     * @return InvalidEmail
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function getError()
    {
        return $this->error;
    }
}
