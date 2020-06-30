<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage\Handler;

/**
 * Migrating session handler for migrating from one handler to another. It reads
 * from the current handler and writes both the current and new ones.
 *
 * It ignores errors from the new handler.
 *
 * @author Ross Motley <ross.motley@amara.com>
 * @author Oliver Radwell <oliver.radwell@amara.com>
 */
class MigratingSessionHandler implements \SessionHandlerInterface, \SessionUpdateTimestampHandlerInterface
{
    private $currentHandler;
    private $writeOnlyHandler;

    public function __construct(\SessionHandlerInterface $currentHandler, \SessionHandlerInterface $writeOnlyHandler)
    {
        if (!$currentHandler instanceof \SessionUpdateTimestampHandlerInterface) {
            $currentHandler = new StrictSessionHandler($currentHandler);
        }
        if (!$writeOnlyHandler instanceof \SessionUpdateTimestampHandlerInterface) {
            $writeOnlyHandler = new StrictSessionHandler($writeOnlyHandler);
        }

        $this->currentHandler = $currentHandler;
        $this->writeOnlyHandler = $writeOnlyHandler;
    }

    /**
<<<<<<< HEAD
     * @return bool
=======
     * {@inheritdoc}
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function close()
    {
        $result = $this->currentHandler->close();
        $this->writeOnlyHandler->close();

        return $result;
    }

    /**
<<<<<<< HEAD
     * @return bool
=======
     * {@inheritdoc}
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function destroy($sessionId)
    {
        $result = $this->currentHandler->destroy($sessionId);
        $this->writeOnlyHandler->destroy($sessionId);

        return $result;
    }

    /**
     * @return bool
     */
    public function gc($maxlifetime)
    {
        $result = $this->currentHandler->gc($maxlifetime);
        $this->writeOnlyHandler->gc($maxlifetime);

        return $result;
    }

    /**
<<<<<<< HEAD
     * @return bool
=======
     * {@inheritdoc}
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function open($savePath, $sessionName)
    {
        $result = $this->currentHandler->open($savePath, $sessionName);
        $this->writeOnlyHandler->open($savePath, $sessionName);

        return $result;
    }

    /**
<<<<<<< HEAD
     * @return string
=======
     * {@inheritdoc}
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function read($sessionId)
    {
        // No reading from new handler until switch-over
        return $this->currentHandler->read($sessionId);
    }

    /**
<<<<<<< HEAD
     * @return bool
=======
     * {@inheritdoc}
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function write($sessionId, $sessionData)
    {
        $result = $this->currentHandler->write($sessionId, $sessionData);
        $this->writeOnlyHandler->write($sessionId, $sessionData);

        return $result;
    }

    /**
<<<<<<< HEAD
     * @return bool
=======
     * {@inheritdoc}
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function validateId($sessionId)
    {
        // No reading from new handler until switch-over
        return $this->currentHandler->validateId($sessionId);
    }

    /**
<<<<<<< HEAD
     * @return bool
=======
     * {@inheritdoc}
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function updateTimestamp($sessionId, $sessionData)
    {
        $result = $this->currentHandler->updateTimestamp($sessionId, $sessionData);
        $this->writeOnlyHandler->updateTimestamp($sessionId, $sessionData);

        return $result;
    }
}
