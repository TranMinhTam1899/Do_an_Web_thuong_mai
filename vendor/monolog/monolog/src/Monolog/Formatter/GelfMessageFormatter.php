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

namespace Monolog\Formatter;

use Monolog\Logger;
use Gelf\Message;
<<<<<<< HEAD

/**
 * Serializes a log message to GELF
 * @see http://www.graylog2.org/about/gelf
=======
use Monolog\Utils;

/**
 * Serializes a log message to GELF
 * @see http://docs.graylog.org/en/latest/pages/gelf.html
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 *
 * @author Matt Lehner <mlehner@gmail.com>
 */
class GelfMessageFormatter extends NormalizerFormatter
{
<<<<<<< HEAD
    const DEFAULT_MAX_LENGTH = 32766;
=======
    protected const DEFAULT_MAX_LENGTH = 32766;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * @var string the name of the system for the Gelf log message
     */
    protected $systemName;

    /**
     * @var string a prefix for 'extra' fields from the Monolog record (optional)
     */
    protected $extraPrefix;

    /**
     * @var string a prefix for 'context' fields from the Monolog record (optional)
     */
    protected $contextPrefix;

    /**
     * @var int max length per field
     */
    protected $maxLength;

    /**
     * Translates Monolog log levels to Graylog2 log priorities.
     */
<<<<<<< HEAD
    private $logLevels = array(
=======
    private $logLevels = [
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        Logger::DEBUG     => 7,
        Logger::INFO      => 6,
        Logger::NOTICE    => 5,
        Logger::WARNING   => 4,
        Logger::ERROR     => 3,
        Logger::CRITICAL  => 2,
        Logger::ALERT     => 1,
        Logger::EMERGENCY => 0,
<<<<<<< HEAD
    );

    public function __construct($systemName = null, $extraPrefix = null, $contextPrefix = 'ctxt_', $maxLength = null)
    {
        parent::__construct('U.u');

        $this->systemName = $systemName ?: gethostname();

        $this->extraPrefix = $extraPrefix;
=======
    ];

    public function __construct(?string $systemName = null, ?string $extraPrefix = null, string $contextPrefix = 'ctxt_', ?int $maxLength = null)
    {
        parent::__construct('U.u');

        $this->systemName = (is_null($systemName) || $systemName === '') ? gethostname() : $systemName;

        $this->extraPrefix = is_null($extraPrefix) ? '' : $extraPrefix;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $this->contextPrefix = $contextPrefix;
        $this->maxLength = is_null($maxLength) ? self::DEFAULT_MAX_LENGTH : $maxLength;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function format(array $record)
    {
        $record = parent::format($record);
=======
    public function format(array $record): Message
    {
        if (isset($record['context'])) {
            $record['context'] = parent::format($record['context']);
        }
        if (isset($record['extra'])) {
            $record['extra'] = parent::format($record['extra']);
        }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        if (!isset($record['datetime'], $record['message'], $record['level'])) {
            throw new \InvalidArgumentException('The record should at least contain datetime, message and level keys, '.var_export($record, true).' given');
        }

        $message = new Message();
        $message
            ->setTimestamp($record['datetime'])
            ->setShortMessage((string) $record['message'])
            ->setHost($this->systemName)
            ->setLevel($this->logLevels[$record['level']]);

<<<<<<< HEAD
        // message length + system name length + 200 for padding / metadata 
        $len = 200 + strlen((string) $record['message']) + strlen($this->systemName);

        if ($len > $this->maxLength) {
            $message->setShortMessage(substr($record['message'], 0, $this->maxLength));
=======
        // message length + system name length + 200 for padding / metadata
        $len = 200 + strlen((string) $record['message']) + strlen($this->systemName);

        if ($len > $this->maxLength) {
            $message->setShortMessage(Utils::substr($record['message'], 0, $this->maxLength));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        if (isset($record['channel'])) {
            $message->setFacility($record['channel']);
        }
        if (isset($record['extra']['line'])) {
            $message->setLine($record['extra']['line']);
            unset($record['extra']['line']);
        }
        if (isset($record['extra']['file'])) {
            $message->setFile($record['extra']['file']);
            unset($record['extra']['file']);
        }

        foreach ($record['extra'] as $key => $val) {
            $val = is_scalar($val) || null === $val ? $val : $this->toJson($val);
            $len = strlen($this->extraPrefix . $key . $val);
            if ($len > $this->maxLength) {
<<<<<<< HEAD
                $message->setAdditional($this->extraPrefix . $key, substr($val, 0, $this->maxLength));
                break;
=======
                $message->setAdditional($this->extraPrefix . $key, Utils::substr($val, 0, $this->maxLength));

                continue;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            }
            $message->setAdditional($this->extraPrefix . $key, $val);
        }

        foreach ($record['context'] as $key => $val) {
            $val = is_scalar($val) || null === $val ? $val : $this->toJson($val);
            $len = strlen($this->contextPrefix . $key . $val);
            if ($len > $this->maxLength) {
<<<<<<< HEAD
                $message->setAdditional($this->contextPrefix . $key, substr($val, 0, $this->maxLength));
                break;
=======
                $message->setAdditional($this->contextPrefix . $key, Utils::substr($val, 0, $this->maxLength));

                continue;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            }
            $message->setAdditional($this->contextPrefix . $key, $val);
        }

        if (null === $message->getFile() && isset($record['context']['exception']['file'])) {
            if (preg_match("/^(.+):([0-9]+)$/", $record['context']['exception']['file'], $matches)) {
                $message->setFile($matches[1]);
                $message->setLine($matches[2]);
            }
        }

        return $message;
    }
}
