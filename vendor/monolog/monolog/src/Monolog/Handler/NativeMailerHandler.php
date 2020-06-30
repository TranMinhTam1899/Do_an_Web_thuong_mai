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
use Monolog\Formatter\LineFormatter;

/**
 * NativeMailerHandler uses the mail() function to send the emails
 *
 * @author Christophe Coevoet <stof@notk.org>
 * @author Mark Garrett <mark@moderndeveloperllc.com>
 */
class NativeMailerHandler extends MailHandler
{
    /**
     * The email addresses to which the message will be sent
     * @var array
     */
    protected $to;

    /**
     * The subject of the email
     * @var string
     */
    protected $subject;

    /**
     * Optional headers for the message
     * @var array
     */
<<<<<<< HEAD
    protected $headers = array();
=======
    protected $headers = [];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Optional parameters for the message
     * @var array
     */
<<<<<<< HEAD
    protected $parameters = array();
=======
    protected $parameters = [];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * The wordwrap length for the message
     * @var int
     */
    protected $maxColumnWidth;

    /**
     * The Content-type for the message
<<<<<<< HEAD
     * @var string
     */
    protected $contentType = 'text/plain';
=======
     * @var string|null
     */
    protected $contentType;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * The encoding for the message
     * @var string
     */
    protected $encoding = 'utf-8';

    /**
     * @param string|array $to             The receiver of the mail
     * @param string       $subject        The subject of the mail
     * @param string       $from           The sender of the mail
<<<<<<< HEAD
     * @param int          $level          The minimum logging level at which this handler will be triggered
     * @param bool         $bubble         Whether the messages that are handled can bubble up the stack or not
     * @param int          $maxColumnWidth The maximum column width that the message lines will have
     */
    public function __construct($to, $subject, $from, $level = Logger::ERROR, $bubble = true, $maxColumnWidth = 70)
    {
        parent::__construct($level, $bubble);
        $this->to = is_array($to) ? $to : array($to);
=======
     * @param string|int   $level          The minimum logging level at which this handler will be triggered
     * @param bool         $bubble         Whether the messages that are handled can bubble up the stack or not
     * @param int          $maxColumnWidth The maximum column width that the message lines will have
     */
    public function __construct($to, string $subject, string $from, $level = Logger::ERROR, bool $bubble = true, int $maxColumnWidth = 70)
    {
        parent::__construct($level, $bubble);
        $this->to = (array) $to;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $this->subject = $subject;
        $this->addHeader(sprintf('From: %s', $from));
        $this->maxColumnWidth = $maxColumnWidth;
    }

    /**
     * Add headers to the message
     *
<<<<<<< HEAD
     * @param  string|array $headers Custom added headers
     * @return self
     */
    public function addHeader($headers)
=======
     * @param string|array $headers Custom added headers
     */
    public function addHeader($headers): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        foreach ((array) $headers as $header) {
            if (strpos($header, "\n") !== false || strpos($header, "\r") !== false) {
                throw new \InvalidArgumentException('Headers can not contain newline characters for security reasons');
            }
            $this->headers[] = $header;
        }

        return $this;
    }

    /**
     * Add parameters to the message
     *
<<<<<<< HEAD
     * @param  string|array $parameters Custom added parameters
     * @return self
     */
    public function addParameter($parameters)
=======
     * @param string|array $parameters Custom added parameters
     */
    public function addParameter($parameters): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->parameters = array_merge($this->parameters, (array) $parameters);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function send($content, array $records)
    {
        $content = wordwrap($content, $this->maxColumnWidth);
        $headers = ltrim(implode("\r\n", $this->headers) . "\r\n", "\r\n");
        $headers .= 'Content-type: ' . $this->getContentType() . '; charset=' . $this->getEncoding() . "\r\n";
        if ($this->getContentType() == 'text/html' && false === strpos($headers, 'MIME-Version:')) {
=======
    protected function send(string $content, array $records): void
    {
        $contentType = $this->getContentType() ?: ($this->isHtmlBody($content) ? 'text/html' : 'text/plain');

        if ($contentType !== 'text/html') {
            $content = wordwrap($content, $this->maxColumnWidth);
        }

        $headers = ltrim(implode("\r\n", $this->headers) . "\r\n", "\r\n");
        $headers .= 'Content-type: ' . $contentType . '; charset=' . $this->getEncoding() . "\r\n";
        if ($contentType === 'text/html' && false === strpos($headers, 'MIME-Version:')) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $headers .= 'MIME-Version: 1.0' . "\r\n";
        }

        $subject = $this->subject;
        if ($records) {
            $subjectFormatter = new LineFormatter($this->subject);
            $subject = $subjectFormatter->format($this->getHighestRecord($records));
        }

        $parameters = implode(' ', $this->parameters);
        foreach ($this->to as $to) {
            mail($to, $subject, $content, $headers, $parameters);
        }
    }

<<<<<<< HEAD
    /**
     * @return string $contentType
     */
    public function getContentType()
=======
    public function getContentType(): ?string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->contentType;
    }

<<<<<<< HEAD
    /**
     * @return string $encoding
     */
    public function getEncoding()
=======
    public function getEncoding(): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->encoding;
    }

    /**
<<<<<<< HEAD
     * @param  string $contentType The content type of the email - Defaults to text/plain. Use text/html for HTML
     *                             messages.
     * @return self
     */
    public function setContentType($contentType)
=======
     * @param string $contentType The content type of the email - Defaults to text/plain. Use text/html for HTML messages.
     */
    public function setContentType(string $contentType): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (strpos($contentType, "\n") !== false || strpos($contentType, "\r") !== false) {
            throw new \InvalidArgumentException('The content type can not contain newline characters to prevent email header injection');
        }

        $this->contentType = $contentType;

        return $this;
    }

<<<<<<< HEAD
    /**
     * @param  string $encoding
     * @return self
     */
    public function setEncoding($encoding)
=======
    public function setEncoding(string $encoding): self
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (strpos($encoding, "\n") !== false || strpos($encoding, "\r") !== false) {
            throw new \InvalidArgumentException('The encoding can not contain newline characters to prevent email header injection');
        }

        $this->encoding = $encoding;

        return $this;
    }
}
