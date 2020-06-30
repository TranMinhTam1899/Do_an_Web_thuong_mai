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

<<<<<<< HEAD
use Monolog\Formatter\FormatterInterface;
use Monolog\Formatter\LineFormatter;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use Monolog\Logger;
use Monolog\ResettableInterface;

/**
<<<<<<< HEAD
 * Base Handler class providing the Handler structure
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
abstract class AbstractHandler implements HandlerInterface, ResettableInterface
=======
 * Base Handler class providing basic level/bubble support
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
abstract class AbstractHandler extends Handler implements ResettableInterface
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    protected $level = Logger::DEBUG;
    protected $bubble = true;

    /**
<<<<<<< HEAD
     * @var FormatterInterface
     */
    protected $formatter;
    protected $processors = array();

    /**
     * @param int|string $level  The minimum logging level at which this handler will be triggered
     * @param bool       $bubble Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct($level = Logger::DEBUG, $bubble = true)
=======
     * @param int|string $level  The minimum logging level at which this handler will be triggered
     * @param bool       $bubble Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct($level = Logger::DEBUG, bool $bubble = true)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->setLevel($level);
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
        return $record['level'] >= $this->level;
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
     */
    public function handleBatch(array $records)
    {
        foreach ($records as $record) {
            $this->handle($record);
        }
    }

    /**
     * Closes the handler.
     *
     * This will be called automatically when the object is destroyed
     */
    public function close()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function pushProcessor($callback)
    {
        if (!is_callable($callback)) {
            throw new \InvalidArgumentException('Processors must be valid callables (callback or object with an __invoke method), '.var_export($callback, true).' given');
        }
        array_unshift($this->processors, $callback);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function popProcessor()
    {
        if (!$this->processors) {
            throw new \LogicException('You tried to pop from an empty processor stack.');
        }

        return array_shift($this->processors);
    }

    /**
     * {@inheritdoc}
     */
    public function setFormatter(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFormatter()
    {
        if (!$this->formatter) {
            $this->formatter = $this->getDefaultFormatter();
        }

        return $this->formatter;
    }

    /**
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * Sets minimum logging level at which this handler will be triggered.
     *
     * @param  int|string $level Level or level name
     * @return self
     */
<<<<<<< HEAD
    public function setLevel($level)
=======
    public function setLevel($level): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->level = Logger::toMonologLevel($level);

        return $this;
    }

    /**
     * Gets minimum logging level at which this handler will be triggered.
     *
     * @return int
     */
<<<<<<< HEAD
    public function getLevel()
=======
    public function getLevel(): int
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->level;
    }

    /**
     * Sets the bubbling behavior.
     *
     * @param  bool $bubble true means that this handler allows bubbling.
     *                      false means that bubbling is not permitted.
     * @return self
     */
<<<<<<< HEAD
    public function setBubble($bubble)
=======
    public function setBubble(bool $bubble): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->bubble = $bubble;

        return $this;
    }

    /**
     * Gets the bubbling behavior.
     *
     * @return bool true means that this handler allows bubbling.
     *              false means that bubbling is not permitted.
     */
<<<<<<< HEAD
    public function getBubble()
=======
    public function getBubble(): bool
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->bubble;
    }

<<<<<<< HEAD
    public function __destruct()
    {
        try {
            $this->close();
        } catch (\Exception $e) {
            // do nothing
        } catch (\Throwable $e) {
            // do nothing
        }
    }

    public function reset()
    {
        foreach ($this->processors as $processor) {
            if ($processor instanceof ResettableInterface) {
                $processor->reset();
            }
        }
    }

    /**
     * Gets the default formatter.
     *
     * @return FormatterInterface
     */
    protected function getDefaultFormatter()
    {
        return new LineFormatter();
=======
    public function reset()
    {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
