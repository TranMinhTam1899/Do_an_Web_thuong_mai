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

namespace Monolog\Handler;

use Monolog\ResettableInterface;
use Monolog\Formatter\FormatterInterface;

/**
 * This simple wrapper class can be used to extend handlers functionality.
 *
 * Example: A custom filtering that can be applied to any handler.
 *
 * Inherit from this class and override handle() like this:
 *
 *   public function handle(array $record)
 *   {
 *        if ($record meets certain conditions) {
 *            return false;
 *        }
 *        return $this->handler->handle($record);
 *   }
 *
 * @author Alexey Karapetov <alexey@karapetov.com>
 */
<<<<<<< HEAD
class HandlerWrapper implements HandlerInterface, ResettableInterface
=======
class HandlerWrapper implements HandlerInterface, ProcessableHandlerInterface, FormattableHandlerInterface, ResettableInterface
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @var HandlerInterface
     */
    protected $handler;

<<<<<<< HEAD
    /**
     * HandlerWrapper constructor.
     * @param HandlerInterface $handler
     */
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function __construct(HandlerInterface $handler)
    {
        $this->handler = $handler;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function isHandling(array $record)
=======
    public function isHandling(array $record): bool
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->handler->isHandling($record);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function handle(array $record)
=======
    public function handle(array $record): bool
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->handler->handle($record);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function handleBatch(array $records)
    {
        return $this->handler->handleBatch($records);
=======
    public function handleBatch(array $records): void
    {
        $this->handler->handleBatch($records);
    }

    /**
     * {@inheritdoc}
     */
    public function close(): void
    {
        $this->handler->close();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function pushProcessor($callback)
    {
        $this->handler->pushProcessor($callback);

        return $this;
=======
    public function pushProcessor(callable $callback): HandlerInterface
    {
        if ($this->handler instanceof ProcessableHandlerInterface) {
            $this->handler->pushProcessor($callback);

            return $this;
        }

        throw new \LogicException('The wrapped handler does not implement ' . ProcessableHandlerInterface::class);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function popProcessor()
    {
        return $this->handler->popProcessor();
=======
    public function popProcessor(): callable
    {
        if ($this->handler instanceof ProcessableHandlerInterface) {
            return $this->handler->popProcessor();
        }

        throw new \LogicException('The wrapped handler does not implement ' . ProcessableHandlerInterface::class);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function setFormatter(FormatterInterface $formatter)
    {
        $this->handler->setFormatter($formatter);

        return $this;
=======
    public function setFormatter(FormatterInterface $formatter): HandlerInterface
    {
        if ($this->handler instanceof FormattableHandlerInterface) {
            $this->handler->setFormatter($formatter);
        }

        throw new \LogicException('The wrapped handler does not implement ' . FormattableHandlerInterface::class);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getFormatter()
    {
        return $this->handler->getFormatter();
=======
    public function getFormatter(): FormatterInterface
    {
        if ($this->handler instanceof FormattableHandlerInterface) {
            return $this->handler->getFormatter();
        }

        throw new \LogicException('The wrapped handler does not implement ' . FormattableHandlerInterface::class);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function reset()
    {
        if ($this->handler instanceof ResettableInterface) {
            return $this->handler->reset();
        }
    }
}
