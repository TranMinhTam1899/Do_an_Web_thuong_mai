<?php

namespace Illuminate\Validation\Concerns;

use Egulias\EmailValidator\EmailLexer;
<<<<<<< HEAD
use Egulias\EmailValidator\Warning\Warning;
use Egulias\EmailValidator\Exception\InvalidEmail;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use Egulias\EmailValidator\Validation\EmailValidation;

class FilterEmailValidation implements EmailValidation
{
    /**
     * Returns true if the given email is valid.
     *
     * @param  string  $email
<<<<<<< HEAD
     * @param  EmailLexer
=======
     * @param  \Egulias\EmailValidator\EmailLexer  $emailLexer
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * @return bool
     */
    public function isValid($email, EmailLexer $emailLexer)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Returns the validation error.
     *
<<<<<<< HEAD
     * @return InvalidEmail|null
=======
     * @return \Egulias\EmailValidator\Exception\InvalidEmail|null
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function getError()
    {
        //
    }

    /**
     * Returns the validation warnings.
     *
<<<<<<< HEAD
     * @return Warning[]
=======
     * @return \Egulias\EmailValidator\Warning\Warning[]
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function getWarnings()
    {
        return [];
    }
}
