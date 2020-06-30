<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\EventListener;

use Psr\Container\ContainerInterface;
<<<<<<< HEAD
use Symfony\Component\HttpFoundation\Session\SessionInterface;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;

/**
 * Sets the session in the request.
 *
 * When the passed container contains a "session_storage" entry which
 * holds a NativeSessionStorage instance, the "cookie_secure" option
 * will be set to true whenever the current master request is secure.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @final
 */
class SessionListener extends AbstractSessionListener
{
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

<<<<<<< HEAD
    protected function getSession(): ?SessionInterface
=======
    protected function getSession()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!$this->container->has('session')) {
            return null;
        }

        if ($this->container->has('session_storage')
            && ($storage = $this->container->get('session_storage')) instanceof NativeSessionStorage
            && ($masterRequest = $this->container->get('request_stack')->getMasterRequest())
            && $masterRequest->isSecure()
        ) {
            $storage->setOptions(['cookie_secure' => true]);
        }

        return $this->container->get('session');
    }
}
