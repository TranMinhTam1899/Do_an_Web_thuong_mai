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
 * Can be used in unit testing or in a situations where persisted sessions are not desired.
 *
 * @author Drak <drak@zikula.org>
 */
class NullSessionHandler extends AbstractSessionHandler
{
    /**
<<<<<<< HEAD
     * @return bool
=======
     * {@inheritdoc}
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function close()
    {
        return true;
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
        return true;
    }

    /**
     * {@inheritdoc}
     */
    protected function doRead($sessionId)
    {
        return '';
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
        return true;
    }

    /**
     * {@inheritdoc}
     */
    protected function doWrite($sessionId, $data)
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    protected function doDestroy($sessionId)
    {
        return true;
    }

    /**
     * @return bool
     */
    public function gc($maxlifetime)
    {
        return true;
    }
}
