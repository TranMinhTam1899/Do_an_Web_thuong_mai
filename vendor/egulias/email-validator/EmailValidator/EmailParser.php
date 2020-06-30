<?php

namespace Egulias\EmailValidator;

use Egulias\EmailValidator\Exception\ExpectingATEXT;
use Egulias\EmailValidator\Exception\NoLocalPart;
use Egulias\EmailValidator\Parser\DomainPart;
use Egulias\EmailValidator\Parser\LocalPart;
use Egulias\EmailValidator\Warning\EmailTooLong;

/**
 * EmailParser
 *
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
class EmailParser
{
    const EMAIL_MAX_LENGTH = 254;

<<<<<<< HEAD
    /**
     * @var array
     */
    protected $warnings = [];

    /**
     * @var string
     */
    protected $domainPart = '';

    /**
     * @var string
     */
    protected $localPart = '';
    /**
     * @var EmailLexer
     */
    protected $lexer;

    /**
     * @var LocalPart
     */
    protected $localPartParser;

    /**
     * @var DomainPart
     */
=======
    protected $warnings;
    protected $domainPart = '';
    protected $localPart = '';
    protected $lexer;
    protected $localPartParser;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    protected $domainPartParser;

    public function __construct(EmailLexer $lexer)
    {
        $this->lexer = $lexer;
        $this->localPartParser = new LocalPart($this->lexer);
        $this->domainPartParser = new DomainPart($this->lexer);
<<<<<<< HEAD
=======
        $this->warnings = new \SplObjectStorage();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * @param string $str
     * @return array
     */
    public function parse($str)
    {
        $this->lexer->setInput($str);

        if (!$this->hasAtToken()) {
            throw new NoLocalPart();
        }


        $this->localPartParser->parse($str);
        $this->domainPartParser->parse($str);

        $this->setParts($str);

        if ($this->lexer->hasInvalidTokens()) {
            throw new ExpectingATEXT();
        }

        return array('local' => $this->localPart, 'domain' => $this->domainPart);
    }

<<<<<<< HEAD
    /**
     * @return Warning\Warning[]
     */
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function getWarnings()
    {
        $localPartWarnings = $this->localPartParser->getWarnings();
        $domainPartWarnings = $this->domainPartParser->getWarnings();
        $this->warnings = array_merge($localPartWarnings, $domainPartWarnings);

        $this->addLongEmailWarning($this->localPart, $this->domainPart);

        return $this->warnings;
    }

<<<<<<< HEAD
    /**
     * @return string
     */
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function getParsedDomainPart()
    {
        return $this->domainPart;
    }

<<<<<<< HEAD
    /**
     * @param string $email
     */
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    protected function setParts($email)
    {
        $parts = explode('@', $email);
        $this->domainPart = $this->domainPartParser->getDomainPart();
        $this->localPart = $parts[0];
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    protected function hasAtToken()
    {
        $this->lexer->moveNext();
        $this->lexer->moveNext();
        if ($this->lexer->token['type'] === EmailLexer::S_AT) {
            return false;
        }

        return true;
    }

    /**
     * @param string $localPart
     * @param string $parsedDomainPart
     */
    protected function addLongEmailWarning($localPart, $parsedDomainPart)
    {
        if (strlen($localPart . '@' . $parsedDomainPart) > self::EMAIL_MAX_LENGTH) {
            $this->warnings[EmailTooLong::CODE] = new EmailTooLong();
        }
    }
}
