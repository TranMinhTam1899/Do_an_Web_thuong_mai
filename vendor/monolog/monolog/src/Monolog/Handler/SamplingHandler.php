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

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/**
 * Sampling handler
 *
 * A sampled event stream can be useful for logging high frequency events in
 * a production environment where you only need an idea of what is happening
 * and are not concerned with capturing every occurrence. Since the decision to
 * handle or not handle a particular event is determined randomly, the
 * resulting sampled log is not guaranteed to contain 1/N of the events that
 * occurred in the application, but based on the Law of large numbers, it will
 * tend to be close to this ratio with a large number of attempts.
 *
 * @author Bryan Davis <bd808@wikimedia.org>
 * @author Kunal Mehta <legoktm@gmail.com>
 */
<<<<<<< HEAD
class SamplingHandler extends AbstractHandler
{
=======
class SamplingHandler extends AbstractHandler implements ProcessableHandlerInterface
{
    use ProcessableHandlerTrait;

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    /**
     * @var callable|HandlerInterface $handler
     */
    protected $handler;

    /**
     * @var int $factor
     */
    protected $factor;

    /**
<<<<<<< HEAD
     * @param callable|HandlerInterface $handler Handler or factory callable($record|null, $samplingHandler).
     * @param int                       $factor  Sample factor
     */
    public function __construct($handler, $factor)
=======
     * @param callable|HandlerInterface $handler Handler or factory callable($record, $fingersCrossedHandler).
     * @param int                       $factor  Sample factor (e.g. 10 means every ~10th record is sampled)
     */
    public function __construct($handler, int $factor)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        parent::__construct();
        $this->handler = $handler;
        $this->factor = $factor;

        if (!$this->handler instanceof HandlerInterface && !is_callable($this->handler)) {
            throw new \RuntimeException("The given handler (".json_encode($this->handler).") is not a callable nor a Monolog\Handler\HandlerInterface object");
        }
    }

<<<<<<< HEAD
    public function isHandling(array $record)
    {
        return $this->getHandler($record)->isHandling($record);
    }

    public function handle(array $record)
    {
        if ($this->isHandling($record) && mt_rand(1, $this->factor) === 1) {
            if ($this->processors) {
                foreach ($this->processors as $processor) {
                    $record = call_user_func($processor, $record);
                }
            }

            $this->getHandler($record)->handle($record);
        }

        return false === $this->bubble;
    }

    /**
     * Return the nested handler
     *
     * If the handler was provided as a factory callable, this will trigger the handler's instantiation.
     *
     * @return HandlerInterface
     */
    public function getHandler(array $record = null)
    {
        if (!$this->handler instanceof HandlerInterface) {
            $this->handler = call_user_func($this->handler, $record, $this);
            if (!$this->handler instanceof HandlerInterface) {
                throw new \RuntimeException("The factory callable should return a HandlerInterface");
            }
        }

        return $this->handler;
    }

    /**
     * {@inheritdoc}
     */
    public function setFormatter(FormatterInterface $formatter)
    {
        $this->getHandler()->setFormatter($formatter);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFormatter()
    {
        return $this->getHandler()->getFormatter();
=======
    public function isHandling(array $record): bool
    {
        return $this->handler->isHandling($record);
    }

    public function handle(array $record): bool
    {
        if ($this->isHandling($record) && mt_rand(1, $this->factor) === 1) {
            // The same logic as in FingersCrossedHandler
            if (!$this->handler instanceof HandlerInterface) {
                $this->handler = call_user_func($this->handler, $record, $this);
                if (!$this->handler instanceof HandlerInterface) {
                    throw new \RuntimeException("The factory callable should return a HandlerInterface");
                }
            }

            if ($this->processors) {
                $record = $this->processRecord($record);
            }

            $this->handler->handle($record);
        }

        return false === $this->bubble;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
