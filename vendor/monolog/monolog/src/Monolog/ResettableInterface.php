<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog;

/**
 * Handler or Processor implementing this interface will be reset when Logger::reset() is called.
 *
 * Resetting ends a log cycle gets them back to their initial state.
 *
 * Resetting a Handler or a Processor means flushing/cleaning all buffers, resetting internal
 * state, and getting it back to a state in which it can receive log records again.
 *
 * This is useful in case you want to avoid logs leaking between two requests or jobs when you
 * have a long running process like a worker or an application server serving multiple requests
 * in one process.
 *
 * @author Grégoire Pineau <lyrixx@lyrixx.info>
 */
interface ResettableInterface
{
<<<<<<< HEAD
=======
    /**
     * @return void
     */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function reset();
}
