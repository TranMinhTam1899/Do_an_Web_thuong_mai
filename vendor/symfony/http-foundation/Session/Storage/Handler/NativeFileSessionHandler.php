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
 * Native session handler using PHP's built in file storage.
 *
 * @author Drak <drak@zikula.org>
 */
class NativeFileSessionHandler extends \SessionHandler
{
    /**
     * @param string $savePath Path of directory to save session files
     *                         Default null will leave setting as defined by PHP.
     *                         '/path', 'N;/path', or 'N;octal-mode;/path
     *
     * @see https://php.net/session.configuration#ini.session.save-path for further details.
     *
     * @throws \InvalidArgumentException On invalid $savePath
     * @throws \RuntimeException         When failing to create the save directory
     */
    public function __construct(string $savePath = null)
    {
        if (null === $savePath) {
            $savePath = ini_get('session.save_path');
        }

        $baseDir = $savePath;

        if ($count = substr_count($savePath, ';')) {
            if ($count > 2) {
<<<<<<< HEAD
                throw new \InvalidArgumentException(sprintf('Invalid argument $savePath \'%s\'.', $savePath));
=======
                throw new \InvalidArgumentException(sprintf('Invalid argument $savePath \'%s\'', $savePath));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            }

            // characters after last ';' are the path
            $baseDir = ltrim(strrchr($savePath, ';'), ';');
        }

        if ($baseDir && !is_dir($baseDir) && !@mkdir($baseDir, 0777, true) && !is_dir($baseDir)) {
<<<<<<< HEAD
            throw new \RuntimeException(sprintf('Session Storage was not able to create directory "%s".', $baseDir));
=======
            throw new \RuntimeException(sprintf('Session Storage was not able to create directory "%s"', $baseDir));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        ini_set('session.save_path', $savePath);
        ini_set('session.save_handler', 'files');
    }
}
