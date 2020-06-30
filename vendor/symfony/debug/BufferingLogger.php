<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Debug;

use Psr\Log\AbstractLogger;

<<<<<<< HEAD
@trigger_error(sprintf('The "%s" class is deprecated since Symfony 4.4, use "%s" instead.', BufferingLogger::class, \Symfony\Component\ErrorHandler\BufferingLogger::class), E_USER_DEPRECATED);

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/**
 * A buffering logger that stacks logs for later.
 *
 * @author Nicolas Grekas <p@tchwork.com>
<<<<<<< HEAD
 *
 * @deprecated since Symfony 4.4, use Symfony\Component\ErrorHandler\BufferingLogger instead.
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
class BufferingLogger extends AbstractLogger
{
    private $logs = [];

<<<<<<< HEAD
    /**
     * @return void
     */
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function log($level, $message, array $context = [])
    {
        $this->logs[] = [$level, $message, $context];
    }

    public function cleanLogs()
    {
        $logs = $this->logs;
        $this->logs = [];

        return $logs;
    }
}
