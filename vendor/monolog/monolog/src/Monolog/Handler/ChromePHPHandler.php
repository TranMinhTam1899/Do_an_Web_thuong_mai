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

use Monolog\Formatter\ChromePHPFormatter;
<<<<<<< HEAD
use Monolog\Logger;
use Monolog\Utils;
=======
use Monolog\Formatter\FormatterInterface;
use Monolog\Logger;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * Handler sending logs to the ChromePHP extension (http://www.chromephp.com/)
 *
 * This also works out of the box with Firefox 43+
 *
 * @author Christophe Coevoet <stof@notk.org>
 */
class ChromePHPHandler extends AbstractProcessingHandler
{
<<<<<<< HEAD
    /**
     * Version of the extension
     */
    const VERSION = '4.0';
=======
    use WebRequestRecognizerTrait;

    /**
     * Version of the extension
     */
    protected const VERSION = '4.0';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Header name
     */
<<<<<<< HEAD
    const HEADER_NAME = 'X-ChromeLogger-Data';
=======
    protected const HEADER_NAME = 'X-ChromeLogger-Data';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Regular expression to detect supported browsers (matches any Chrome, or Firefox 43+)
     */
<<<<<<< HEAD
    const USER_AGENT_REGEX = '{\b(?:Chrome/\d+(?:\.\d+)*|HeadlessChrome|Firefox/(?:4[3-9]|[5-9]\d|\d{3,})(?:\.\d)*)\b}';
=======
    protected const USER_AGENT_REGEX = '{\b(?:Chrome/\d+(?:\.\d+)*|HeadlessChrome|Firefox/(?:4[3-9]|[5-9]\d|\d{3,})(?:\.\d)*)\b}';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    protected static $initialized = false;

    /**
     * Tracks whether we sent too much data
     *
<<<<<<< HEAD
     * Chrome limits the headers to 4KB, so when we sent 3KB we stop sending
=======
     * Chrome limits the headers to 256KB, so when we sent 240KB we stop sending
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     *
     * @var bool
     */
    protected static $overflowed = false;

<<<<<<< HEAD
    protected static $json = array(
        'version' => self::VERSION,
        'columns' => array('label', 'log', 'backtrace', 'type'),
        'rows' => array(),
    );
=======
    protected static $json = [
        'version' => self::VERSION,
        'columns' => ['label', 'log', 'backtrace', 'type'],
        'rows' => [],
    ];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    protected static $sendHeaders = true;

    /**
<<<<<<< HEAD
     * @param int  $level  The minimum logging level at which this handler will be triggered
     * @param bool $bubble Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct($level = Logger::DEBUG, $bubble = true)
=======
     * @param string|int $level  The minimum logging level at which this handler will be triggered
     * @param bool       $bubble Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct($level = Logger::DEBUG, bool $bubble = true)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        parent::__construct($level, $bubble);
        if (!function_exists('json_encode')) {
            throw new \RuntimeException('PHP\'s json extension is required to use Monolog\'s ChromePHPHandler');
        }
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function handleBatch(array $records)
    {
        $messages = array();
=======
    public function handleBatch(array $records): void
    {
        if (!$this->isWebRequest()) {
            return;
        }

        $messages = [];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        foreach ($records as $record) {
            if ($record['level'] < $this->level) {
                continue;
            }
            $messages[] = $this->processRecord($record);
        }

        if (!empty($messages)) {
            $messages = $this->getFormatter()->formatBatch($messages);
            self::$json['rows'] = array_merge(self::$json['rows'], $messages);
            $this->send();
        }
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
        return new ChromePHPFormatter();
    }

    /**
     * Creates & sends header for a record
     *
     * @see sendHeader()
     * @see send()
<<<<<<< HEAD
     * @param array $record
     */
    protected function write(array $record)
    {
=======
     */
    protected function write(array $record): void
    {
        if (!$this->isWebRequest()) {
            return;
        }

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        self::$json['rows'][] = $record['formatted'];

        $this->send();
    }

    /**
     * Sends the log header
     *
     * @see sendHeader()
     */
<<<<<<< HEAD
    protected function send()
=======
    protected function send(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (self::$overflowed || !self::$sendHeaders) {
            return;
        }

        if (!self::$initialized) {
            self::$initialized = true;

            self::$sendHeaders = $this->headersAccepted();
            if (!self::$sendHeaders) {
                return;
            }

<<<<<<< HEAD
            self::$json['request_uri'] = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
        }

        $json = Utils::jsonEncode(self::$json, null, true);
        $data = base64_encode(utf8_encode($json));
        if (strlen($data) > 3 * 1024) {
            self::$overflowed = true;

            $record = array(
                'message' => 'Incomplete logs, chrome header size limit reached',
                'context' => array(),
                'level' => Logger::WARNING,
                'level_name' => Logger::getLevelName(Logger::WARNING),
                'channel' => 'monolog',
                'datetime' => new \DateTime(),
                'extra' => array(),
            );
            self::$json['rows'][count(self::$json['rows']) - 1] = $this->getFormatter()->format($record);
            $json = Utils::jsonEncode(self::$json, null, true);
=======
            self::$json['request_uri'] = $_SERVER['REQUEST_URI'] ?? '';
        }

        $json = @json_encode(self::$json);
        $data = base64_encode(utf8_encode($json));
        if (strlen($data) > 240 * 1024) {
            self::$overflowed = true;

            $record = [
                'message' => 'Incomplete logs, chrome header size limit reached',
                'context' => [],
                'level' => Logger::WARNING,
                'level_name' => Logger::getLevelName(Logger::WARNING),
                'channel' => 'monolog',
                'datetime' => new \DateTimeImmutable(),
                'extra' => [],
            ];
            self::$json['rows'][count(self::$json['rows']) - 1] = $this->getFormatter()->format($record);
            $json = @json_encode(self::$json);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $data = base64_encode(utf8_encode($json));
        }

        if (trim($data) !== '') {
<<<<<<< HEAD
            $this->sendHeader(self::HEADER_NAME, $data);
=======
            $this->sendHeader(static::HEADER_NAME, $data);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }
    }

    /**
     * Send header string to the client
<<<<<<< HEAD
     *
     * @param string $header
     * @param string $content
     */
    protected function sendHeader($header, $content)
=======
     */
    protected function sendHeader(string $header, string $content): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!headers_sent() && self::$sendHeaders) {
            header(sprintf('%s: %s', $header, $content));
        }
    }

    /**
     * Verifies if the headers are accepted by the current user agent
<<<<<<< HEAD
     *
     * @return bool
     */
    protected function headersAccepted()
=======
     */
    protected function headersAccepted(): bool
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (empty($_SERVER['HTTP_USER_AGENT'])) {
            return false;
        }

<<<<<<< HEAD
        return preg_match(self::USER_AGENT_REGEX, $_SERVER['HTTP_USER_AGENT']);
    }

    /**
     * BC getter for the sendHeaders property that has been made static
     */
    public function __get($property)
    {
        if ('sendHeaders' !== $property) {
            throw new \InvalidArgumentException('Undefined property '.$property);
        }

        return static::$sendHeaders;
    }

    /**
     * BC setter for the sendHeaders property that has been made static
     */
    public function __set($property, $value)
    {
        if ('sendHeaders' !== $property) {
            throw new \InvalidArgumentException('Undefined property '.$property);
        }

        static::$sendHeaders = $value;
=======
        return preg_match(static::USER_AGENT_REGEX, $_SERVER['HTTP_USER_AGENT']) === 1;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
