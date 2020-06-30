<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DependencyInjection;

use Symfony\Contracts\Service\ResetInterface;

/**
 * Resets provided services.
 *
 * @author Alexander M. Turek <me@derrabus.de>
 * @author Nicolas Grekas <p@tchwork.com>
 *
 * @internal
 */
class ServicesResetter implements ResetInterface
{
    private $resettableServices;
    private $resetMethods;

    public function __construct(\Traversable $resettableServices, array $resetMethods)
    {
        $this->resettableServices = $resettableServices;
        $this->resetMethods = $resetMethods;
    }

    public function reset()
    {
        foreach ($this->resettableServices as $id => $service) {
<<<<<<< HEAD
            foreach ((array) $this->resetMethods[$id] as $resetMethod) {
                $service->$resetMethod();
            }
=======
            $service->{$this->resetMethods[$id]}();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }
    }
}
