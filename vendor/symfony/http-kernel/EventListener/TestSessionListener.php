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

/**
 * Sets the session in the request.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @final
 */
class TestSessionListener extends AbstractTestSessionListener
{
    private $container;

    public function __construct(ContainerInterface $container, array $sessionOptions = [])
    {
        $this->container = $container;
        parent::__construct($sessionOptions);
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

        return $this->container->get('session');
    }
}
