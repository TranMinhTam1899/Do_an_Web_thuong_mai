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

use Monolog\Formatter\FormatterInterface;
use Monolog\ResettableInterface;

/**
 * Forwards records to multiple handlers
 *
 * @author Lenar Lõhmus <lenar@city.ee>
 */
<<<<<<< HEAD
class GroupHandler extends AbstractHandler
{
    protected $handlers;

    /**
     * @param array $handlers Array of Handlers.
     * @param bool  $bubble   Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct(array $handlers, $bubble = true)
=======
class GroupHandler extends Handler implements ProcessableHandlerInterface, ResettableInterface
{
    use ProcessableHandlerTrait;

    protected $handlers;
    protected $bubble;

    /**
     * @param HandlerInterface[] $handlers Array of Handlers.
     * @param bool               $bubble   Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct(array $handlers, bool $bubble = true)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        foreach ($handlers as $handler) {
            if (!$handler instanceof HandlerInterface) {
                throw new \InvalidArgumentException('The first argument of the GroupHandler must be an array of HandlerInterface instances.');
            }
        }

        $this->handlers = $handlers;
        $this->bubble = $bubble;
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
        foreach ($this->handlers as $handler) {
            if ($handler->isHandling($record)) {
                return true;
            }
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function handle(array $record)
    {
        if ($this->processors) {
            foreach ($this->processors as $processor) {
                $record = call_user_func($processor, $record);
            }
=======
    public function handle(array $record): bool
    {
        if ($this->processors) {
            $record = $this->processRecord($record);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        foreach ($this->handlers as $handler) {
            $handler->handle($record);
        }

        return false === $this->bubble;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function handleBatch(array $records)
    {
        if ($this->processors) {
            $processed = array();
            foreach ($records as $record) {
                foreach ($this->processors as $processor) {
                    $record = call_user_func($processor, $record);
                }
                $processed[] = $record;
=======
    public function handleBatch(array $records): void
    {
        if ($this->processors) {
            $processed = [];
            foreach ($records as $record) {
                $processed[] = $this->processRecord($record);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            }
            $records = $processed;
        }

        foreach ($this->handlers as $handler) {
            $handler->handleBatch($records);
        }
    }

    public function reset()
    {
<<<<<<< HEAD
        parent::reset();
=======
        $this->resetProcessors();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        foreach ($this->handlers as $handler) {
            if ($handler instanceof ResettableInterface) {
                $handler->reset();
            }
        }
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function setFormatter(FormatterInterface $formatter)
=======
    public function close(): void
    {
        parent::close();

        foreach ($this->handlers as $handler) {
            $handler->close();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setFormatter(FormatterInterface $formatter): HandlerInterface
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        foreach ($this->handlers as $handler) {
            $handler->setFormatter($formatter);
        }

        return $this;
    }
}
