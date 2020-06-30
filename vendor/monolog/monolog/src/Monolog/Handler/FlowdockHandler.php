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
<<<<<<< HEAD
use Monolog\Utils;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use Monolog\Formatter\FlowdockFormatter;
use Monolog\Formatter\FormatterInterface;

/**
 * Sends notifications through the Flowdock push API
 *
 * This must be configured with a FlowdockFormatter instance via setFormatter()
 *
 * Notes:
 * API token - Flowdock API token
 *
 * @author Dominik Liebler <liebler.dominik@gmail.com>
 * @see https://www.flowdock.com/api/push
 */
class FlowdockHandler extends SocketHandler
{
    /**
     * @var string
     */
    protected $apiToken;

    /**
<<<<<<< HEAD
     * @param string   $apiToken
     * @param bool|int $level    The minimum logging level at which this handler will be triggered
     * @param bool     $bubble   Whether the messages that are handled can bubble up the stack or not
     *
     * @throws MissingExtensionException if OpenSSL is missing
     */
    public function __construct($apiToken, $level = Logger::DEBUG, $bubble = true)
=======
     * @param string|int $level  The minimum logging level at which this handler will be triggered
     * @param bool       $bubble Whether the messages that are handled can bubble up the stack or not
     *
     * @throws MissingExtensionException if OpenSSL is missing
     */
    public function __construct(string $apiToken, $level = Logger::DEBUG, bool $bubble = true)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!extension_loaded('openssl')) {
            throw new MissingExtensionException('The OpenSSL PHP extension is required to use the FlowdockHandler');
        }

        parent::__construct('ssl://api.flowdock.com:443', $level, $bubble);
        $this->apiToken = $apiToken;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function setFormatter(FormatterInterface $formatter)
=======
    public function setFormatter(FormatterInterface $formatter): HandlerInterface
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!$formatter instanceof FlowdockFormatter) {
            throw new \InvalidArgumentException('The FlowdockHandler requires an instance of Monolog\Formatter\FlowdockFormatter to function correctly');
        }

        return parent::setFormatter($formatter);
    }

    /**
     * Gets the default formatter.
<<<<<<< HEAD
     *
     * @return FormatterInterface
     */
    protected function getDefaultFormatter()
=======
     */
    protected function getDefaultFormatter(): FormatterInterface
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        throw new \InvalidArgumentException('The FlowdockHandler must be configured (via setFormatter) with an instance of Monolog\Formatter\FlowdockFormatter to function correctly');
    }

    /**
     * {@inheritdoc}
     *
     * @param array $record
     */
<<<<<<< HEAD
    protected function write(array $record)
=======
    protected function write(array $record): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        parent::write($record);

        $this->closeSocket();
    }

    /**
     * {@inheritdoc}
<<<<<<< HEAD
     *
     * @param  array  $record
     * @return string
     */
    protected function generateDataStream($record)
=======
     */
    protected function generateDataStream(array $record): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $content = $this->buildContent($record);

        return $this->buildHeader($content) . $content;
    }

    /**
     * Builds the body of API call
<<<<<<< HEAD
     *
     * @param  array  $record
     * @return string
     */
    private function buildContent($record)
    {
        return Utils::jsonEncode($record['formatted']['flowdock']);
=======
     */
    private function buildContent(array $record): string
    {
        return json_encode($record['formatted']['flowdock']);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Builds the header of the API Call
<<<<<<< HEAD
     *
     * @param  string $content
     * @return string
     */
    private function buildHeader($content)
=======
     */
    private function buildHeader(string $content): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $header = "POST /v1/messages/team_inbox/" . $this->apiToken . " HTTP/1.1\r\n";
        $header .= "Host: api.flowdock.com\r\n";
        $header .= "Content-Type: application/json\r\n";
        $header .= "Content-Length: " . strlen($content) . "\r\n";
        $header .= "\r\n";

        return $header;
    }
}
