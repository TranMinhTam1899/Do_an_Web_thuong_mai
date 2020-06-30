<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\File\Exception;

/**
 * Thrown when the access on a file was denied.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class AccessDeniedException extends FileException
{
<<<<<<< HEAD
=======
    /**
     * @param string $path The path to the accessed file
     */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function __construct(string $path)
    {
        parent::__construct(sprintf('The file %s could not be accessed', $path));
    }
}
