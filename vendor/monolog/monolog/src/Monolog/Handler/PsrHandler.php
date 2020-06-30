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
use Psr\Log\LoggerInterface;
<<<<<<< HEAD
=======
use Monolog\Formatter\FormatterInterface;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * Proxies log messages to an existing PSR-3 compliant logger.
 *
<<<<<<< HEAD
 * @author Michael Moussa <michael.moussa@gmail.com>
 */
class PsrHandler extends AbstractHandler
=======
 * If a formatter is configured, the formatter's output MUST be a string and the
 * formatted message will be fed to the wrapped PSR logger instead of the original
 * log record's message.
 *
 * @author Michael Moussa <michael.moussa@gmail.com>
 */
class PsrHandler extends AbstractHandler implements FormattableHandlerInterface
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * PSR-3 compliant logger
     *
     * @var LoggerInterface
     */
    protected $logger;

    /**
<<<<<<< HEAD
     * @param LoggerInterface $logger The underlying PSR-3 compliant logger to which messages will be proxied
     * @param int             $level  The minimum logging level at which this handler will be triggered
     * @param bool            $bubble Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct(LoggerInterface $logger, $level = Logger::DEBUG, $bubble = true)
=======
     * @var FormatterInterface|null
     */
    protected $formatter;

    /**
     * @param LoggerInterface $logger The underlying PSR-3 compliant logger to which messages will be proxied
     * @param string|int      $level  The minimum logging level at which this handler will be triggered
     * @param bool            $bubble Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct(LoggerInterface $logger, $level = Logger::DEBUG, bool $bubble = true)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        parent::__construct($level, $bubble);

        $this->logger = $logger;
    }

    /**
     * {@inheritDoc}
     */
<<<<<<< HEAD
    public function handle(array $record)
=======
    public function handle(array $record): bool
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!$this->isHandling($record)) {
            return false;
        }

<<<<<<< HEAD
        $this->logger->log(strtolower($record['level_name']), $record['message'], $record['context']);

        return false === $this->bubble;
    }
=======
        if ($this->formatter) {
            $formatted = $this->formatter->format($record);
            $this->logger->log(strtolower($record['level_name']), (string) $formatted, $record['context']);
        } else {
            $this->logger->log(strtolower($record['level_name']), $record['message'], $record['context']);
        }

        return false === $this->bubble;
    }

    /**
     * Sets the formatter.
     *
     * @param FormatterInterface $formatter
     */
    public function setFormatter(FormatterInterface $formatter): HandlerInterface
    {
        $this->formatter = $formatter;

        return $this;
    }

    /**
     * Gets the formatter.
     *
     * @return FormatterInterface
     */
    public function getFormatter(): FormatterInterface
    {
        if (!$this->formatter) {
            throw new \LogicException('No formatter has been set and this handler does not have a default formatter');
        }

        return $this->formatter;
    }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
