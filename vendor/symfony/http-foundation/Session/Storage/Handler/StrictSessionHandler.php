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
 * Adds basic `SessionUpdateTimestampHandlerInterface` behaviors to another `SessionHandlerInterface`.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class StrictSessionHandler extends AbstractSessionHandler
{
    private $handler;
    private $doDestroy;

    public function __construct(\SessionHandlerInterface $handler)
    {
        if ($handler instanceof \SessionUpdateTimestampHandlerInterface) {
            throw new \LogicException(sprintf('"%s" is already an instance of "SessionUpdateTimestampHandlerInterface", you cannot wrap it with "%s".', \get_class($handler), self::class));
        }

        $this->handler = $handler;
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
        parent::open($savePath, $sessionName);

        return $this->handler->open($savePath, $sessionName);
    }

    /**
     * {@inheritdoc}
     */
    protected function doRead($sessionId)
    {
        return $this->handler->read($sessionId);
    }

    /**
<<<<<<< HEAD
     * @return bool
=======
     * {@inheritdoc}
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function updateTimestamp($sessionId, $data)
    {
        return $this->write($sessionId, $data);
    }

    /**
     * {@inheritdoc}
     */
    protected function doWrite($sessionId, $data)
    {
        return $this->handler->write($sessionId, $data);
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
        $this->doDestroy = true;
        $destroyed = parent::destroy($sessionId);

        return $this->doDestroy ? $this->doDestroy($sessionId) : $destroyed;
    }

    /**
     * {@inheritdoc}
     */
    protected function doDestroy($sessionId)
    {
        $this->doDestroy = false;

        return $this->handler->destroy($sessionId);
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
        return $this->handler->close();
    }

    /**
     * @return bool
     */
    public function gc($maxlifetime)
    {
        return $this->handler->gc($maxlifetime);
    }
}
