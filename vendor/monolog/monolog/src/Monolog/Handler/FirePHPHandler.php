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

use Monolog\Formatter\WildfireFormatter;
<<<<<<< HEAD
=======
use Monolog\Formatter\FormatterInterface;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * Simple FirePHP Handler (http://www.firephp.org/), which uses the Wildfire protocol.
 *
 * @author Eric Clemmons (@ericclemmons) <eric@uxdriven.com>
 */
class FirePHPHandler extends AbstractProcessingHandler
{
<<<<<<< HEAD
    /**
     * WildFire JSON header message format
     */
    const PROTOCOL_URI = 'http://meta.wildfirehq.org/Protocol/JsonStream/0.2';
=======
    use WebRequestRecognizerTrait;

    /**
     * WildFire JSON header message format
     */
    protected const PROTOCOL_URI = 'http://meta.wildfirehq.org/Protocol/JsonStream/0.2';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * FirePHP structure for parsing messages & their presentation
     */
<<<<<<< HEAD
    const STRUCTURE_URI = 'http://meta.firephp.org/Wildfire/Structure/FirePHP/FirebugConsole/0.1';
=======
    protected const STRUCTURE_URI = 'http://meta.firephp.org/Wildfire/Structure/FirePHP/FirebugConsole/0.1';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Must reference a "known" plugin, otherwise headers won't display in FirePHP
     */
<<<<<<< HEAD
    const PLUGIN_URI = 'http://meta.firephp.org/Wildfire/Plugin/FirePHP/Library-FirePHPCore/0.3';
=======
    protected const PLUGIN_URI = 'http://meta.firephp.org/Wildfire/Plugin/FirePHP/Library-FirePHPCore/0.3';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Header prefix for Wildfire to recognize & parse headers
     */
<<<<<<< HEAD
    const HEADER_PREFIX = 'X-Wf';
=======
    protected const HEADER_PREFIX = 'X-Wf';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Whether or not Wildfire vendor-specific headers have been generated & sent yet
     */
    protected static $initialized = false;

    /**
     * Shared static message index between potentially multiple handlers
     * @var int
     */
    protected static $messageIndex = 1;

    protected static $sendHeaders = true;

    /**
     * Base header creation function used by init headers & record headers
     *
     * @param  array  $meta    Wildfire Plugin, Protocol & Structure Indexes
     * @param  string $message Log message
     * @return array  Complete header string ready for the client as key and message as value
     */
<<<<<<< HEAD
    protected function createHeader(array $meta, $message)
    {
        $header = sprintf('%s-%s', self::HEADER_PREFIX, join('-', $meta));

        return array($header => $message);
=======
    protected function createHeader(array $meta, string $message): array
    {
        $header = sprintf('%s-%s', static::HEADER_PREFIX, join('-', $meta));

        return [$header => $message];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Creates message header from record
     *
     * @see createHeader()
<<<<<<< HEAD
     * @param  array  $record
     * @return string
     */
    protected function createRecordHeader(array $record)
=======
     */
    protected function createRecordHeader(array $record): array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        // Wildfire is extensible to support multiple protocols & plugins in a single request,
        // but we're not taking advantage of that (yet), so we're using "1" for simplicity's sake.
        return $this->createHeader(
<<<<<<< HEAD
            array(1, 1, 1, self::$messageIndex++),
=======
            [1, 1, 1, self::$messageIndex++],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $record['formatted']
        );
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
        return new WildfireFormatter();
    }

    /**
     * Wildfire initialization headers to enable message parsing
     *
     * @see createHeader()
     * @see sendHeader()
<<<<<<< HEAD
     * @return array
     */
    protected function getInitHeaders()
    {
        // Initial payload consists of required headers for Wildfire
        return array_merge(
            $this->createHeader(array('Protocol', 1), self::PROTOCOL_URI),
            $this->createHeader(array(1, 'Structure', 1), self::STRUCTURE_URI),
            $this->createHeader(array(1, 'Plugin', 1), self::PLUGIN_URI)
=======
     */
    protected function getInitHeaders(): array
    {
        // Initial payload consists of required headers for Wildfire
        return array_merge(
            $this->createHeader(['Protocol', 1], static::PROTOCOL_URI),
            $this->createHeader([1, 'Structure', 1], static::STRUCTURE_URI),
            $this->createHeader([1, 'Plugin', 1], static::PLUGIN_URI)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );
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
     * Creates & sends header for a record, ensuring init headers have been sent prior
     *
     * @see sendHeader()
     * @see sendInitHeaders()
     * @param array $record
     */
<<<<<<< HEAD
    protected function write(array $record)
    {
        if (!self::$sendHeaders) {
=======
    protected function write(array $record): void
    {
        if (!self::$sendHeaders || !$this->isWebRequest()) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            return;
        }

        // WildFire-specific headers must be sent prior to any messages
        if (!self::$initialized) {
            self::$initialized = true;

            self::$sendHeaders = $this->headersAccepted();
            if (!self::$sendHeaders) {
                return;
            }

            foreach ($this->getInitHeaders() as $header => $content) {
                $this->sendHeader($header, $content);
            }
        }

        $header = $this->createRecordHeader($record);
        if (trim(current($header)) !== '') {
            $this->sendHeader(key($header), current($header));
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
        if (!empty($_SERVER['HTTP_USER_AGENT']) && preg_match('{\bFirePHP/\d+\.\d+\b}', $_SERVER['HTTP_USER_AGENT'])) {
            return true;
        }

        return isset($_SERVER['HTTP_X_FIREPHP_VERSION']);
    }
<<<<<<< HEAD

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
    }
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
