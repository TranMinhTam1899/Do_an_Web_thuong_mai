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

use Monolog\Logger;
use Monolog\ResettableInterface;
<<<<<<< HEAD
use Monolog\Formatter\FormatterInterface;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * Buffers all records until closing the handler and then pass them as batch.
 *
 * This is useful for a MailHandler to send only one mail per request instead of
 * sending one per log message.
 *
 * @author Christophe Coevoet <stof@notk.org>
 */
<<<<<<< HEAD
class BufferHandler extends AbstractHandler
{
=======
class BufferHandler extends AbstractHandler implements ProcessableHandlerInterface
{
    use ProcessableHandlerTrait;

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    protected $handler;
    protected $bufferSize = 0;
    protected $bufferLimit;
    protected $flushOnOverflow;
<<<<<<< HEAD
    protected $buffer = array();
=======
    protected $buffer = [];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    protected $initialized = false;

    /**
     * @param HandlerInterface $handler         Handler.
     * @param int              $bufferLimit     How many entries should be buffered at most, beyond that the oldest items are removed from the buffer.
<<<<<<< HEAD
     * @param int              $level           The minimum logging level at which this handler will be triggered
     * @param bool             $bubble          Whether the messages that are handled can bubble up the stack or not
     * @param bool             $flushOnOverflow If true, the buffer is flushed when the max size has been reached, by default oldest entries are discarded
     */
    public function __construct(HandlerInterface $handler, $bufferLimit = 0, $level = Logger::DEBUG, $bubble = true, $flushOnOverflow = false)
    {
        parent::__construct($level, $bubble);
        $this->handler = $handler;
        $this->bufferLimit = (int) $bufferLimit;
=======
     * @param string|int       $level           The minimum logging level at which this handler will be triggered
     * @param bool             $bubble          Whether the messages that are handled can bubble up the stack or not
     * @param bool             $flushOnOverflow If true, the buffer is flushed when the max size has been reached, by default oldest entries are discarded
     */
    public function __construct(HandlerInterface $handler, int $bufferLimit = 0, $level = Logger::DEBUG, bool $bubble = true, bool $flushOnOverflow = false)
    {
        parent::__construct($level, $bubble);
        $this->handler = $handler;
        $this->bufferLimit = $bufferLimit;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $this->flushOnOverflow = $flushOnOverflow;
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
        if ($record['level'] < $this->level) {
            return false;
        }

        if (!$this->initialized) {
            // __destructor() doesn't get called on Fatal errors
<<<<<<< HEAD
            register_shutdown_function(array($this, 'close'));
=======
            register_shutdown_function([$this, 'close']);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $this->initialized = true;
        }

        if ($this->bufferLimit > 0 && $this->bufferSize === $this->bufferLimit) {
            if ($this->flushOnOverflow) {
                $this->flush();
            } else {
                array_shift($this->buffer);
                $this->bufferSize--;
            }
        }

        if ($this->processors) {
<<<<<<< HEAD
            foreach ($this->processors as $processor) {
                $record = call_user_func($processor, $record);
            }
=======
            $record = $this->processRecord($record);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        $this->buffer[] = $record;
        $this->bufferSize++;

        return false === $this->bubble;
    }

<<<<<<< HEAD
    public function flush()
=======
    public function flush(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if ($this->bufferSize === 0) {
            return;
        }

        $this->handler->handleBatch($this->buffer);
        $this->clear();
    }

    public function __destruct()
    {
        // suppress the parent behavior since we already have register_shutdown_function()
        // to call close(), and the reference contained there will prevent this from being
        // GC'd until the end of the request
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function close()
    {
        $this->flush();
=======
    public function close(): void
    {
        $this->flush();

        $this->handler->close();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Clears the buffer without flushing any messages down to the wrapped handler.
     */
<<<<<<< HEAD
    public function clear()
    {
        $this->bufferSize = 0;
        $this->buffer = array();
=======
    public function clear(): void
    {
        $this->bufferSize = 0;
        $this->buffer = [];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function reset()
    {
        $this->flush();

        parent::reset();

<<<<<<< HEAD
=======
        $this->resetProcessors();

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        if ($this->handler instanceof ResettableInterface) {
            $this->handler->reset();
        }
    }
<<<<<<< HEAD

    /**
     * {@inheritdoc}
     */
    public function setFormatter(FormatterInterface $formatter)
    {
        $this->handler->setFormatter($formatter);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFormatter()
    {
        return $this->handler->getFormatter();
    }
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
