<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Event;

/**
 * Allows to filter a Response object.
 *
 * You can call getResponse() to retrieve the current response. With
 * setResponse() you can set a new response that will be returned to the
 * browser.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
<<<<<<< HEAD
 *
 * @final since Symfony 4.4
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
class ResponseEvent extends FilterResponseEvent
{
}
