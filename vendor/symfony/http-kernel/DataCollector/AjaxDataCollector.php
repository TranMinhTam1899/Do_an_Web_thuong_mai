<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DataCollector;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * AjaxDataCollector.
 *
 * @author Bart van den Burg <bart@burgov.nl>
<<<<<<< HEAD
 *
 * @final since Symfony 4.4
 */
class AjaxDataCollector extends DataCollector
{
    /**
     * {@inheritdoc}
     *
     * @param \Throwable|null $exception
     */
    public function collect(Request $request, Response $response/*, \Throwable $exception = null*/)
=======
 */
class AjaxDataCollector extends DataCollector
{
    public function collect(Request $request, Response $response, \Exception $exception = null)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        // all collecting is done client side
    }

    public function reset()
    {
        // all collecting is done client side
    }

    public function getName()
    {
        return 'ajax';
    }
}
