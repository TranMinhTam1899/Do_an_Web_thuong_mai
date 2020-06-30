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
use Monolog\Formatter\FormatterInterface;
use Monolog\Formatter\LineFormatter;
<<<<<<< HEAD
=======
use Swift_Message;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use Swift;

/**
 * SwiftMailerHandler uses Swift_Mailer to send the emails
 *
 * @author Gyula Sallai
 */
class SwiftMailerHandler extends MailHandler
{
    protected $mailer;
    private $messageTemplate;

    /**
<<<<<<< HEAD
     * @param \Swift_Mailer           $mailer  The mailer to use
     * @param callable|\Swift_Message $message An example message for real messages, only the body will be replaced
     * @param int                     $level   The minimum logging level at which this handler will be triggered
     * @param bool                    $bubble  Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct(\Swift_Mailer $mailer, $message, $level = Logger::ERROR, $bubble = true)
=======
     * @param \Swift_Mailer          $mailer  The mailer to use
     * @param callable|Swift_Message $message An example message for real messages, only the body will be replaced
     * @param string|int             $level   The minimum logging level at which this handler will be triggered
     * @param bool                   $bubble  Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct(\Swift_Mailer $mailer, $message, $level = Logger::ERROR, bool $bubble = true)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        parent::__construct($level, $bubble);

        $this->mailer = $mailer;
        $this->messageTemplate = $message;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function send($content, array $records)
=======
    protected function send(string $content, array $records): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->mailer->send($this->buildMessage($content, $records));
    }

    /**
     * Gets the formatter for the Swift_Message subject.
     *
<<<<<<< HEAD
     * @param  string             $format The format of the subject
     * @return FormatterInterface
     */
    protected function getSubjectFormatter($format)
=======
     * @param string $format The format of the subject
     */
    protected function getSubjectFormatter(string $format): FormatterInterface
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return new LineFormatter($format);
    }

    /**
     * Creates instance of Swift_Message to be sent
     *
<<<<<<< HEAD
     * @param  string         $content formatted email body to be sent
     * @param  array          $records Log records that formed the content
     * @return \Swift_Message
     */
    protected function buildMessage($content, array $records)
    {
        $message = null;
        if ($this->messageTemplate instanceof \Swift_Message) {
=======
     * @param  string        $content formatted email body to be sent
     * @param  array         $records Log records that formed the content
     * @return Swift_Message
     */
    protected function buildMessage(string $content, array $records): Swift_Message
    {
        $message = null;
        if ($this->messageTemplate instanceof Swift_Message) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $message = clone $this->messageTemplate;
            $message->generateId();
        } elseif (is_callable($this->messageTemplate)) {
            $message = call_user_func($this->messageTemplate, $content, $records);
        }

<<<<<<< HEAD
        if (!$message instanceof \Swift_Message) {
=======
        if (!$message instanceof Swift_Message) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            throw new \InvalidArgumentException('Could not resolve message as instance of Swift_Message or a callable returning it');
        }

        if ($records) {
            $subjectFormatter = $this->getSubjectFormatter($message->getSubject());
            $message->setSubject($subjectFormatter->format($this->getHighestRecord($records)));
        }

<<<<<<< HEAD
        $message->setBody($content);
=======
        $mime = 'text/plain';
        if ($this->isHtmlBody($content)) {
            $mime = 'text/html';
        }

        $message->setBody($content, $mime);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        if (version_compare(Swift::VERSION, '6.0.0', '>=')) {
            $message->setDate(new \DateTimeImmutable());
        } else {
            $message->setDate(time());
        }

        return $message;
    }
<<<<<<< HEAD

    /**
     * BC getter, to be removed in 2.0
     */
    public function __get($name)
    {
        if ($name === 'message') {
            trigger_error('SwiftMailerHandler->message is deprecated, use ->buildMessage() instead to retrieve the message', E_USER_DEPRECATED);

            return $this->buildMessage(null, array());
        }

        throw new \InvalidArgumentException('Invalid property '.$name);
    }
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
