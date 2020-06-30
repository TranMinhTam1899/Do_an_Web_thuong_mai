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

<<<<<<< HEAD
use Monolog\Handler\HandlerInterface;
use Monolog\Handler\StreamHandler;
use Psr\Log\LoggerInterface;
use Psr\Log\InvalidArgumentException;
use Exception;
=======
use DateTimeZone;
use Monolog\Handler\HandlerInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\InvalidArgumentException;
use Throwable;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * Monolog log channel
 *
 * It contains a stack of Handlers and a stack of Processors,
 * and uses them to store records that are added to it.
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
class Logger implements LoggerInterface, ResettableInterface
{
    /**
     * Detailed debug information
     */
<<<<<<< HEAD
    const DEBUG = 100;
=======
    public const DEBUG = 100;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Interesting events
     *
     * Examples: User logs in, SQL logs.
     */
<<<<<<< HEAD
    const INFO = 200;
=======
    public const INFO = 200;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Uncommon events
     */
<<<<<<< HEAD
    const NOTICE = 250;
=======
    public const NOTICE = 250;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Exceptional occurrences that are not errors
     *
     * Examples: Use of deprecated APIs, poor use of an API,
     * undesirable things that are not necessarily wrong.
     */
<<<<<<< HEAD
    const WARNING = 300;
=======
    public const WARNING = 300;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Runtime errors
     */
<<<<<<< HEAD
    const ERROR = 400;
=======
    public const ERROR = 400;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Critical conditions
     *
     * Example: Application component unavailable, unexpected exception.
     */
<<<<<<< HEAD
    const CRITICAL = 500;
=======
    public const CRITICAL = 500;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Action must be taken immediately
     *
     * Example: Entire website down, database unavailable, etc.
     * This should trigger the SMS alerts and wake you up.
     */
<<<<<<< HEAD
    const ALERT = 550;
=======
    public const ALERT = 550;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Urgent alert.
     */
<<<<<<< HEAD
    const EMERGENCY = 600;
=======
    public const EMERGENCY = 600;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Monolog API version
     *
     * This is only bumped when API breaks are done and should
     * follow the major version of the library
     *
     * @var int
     */
<<<<<<< HEAD
    const API = 1;

    /**
     * Logging levels from syslog protocol defined in RFC 5424
     *
     * @var array $levels Logging levels
     */
    protected static $levels = array(
=======
    public const API = 2;

    /**
     * This is a static variable and not a constant to serve as an extension point for custom levels
     *
     * @var string[] $levels Logging levels with the levels as key
     */
    protected static $levels = [
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        self::DEBUG     => 'DEBUG',
        self::INFO      => 'INFO',
        self::NOTICE    => 'NOTICE',
        self::WARNING   => 'WARNING',
        self::ERROR     => 'ERROR',
        self::CRITICAL  => 'CRITICAL',
        self::ALERT     => 'ALERT',
        self::EMERGENCY => 'EMERGENCY',
<<<<<<< HEAD
    );

    /**
     * @var \DateTimeZone
     */
    protected static $timezone;
=======
    ];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * @var string
     */
    protected $name;

    /**
     * The handler stack
     *
     * @var HandlerInterface[]
     */
    protected $handlers;

    /**
     * Processors that will process all log records
     *
     * To process records of a single handler instead, add the processor on that specific handler
     *
     * @var callable[]
     */
    protected $processors;

    /**
     * @var bool
     */
    protected $microsecondTimestamps = true;

    /**
<<<<<<< HEAD
     * @var callable
=======
     * @var DateTimeZone
     */
    protected $timezone;

