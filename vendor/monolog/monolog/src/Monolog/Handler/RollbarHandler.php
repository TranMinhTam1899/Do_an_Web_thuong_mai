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
use RollbarNotifier;
use Exception;
=======
use Rollbar\RollbarLogger;
use Throwable;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use Monolog\Logger;

/**
 * Sends errors to Rollbar
 *
 * If the context data contains a `payload` key, that is used as an array
<<<<<<< HEAD
 * of payload options to RollbarNotifier's report_message/report_exception methods.
=======
 * of payload options to RollbarLogger's log method.
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 *
 * Rollbar's context info will contain the context + extra keys from the log record
 * merged, and then on top of that a few keys:
 *
 *  - level (rollbar level name)
 *  - monolog_level (monolog level name, raw level, as rollbar only has 5 but monolog 8)
 *  - channel
 *  - datetime (unix timestamp)
 *
 * @author Paul Statezny <paulstatezny@gmail.com>
 */
class RollbarHandler extends AbstractProcessingHandler
{
    /**
<<<<<<< HEAD
     * Rollbar notifier
     *
     * @var RollbarNotifier
     */
    protected $rollbarNotifier;

    protected $levelMap = array(
=======
     * @var RollbarLogger
     */
    protected $rollbarLogger;

    protected $levelMap = [
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        Logger::DEBUG     => 'debug',
        Logger::INFO      => 'info',
        Logger::NOTICE    => 'info',
        Logger::WARNING   => 'warning',
        Logger::ERROR     => 'error',
        Logger::CRITICAL  => 'critical',
        Logger::ALERT     => 'critical',
        Logger::EMERGENCY => 'critical',
<<<<<<< HEAD
    );
=======
    ];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Records whether any log records have been added since the last flush of the rollbar notifier
     *
     * @var bool
     */
    private $hasRecords = false;

    protected $initialized = false;

    /**
<<<<<<< HEAD
     * @param RollbarNotifier $rollbarNotifier RollbarNotifier object constructed with valid token
     * @param int             $level           The minimum logging level at which this handler will be triggered
     * @param bool            $bubble          Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct(RollbarNotifier $rollbarNotifier, $level = Logger::ERROR, $bubble = true)
    {
        $this->rollbarNotifier = $rollbarNotifier;
=======
     * @param RollbarLogger $rollbarLogger RollbarLogger object constructed with valid token
     * @param string|int    $level         The minimum logging level at which this handler will be triggered
     * @param bool          $bubble        Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct(RollbarLogger $rollbarLogger, $level = Logger::ERROR, bool $bubble = true)
    {
        $this->rollbarLogger = $rollbarLogger;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        parent::__construct($level, $bubble);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function write(array $record)
=======
    protected function write(array $record): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!$this->initialized) {
            // __destructor() doesn't get called on Fatal errors
            register_shutdown_function(array($this, 'close'));
            $this->initialized = true;
        }

        $context = $record['context'];
<<<<<<< HEAD
        $payload = array();
        if (isset($context['payload'])) {
            $payload = $context['payload'];
            unset($context['payload']);
        }
        $context = array_merge($context, $record['extra'], array(
=======
        $context = array_merge($context, $record['extra'], [
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            'level' => $this->levelMap[$record['level']],
            'monolog_level' => $record['level_name'],
            'channel' => $record['channel'],
            'datetime' => $record['datetime']->format('U'),
<<<<<<< HEAD
        ));

        if (isset($context['exception']) && $context['exception'] instanceof Exception) {
            $payload['level'] = $context['level'];
            $exception = $context['exception'];
            unset($context['exception']);

            $this->rollbarNotifier->report_exception($exception, $context, $payload);
        } else {
            $this->rollbarNotifier->report_message(
                $record['message'],
                $context['level'],
                $context,
                $payload
            );
        }

        $this->hasRecords = true;
    }

    public function flush()
    {
        if ($this->hasRecords) {
            $this->rollbarNotifier->flush();
=======
        ]);

        if (isset($context['exception']) && $context['exception'] instanceof Throwable) {
            $exception = $context['exception'];
            unset($context['exception']);
            $toLog = $exception;
        } else {
            $toLog = $record['message'];
        }

        $this->rollbarLogger->log($context['level'], $toLog, $context);

        $this->hasRecords = true;
    }

    public function flush(): void
    {
        if ($this->hasRecords) {
            $this->rollbarLogger->flush();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $this->hasRecords = false;
        }
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function close()
=======
    public function close(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function reset()
    {
        $this->flush();

        parent::reset();
    }
<<<<<<< HEAD


=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
