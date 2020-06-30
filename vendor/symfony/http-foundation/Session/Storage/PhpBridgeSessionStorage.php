<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage;

<<<<<<< HEAD
use Symfony\Component\HttpFoundation\Session\Storage\Proxy\AbstractProxy;

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/**
 * Allows session to be started by PHP and managed by Symfony.
 *
 * @author Drak <drak@zikula.org>
 */
class PhpBridgeSessionStorage extends NativeSessionStorage
{
    /**
<<<<<<< HEAD
     * @param AbstractProxy|\SessionHandlerInterface|null $handler
=======
     * @param \SessionHandlerInterface|null $handler
     * @param MetadataBag                   $metaBag MetadataBag
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function __construct($handler = null, MetadataBag $metaBag = null)
    {
        if (!\extension_loaded('session')) {
            throw new \LogicException('PHP extension "session" is required.');
        }

        $this->setMetadataBag($metaBag);
        $this->setSaveHandler($handler);
    }

    /**
     * {@inheritdoc}
     */
    public function start()
    {
        if ($this->started) {
            return true;
        }

        $this->loadSession();

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        // clear out the bags and nothing else that may be set
        // since the purpose of this driver is to share a handler
        foreach ($this->bags as $bag) {
            $bag->clear();
        }

        // reconnect the bags to the session
        $this->loadSession();
    }
}