    /**
     * @var callable|null
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    protected $exceptionHandler;

    /**
<<<<<<< HEAD
     * @param string             $name       The logging channel
     * @param HandlerInterface[] $handlers   Optional stack of handlers, the first one in the array is called first, etc.
     * @param callable[]         $processors Optional array of processors
     */
    public function __construct($name, array $handlers = array(), array $processors = array())
=======
     * @param string             $name       The logging channel, a simple descriptive name that is attached to all log records
     * @param HandlerInterface[] $handlers   Optional stack of handlers, the first one in the array is called first, etc.
     * @param callable[]         $processors Optional array of processors
     * @param DateTimeZone|null  $timezone   Optional timezone, if not provided date_default_timezone_get() will be used
     */
    public function __construct(string $name, array $handlers = [], array $processors = [], ?DateTimeZone $timezone = null)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->name = $name;
        $this->setHandlers($handlers);
        $this->processors = $processors;
<<<<<<< HEAD
    }

    /**
     * @return string
     */
    public function getName()
=======
        $this->timezone = $timezone ?: new DateTimeZone(date_default_timezone_get() ?: 'UTC');
    }

    public function getName(): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->name;
    }

    /**
     * Return a new cloned instance with the name changed
<<<<<<< HEAD
     *
     * @return static
     */
    public function withName($name)
=======
     */
    public function withName(string $name): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $new = clone $this;
        $new->name = $name;

        return $new;
    }

    /**
     * Pushes a handler on to the stack.
<<<<<<< HEAD
     *
     * @param  HandlerInterface $handler
     * @return $this
     */
    public function pushHandler(HandlerInterface $handler)
=======
     */
    public function pushHandler(HandlerInterface $handler): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        array_unshift($this->handlers, $handler);

        return $this;
    }

    /**
     * Pops a handler from the stack
     *
<<<<<<< HEAD
     * @return HandlerInterface
     */
    public function popHandler()
=======
     * @throws \LogicException If empty handler stack
     */
    public function popHandler(): HandlerInterface
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!$this->handlers) {
            throw new \LogicException('You tried to pop from an empty handler stack.');
        }

        return array_shift($this->handlers);
    }

    /**
     * Set handlers, replacing all existing ones.
     *
     * If a map is passed, keys will be ignored.
     *
<<<<<<< HEAD
     * @param  HandlerInterface[] $handlers
     * @return $this
     */
    public function setHandlers(array $handlers)
    {
        $this->handlers = array();
=======
     * @param HandlerInterface[] $handlers
     */
    public function setHandlers(array $handlers): self
    {
        $this->handlers = [];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        foreach (array_reverse($handlers) as $handler) {
            $this->pushHandler($handler);
        }

        return $this;
    }

    /**
     * @return HandlerInterface[]
     */
<<<<<<< HEAD
    public function getHandlers()
=======
    public function getHandlers(): array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->handlers;
    }

    /**
     * Adds a processor on to the stack.
<<<<<<< HEAD
     *
     * @param  callable $callback
     * @return $this
     */
    public function pushProcessor($callback)
    {
        if (!is_callable($callback)) {
            throw new \InvalidArgumentException('Processors must be valid callables (callback or object with an __invoke method), '.var_export($callback, true).' given');
        }
=======
     */
    public function pushProcessor(callable $callback): self
    {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        array_unshift($this->processors, $callback);

        return $this;
    }

    /**
     * Removes the processor on top of the stack and returns it.
     *
<<<<<<< HEAD
     * @return callable
     */
    public function popProcessor()
=======
     * @throws \LogicException If empty processor stack
     * @return callable
     */
    public function popProcessor(): callable
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!$this->processors) {
            throw new \LogicException('You tried to pop from an empty processor stack.');
        }

        return array_shift($this->processors);
    }

    /**
     * @return callable[]
     */
<<<<<<< HEAD
    public function getProcessors()
