<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Handler;

use Monolog\Processor\ProcessorInterface;

/**
 * Interface to describe loggers that have processors
 *
<<<<<<< HEAD
 * This interface is present in monolog 1.x to ease forward compatibility.
 *
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
interface ProcessableHandlerInterface
{
    /**
     * Adds a processor in the stack.
     *
     * @param  ProcessorInterface|callable $callback
     * @return HandlerInterface            self
     */
<<<<<<< HEAD
    public function pushProcessor($callback): HandlerInterface;
=======
    public function pushProcessor(callable $callback): HandlerInterface;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Removes the processor on top of the stack and returns it.
     *
     * @throws \LogicException In case the processor stack is empty
     * @return callable
     */
    public function popProcessor(): callable;
}
