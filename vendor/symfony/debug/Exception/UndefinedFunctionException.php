<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Debug\Exception;

<<<<<<< HEAD
@trigger_error(sprintf('The "%s" class is deprecated since Symfony 4.4, use "%s" instead.', UndefinedFunctionException::class, \Symfony\Component\ErrorHandler\Error\UndefinedFunctionError::class), E_USER_DEPRECATED);

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/**
 * Undefined Function Exception.
 *
 * @author Konstanton Myakshin <koc-dp@yandex.ru>
<<<<<<< HEAD
 *
 * @deprecated since Symfony 4.4, use Symfony\Component\ErrorHandler\Error\UndefinedFunctionError instead.
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
class UndefinedFunctionException extends FatalErrorException
{
    public function __construct(string $message, \ErrorException $previous)
    {
        parent::__construct(
            $message,
            $previous->getCode(),
            $previous->getSeverity(),
            $previous->getFile(),
            $previous->getLine(),
            null,
            true,
            null,
            $previous->getPrevious()
        );
        $this->setTrace($previous->getTrace());
    }
}