=======
    public function getProcessors(): array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->processors;
    }

    /**
     * Control the use of microsecond resolution timestamps in the 'datetime'
     * member of new records.
     *
<<<<<<< HEAD
     * Generating microsecond resolution timestamps by calling
=======
     * On PHP7.0, generating microsecond resolution timestamps by calling
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * microtime(true), formatting the result via sprintf() and then parsing
     * the resulting string via \DateTime::createFromFormat() can incur
     * a measurable runtime overhead vs simple usage of DateTime to capture
     * a second resolution timestamp in systems which generate a large number
     * of log events.
     *
<<<<<<< HEAD
     * @param bool $micro True to use microtime() to create timestamps
     */
    public function useMicrosecondTimestamps($micro)
    {
        $this->microsecondTimestamps = (bool) $micro;
=======
     * On PHP7.1 however microseconds are always included by the engine, so
     * this setting can be left alone unless you really want to suppress
     * microseconds in the output.
     *
     * @param bool $micro True to use microtime() to create timestamps
     */
    public function useMicrosecondTimestamps(bool $micro)
    {
        $this->microsecondTimestamps = $micro;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Adds a log record.
     *
<<<<<<< HEAD
     * @param  int     $level   The logging level
     * @param  string  $message The log message
     * @param  array   $context The log context
     * @return bool Whether the record has been processed
     */
    public function addRecord($level, $message, array $context = array())
    {
        if (!$this->handlers) {
            $this->pushHandler(new StreamHandler('php://stderr', static::DEBUG));
        }

        $levelName = static::getLevelName($level);

        // check if any handler will handle this message so we can return early and save cycles
        $handlerKey = null;
        reset($this->handlers);
        while ($handler = current($this->handlers)) {
            if ($handler->isHandling(array('level' => $level))) {
                $handlerKey = key($this->handlers);
                break;
            }

            next($this->handlers);
=======
     * @param  int    $level   The logging level
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function addRecord(int $level, string $message, array $context = []): bool
    {
        // check if any handler will handle this message so we can return early and save cycles
        $handlerKey = null;
        foreach ($this->handlers as $key => $handler) {
            if ($handler->isHandling(['level' => $level])) {
                $handlerKey = $key;
                break;
            }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        if (null === $handlerKey) {
            return false;
        }

<<<<<<< HEAD
        if (!static::$timezone) {
            static::$timezone = new \DateTimeZone(date_default_timezone_get() ?: 'UTC');
        }

        // php7.1+ always has microseconds enabled, so we do not need this hack
        if ($this->microsecondTimestamps && PHP_VERSION_ID < 70100) {
            $ts = \DateTime::createFromFormat('U.u', sprintf('%.6F', microtime(true)), static::$timezone);
        } else {
            $ts = new \DateTime(null, static::$timezone);
        }
        $ts->setTimezone(static::$timezone);

        $record = array(
            'message' => (string) $message,
=======
        $levelName = static::getLevelName($level);

        $record = [
            'message' => $message,
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            'context' => $context,
            'level' => $level,
            'level_name' => $levelName,
            'channel' => $this->name,
<<<<<<< HEAD
            'datetime' => $ts,
            'extra' => array(),
        );
=======
            'datetime' => new DateTimeImmutable($this->microsecondTimestamps, $this->timezone),
            'extra' => [],
        ];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        try {
            foreach ($this->processors as $processor) {
                $record = call_user_func($processor, $record);
            }

<<<<<<< HEAD
=======
            // advance the array pointer to the first handler that will handle this record
            reset($this->handlers);
            while ($handlerKey !== key($this->handlers)) {
                next($this->handlers);
            }

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            while ($handler = current($this->handlers)) {
                if (true === $handler->handle($record)) {
                    break;
                }

                next($this->handlers);
            }
<<<<<<< HEAD
        } catch (Exception $e) {
=======
        } catch (Throwable $e) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $this->handleException($e, $record);
        }

        return true;
    }

    /**
     * Ends a log cycle and frees all resources used by handlers.
     *
     * Closing a Handler means flushing all buffers and freeing any open resources/handles.
     * Handlers that have been closed should be able to accept log records again and re-open
     * themselves on demand, but this may not always be possible depending on implementation.
     *
     * This is useful at the end of a request and will be called automatically on every handler
     * when they get destructed.
     */
<<<<<<< HEAD
    public function close()
    {
        foreach ($this->handlers as $handler) {
            if (method_exists($handler, 'close')) {
                $handler->close();
            }
=======
    public function close(): void
    {
        foreach ($this->handlers as $handler) {
            $handler->close();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }
    }

    /**
     * Ends a log cycle and resets all handlers and processors to their initial state.
     *
     * Resetting a Handler or a Processor means flushing/cleaning all buffers, resetting internal
     * state, and getting it back to a state in which it can receive log records again.
     *
     * This is useful in case you want to avoid logs leaking between two requests or jobs when you
     * have a long running process like a worker or an application server serving multiple requests
     * in one process.
     */
<<<<<<< HEAD
    public function reset()
=======
    public function reset(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        foreach ($this->handlers as $handler) {
            if ($handler instanceof ResettableInterface) {
                $handler->reset();
            }
        }

        foreach ($this->processors as $processor) {
            if ($processor instanceof ResettableInterface) {
                $processor->reset();
            }
        }
    }

    /**
<<<<<<< HEAD
     * Adds a log record at the DEBUG level.
     *
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function addDebug($message, array $context = array())
    {
        return $this->addRecord(static::DEBUG, $message, $context);
    }

    /**
     * Adds a log record at the INFO level.
     *
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function addInfo($message, array $context = array())
    {
        return $this->addRecord(static::INFO, $message, $context);
    }

    /**
     * Adds a log record at the NOTICE level.
     *
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function addNotice($message, array $context = array())
    {
        return $this->addRecord(static::NOTICE, $message, $context);
    }

    /**
     * Adds a log record at the WARNING level.
     *
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function addWarning($message, array $context = array())
    {
        return $this->addRecord(static::WARNING, $message, $context);
    }

    /**
     * Adds a log record at the ERROR level.
     *
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function addError($message, array $context = array())
    {
        return $this->addRecord(static::ERROR, $message, $context);
    }

    /**
     * Adds a log record at the CRITICAL level.
     *
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function addCritical($message, array $context = array())
    {
        return $this->addRecord(static::CRITICAL, $message, $context);
    }

    /**
     * Adds a log record at the ALERT level.
     *
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function addAlert($message, array $context = array())
    {
        return $this->addRecord(static::ALERT, $message, $context);
    }

    /**
     * Adds a log record at the EMERGENCY level.
     *
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function addEmergency($message, array $context = array())
    {
        return $this->addRecord(static::EMERGENCY, $message, $context);
    }

    /**
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * Gets all supported logging levels.
     *
     * @return array Assoc array with human-readable level names => level codes.
     */
<<<<<<< HEAD
    public static function getLevels()
=======
    public static function getLevels(): array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return array_flip(static::$levels);
    }

    /**
     * Gets the name of the logging level.
     *
<<<<<<< HEAD
     * @param  int    $level
     * @return string
     */
    public static function getLevelName($level)
=======
     * @throws \Psr\Log\InvalidArgumentException If level is not defined
     */
    public static function getLevelName(int $level): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!isset(static::$levels[$level])) {
            throw new InvalidArgumentException('Level "'.$level.'" is not defined, use one of: '.implode(', ', array_keys(static::$levels)));
        }

        return static::$levels[$level];
    }

    /**
     * Converts PSR-3 levels to Monolog ones if necessary
     *
<<<<<<< HEAD
     * @param string|int Level number (monolog) or name (PSR-3)
     * @return int
     */
    public static function toMonologLevel($level)
    {
        if (is_string($level)) {
            // Contains chars of all log levels and avoids using strtoupper() which may have
            // strange results depending on locale (for example, "i" will become "İ")
            $upper = strtr($level, 'abcdefgilmnortuwy', 'ABCDEFGILMNORTUWY');
            if (defined(__CLASS__.'::'.$upper)) {
                return constant(__CLASS__ . '::' . $upper);
            }
=======
     * @param  string|int                        $level Level number (monolog) or name (PSR-3)
     * @throws \Psr\Log\InvalidArgumentException If level is not defined
     */
    public static function toMonologLevel($level): int
    {
        if (is_string($level)) {
            if (defined(__CLASS__.'::'.strtoupper($level))) {
                return constant(__CLASS__.'::'.strtoupper($level));
            }

            throw new InvalidArgumentException('Level "'.$level.'" is not defined, use one of: '.implode(', ', array_keys(static::$levels)));
        }

        if (!is_int($level)) {
            throw new InvalidArgumentException('Level "'.var_export($level, true).'" is not defined, use one of: '.implode(', ', array_keys(static::$levels)));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return $level;
    }

    /**
     * Checks whether the Logger has a handler that listens on the given level
<<<<<<< HEAD
     *
     * @param  int     $level
     * @return bool
     */
    public function isHandling($level)
    {
        $record = array(
            'level' => $level,
        );
=======
     */
    public function isHandling(int $level): bool
    {
        $record = [
            'level' => $level,
        ];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        foreach ($this->handlers as $handler) {
            if ($handler->isHandling($record)) {
                return true;
            }
        }

        return false;
    }

    /**
<<<<<<< HEAD
     * Set a custom exception handler
     *
     * @param  callable $callback
     * @return $this
     */
    public function setExceptionHandler($callback)
    {
        if (!is_callable($callback)) {
            throw new \InvalidArgumentException('Exception handler must be valid callable (callback or object with an __invoke method), '.var_export($callback, true).' given');
        }
=======
     * Set a custom exception handler that will be called if adding a new record fails
     *
     * The callable will receive an exception object and the record that failed to be logged
     */
    public function setExceptionHandler(?callable $callback): self
    {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $this->exceptionHandler = $callback;

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return callable
     */
    public function getExceptionHandler()
=======
    public function getExceptionHandler(): ?callable
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->exceptionHandler;
    }

    /**
<<<<<<< HEAD
     * Delegates exception management to the custom exception handler,
     * or throws the exception if no custom handler is set.
     */
    protected function handleException(Exception $e, array $record)
    {
        if (!$this->exceptionHandler) {
            throw $e;
        }

        call_user_func($this->exceptionHandler, $e, $record);
    }

    /**
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * Adds a log record at an arbitrary level.
     *
     * This method allows for compatibility with common interfaces.
     *
<<<<<<< HEAD
     * @param  mixed   $level   The log level
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function log($level, $message, array $context = array())
    {
        $level = static::toMonologLevel($level);

        return $this->addRecord($level, $message, $context);
=======
     * @param mixed  $level   The log level
     * @param string $message The log message
     * @param array  $context The log context
     */
    public function log($level, $message, array $context = []): void
    {
        $level = static::toMonologLevel($level);

        $this->addRecord($level, (string) $message, $context);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Adds a log record at the DEBUG level.
     *
     * This method allows for compatibility with common interfaces.
     *
<<<<<<< HEAD
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function debug($message, array $context = array())
    {
        return $this->addRecord(static::DEBUG, $message, $context);
=======
     * @param string $message The log message
     * @param array  $context The log context
     */
    public function debug($message, array $context = []): void
    {
        $this->addRecord(static::DEBUG, (string) $message, $context);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Adds a log record at the INFO level.
     *
     * This method allows for compatibility with common interfaces.
     *
<<<<<<< HEAD
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function info($message, array $context = array())
    {
        return $this->addRecord(static::INFO, $message, $context);
=======
     * @param string $message The log message
     * @param array  $context The log context
     */
    public function info($message, array $context = []): void
    {
        $this->addRecord(static::INFO, (string) $message, $context);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Adds a log record at the NOTICE level.
     *
     * This method allows for compatibility with common interfaces.
     *
<<<<<<< HEAD
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function notice($message, array $context = array())
    {
        return $this->addRecord(static::NOTICE, $message, $context);
    }

    /**
     * Adds a log record at the WARNING level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function warn($message, array $context = array())
    {
        return $this->addRecord(static::WARNING, $message, $context);
=======
     * @param string $message The log message
     * @param array  $context The log context
     */
    public function notice($message, array $context = []): void
    {
        $this->addRecord(static::NOTICE, (string) $message, $context);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Adds a log record at the WARNING level.
     *
     * This method allows for compatibility with common interfaces.
     *
<<<<<<< HEAD
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function warning($message, array $context = array())
    {
        return $this->addRecord(static::WARNING, $message, $context);
=======
     * @param string $message The log message
     * @param array  $context The log context
     */
    public function warning($message, array $context = []): void
    {
        $this->addRecord(static::WARNING, (string) $message, $context);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Adds a log record at the ERROR level.
     *
     * This method allows for compatibility with common interfaces.
     *
<<<<<<< HEAD
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function err($message, array $context = array())
    {
        return $this->addRecord(static::ERROR, $message, $context);
    }

    /**
     * Adds a log record at the ERROR level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function error($message, array $context = array())
    {
        return $this->addRecord(static::ERROR, $message, $context);
=======
     * @param string $message The log message
     * @param array  $context The log context
     */
    public function error($message, array $context = []): void
    {
        $this->addRecord(static::ERROR, (string) $message, $context);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Adds a log record at the CRITICAL level.
     *
     * This method allows for compatibility with common interfaces.
     *
<<<<<<< HEAD
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function crit($message, array $context = array())
    {
        return $this->addRecord(static::CRITICAL, $message, $context);
    }

    /**
     * Adds a log record at the CRITICAL level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function critical($message, array $context = array())
    {
        return $this->addRecord(static::CRITICAL, $message, $context);
    }

    /**
     * Adds a log record at the ALERT level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function alert($message, array $context = array())
    {
        return $this->addRecord(static::ALERT, $message, $context);
    }

    /**
     * Adds a log record at the EMERGENCY level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function emerg($message, array $context = array())
    {
        return $this->addRecord(static::EMERGENCY, $message, $context);
    }

    /**
     * Adds a log record at the EMERGENCY level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param  string $message The log message
     * @param  array  $context The log context
     * @return bool   Whether the record has been processed
     */
    public function emergency($message, array $context = array())
    {
        return $this->addRecord(static::EMERGENCY, $message, $context);
    }

    /**
     * Set the timezone to be used for the timestamp of log records.
     *
     * This is stored globally for all Logger instances
     *
     * @param \DateTimeZone $tz Timezone object
     */
    public static function setTimezone(\DateTimeZone $tz)
    {
        self::$timezone = $tz;
=======
     * @param string $message The log message
     * @param array  $context The log context
     */
    public function critical($message, array $context = []): void
    {
        $this->addRecord(static::CRITICAL, (string) $message, $context);
    }

    /**
     * Adds a log record at the ALERT level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param string $message The log message
     * @param array  $context The log context
     */
    public function alert($message, array $context = []): void
    {
        $this->addRecord(static::ALERT, (string) $message, $context);
    }

    /**
     * Adds a log record at the EMERGENCY level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param string $message The log message
     * @param array  $context The log context
     */
    public function emergency($message, array $context = []): void
    {
        $this->addRecord(static::EMERGENCY, (string) $message, $context);
    }

    /**
     * Sets the timezone to be used for the timestamp of log records.
     */
    public function setTimezone(DateTimeZone $tz): self
    {
        $this->timezone = $tz;

        return $this;
    }

    /**
     * Returns the timezone to be used for the timestamp of log records.
     */
    public function getTimezone(): DateTimeZone
    {
        return $this->timezone;
    }

    /**
     * Delegates exception management to the custom exception handler,
     * or throws the exception if no custom handler is set.
     */
    protected function handleException(Throwable $e, array $record)
    {
        if (!$this->exceptionHandler) {
            throw $e;
        }

        call_user_func($this->exceptionHandler, $e, $record);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
