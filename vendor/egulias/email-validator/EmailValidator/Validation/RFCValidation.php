<?php

namespace Egulias\EmailValidator\Validation;

use Egulias\EmailValidator\EmailLexer;
use Egulias\EmailValidator\EmailParser;
use Egulias\EmailValidator\Exception\InvalidEmail;

class RFCValidation implements EmailValidation
{
    /**
<<<<<<< HEAD
     * @var EmailParser|null
=======
     * @var EmailParser
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    private $parser;

    /**
     * @var array
     */
    private $warnings = [];

    /**
<<<<<<< HEAD
     * @var InvalidEmail|null
=======
     * @var InvalidEmail
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    private $error;

    public function isValid($email, EmailLexer $emailLexer)
    {
        $this->parser = new EmailParser($emailLexer);
        try {
            $this->parser->parse((string)$email);
        } catch (InvalidEmail $invalid) {
            $this->error = $invalid;
            return false;
        }

        $this->warnings = $this->parser->getWarnings();
        return true;
    }

    public function getError()
    {
        return $this->error;
    }

    public function getWarnings()
    {
        return $this->warnings;
    }
}
