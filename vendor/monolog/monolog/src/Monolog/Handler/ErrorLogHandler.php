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

use Monolog\Formatter\LineFormatter;
<<<<<<< HEAD
=======
use Monolog\Formatter\FormatterInterface;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use Monolog\Logger;

/**
 * Stores to PHP error_log() handler.
 *
 * @author Elan Ruusamäe <glen@delfi.ee>
 */
class ErrorLogHandler extends AbstractProcessingHandler
{
<<<<<<< HEAD
    const OPERATING_SYSTEM = 0;
    const SAPI = 4;
=======
    public const OPERATING_SYSTEM = 0;
    public const SAPI = 4;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    protected $messageType;
    protected $expandNewlines;

    /**
<<<<<<< HEAD
     * @param int  $messageType    Says where the error should go.
     * @param int  $level          The minimum logging level at which this handler will be triggered
     * @param bool $bubble         Whether the messages that are handled can bubble up the stack or not
     * @param bool $expandNewlines If set to true, newlines in the message will be expanded to be take multiple log entries
     */
    public function __construct($messageType = self::OPERATING_SYSTEM, $level = Logger::DEBUG, $bubble = true, $expandNewlines = false)
    {
        parent::__construct($level, $bubble);

        if (false === in_array($messageType, self::getAvailableTypes())) {
            $message = sprintf('The given message type "%s" is not supported', print_r($messageType, true));
=======
     * @param int        $messageType    Says where the error should go.
     * @param int|string $level          The minimum logging level at which this handler will be triggered
     * @param bool       $bubble         Whether the messages that are handled can bubble up the stack or not
     * @param bool       $expandNewlines If set to true, newlines in the message will be expanded to be take multiple log entries
     */
    public function __construct(int $messageType = self::OPERATING_SYSTEM, $level = Logger::DEBUG, bool $bubble = true, bool $expandNewlines = false)
    {
        parent::__construct($level, $bubble);

        if (false === in_array($messageType, self::getAvailableTypes(), true)) {
            $message = sprintf('The given message type "%s" is not supported', print_r($messageType, true));

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            throw new \InvalidArgumentException($message);
        }

        $this->messageType = $messageType;
        $this->expandNewlines = $expandNewlines;
    }

    /**
     * @return array With all available types
     */
<<<<<<< HEAD
    public static function getAvailableTypes()
    {
        return array(
            self::OPERATING_SYSTEM,
            self::SAPI,
        );
=======
    public static function getAvailableTypes(): array
    {
        return [
            self::OPERATING_SYSTEM,
            self::SAPI,
        ];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * {@inheritDoc}
     */
<<<<<<< HEAD
    protected function getDefaultFormatter()
=======
    protected function getDefaultFormatter(): FormatterInterface
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return new LineFormatter('[%datetime%] %channel%.%level_name%: %message% %context% %extra%');
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function write(array $record)
    {
        if ($this->expandNewlines) {
            $lines = preg_split('{[\r\n]+}', (string) $record['formatted']);
            foreach ($lines as $line) {
                error_log($line, $this->messageType);
            }
        } else {
            error_log((string) $record['formatted'], $this->messageType);
=======
    protected function write(array $record): void
    {
        if (!$this->expandNewlines) {
            error_log((string) $record['formatted'], $this->messageType);

            return;
        }

        $lines = preg_split('{[\r\n]+}', (string) $record['formatted']);
        foreach ($lines as $line) {
            error_log($line, $this->messageType);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }
    }
}
