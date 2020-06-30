<?php

namespace Egulias\EmailValidator\Validation;

use Egulias\EmailValidator\EmailLexer;
use Egulias\EmailValidator\Exception\InvalidEmail;
use Egulias\EmailValidator\Validation\Error\SpoofEmail;
use \Spoofchecker;

class SpoofCheckValidation implements EmailValidation
{
    /**
<<<<<<< HEAD
     * @var InvalidEmail|null
=======
     * @var InvalidEmail
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    private $error;

    public function __construct()
    {
        if (!extension_loaded('intl')) {
            throw new \LogicException(sprintf('The %s class requires the Intl extension.', __CLASS__));
        }
    }

<<<<<<< HEAD
    /**
     * @psalm-suppress InvalidArgument
     */
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function isValid($email, EmailLexer $emailLexer)
    {
        $checker = new Spoofchecker();
        $checker->setChecks(Spoofchecker::SINGLE_SCRIPT);

        if ($checker->isSuspicious($email)) {
            $this->error = new SpoofEmail();
        }

        return $this->error === null;
    }

<<<<<<< HEAD
    /**
     * @return InvalidEmail|null
     */
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function getError()
    {
        return $this->error;
    }

    public function getWarnings()
    {
        return [];
    }
}
