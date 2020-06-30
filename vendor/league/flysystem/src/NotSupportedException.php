<?php

namespace League\Flysystem;

use RuntimeException;
use SplFileInfo;

<<<<<<< HEAD
class NotSupportedException extends RuntimeException implements FilesystemException
=======
class NotSupportedException extends RuntimeException
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * Create a new exception for a link.
     *
     * @param SplFileInfo $file
     *
     * @return static
     */
    public static function forLink(SplFileInfo $file)
    {
        $message = 'Links are not supported, encountered link at ';

        return new static($message . $file->getPathname());
    }

    /**
     * Create a new exception for a link.
     *
     * @param string $systemType
     *
     * @return static
     */
    public static function forFtpSystemType($systemType)
    {
        $message = "The FTP system type '$systemType' is currently not supported.";

        return new static($message);
    }
}
