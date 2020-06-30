<?php

namespace Egulias\EmailValidator\Warning;

class QuotedPart extends Warning
{
    const CODE = 36;

<<<<<<< HEAD
    /**
     * @param scalar $prevToken
     * @param scalar $postToken
     */
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function __construct($prevToken, $postToken)
    {
        $this->message = "Deprecated Quoted String found between $prevToken and $postToken";
    }
}
