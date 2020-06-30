<?php

namespace Egulias\EmailValidator\Warning;

abstract class Warning
{
    const CODE = 0;
<<<<<<< HEAD

    /**
     * @var string
     */
    protected $message = '';

    /**
     * @var int
     */
    protected $rfcNumber = 0;

    /**
     * @return string
     */
=======
    protected $message;
    protected $rfcNumber;

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function message()
    {
        return $this->message;
    }

<<<<<<< HEAD
    /**
     * @return int
     */
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function code()
    {
        return self::CODE;
    }

<<<<<<< HEAD
    /**
     * @return int
     */
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function RFCNumber()
    {
        return $this->rfcNumber;
    }

    public function __toString()
    {
        return $this->message() . " rfc: " .  $this->rfcNumber . "interal code: " . static::CODE;
    }
}
