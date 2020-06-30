<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Loader\DependencyInjection;

use Psr\Container\ContainerInterface;
<<<<<<< HEAD
use Symfony\Component\Routing\Loader\ContainerLoader;
use Symfony\Component\Routing\Loader\ObjectRouteLoader;

@trigger_error(sprintf('The "%s" class is deprecated since Symfony 4.4, use "%s" instead.', ServiceRouterLoader::class, ContainerLoader::class), E_USER_DEPRECATED);

=======
use Symfony\Component\Routing\Loader\ObjectRouteLoader;

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/**
 * A route loader that executes a service to load the routes.
 *
 * @author Ryan Weaver <ryan@knpuniversity.com>
<<<<<<< HEAD
 *
 * @deprecated since Symfony 4.4, use Symfony\Component\Routing\Loader\ContainerLoader instead.
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
class ServiceRouterLoader extends ObjectRouteLoader
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    protected function getServiceObject($id)
    {
        return $this->container->get($id);
    }
}
