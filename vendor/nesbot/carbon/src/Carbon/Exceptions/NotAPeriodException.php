<?php

/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Carbon\Exceptions;

use Exception;
<<<<<<< HEAD
use InvalidArgumentException as BaseInvalidArgumentException;

class NotAPeriodException extends BaseInvalidArgumentException implements InvalidArgumentException
=======
use InvalidArgumentException;

class NotAPeriodException extends InvalidArgumentException
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * Constructor.
     *
<<<<<<< HEAD
     * @param string         $message
     * @param int            $code
     * @param Exception|null $previous
=======
     * @param string          $message
     * @param int             $code
     * @param \Exception|null $previous
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
