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

use Monolog\Formatter\FormatterInterface;
use Monolog\Logger;
<<<<<<< HEAD
use Monolog\Utils;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use Monolog\Handler\Slack\SlackRecord;

/**
 * Sends notifications through Slack API
 *
 * @author Greg Kedzierski <greg@gregkedzierski.com>
 * @see    https://api.slack.com/
 */
class SlackHandler extends SocketHandler
{
    /**
     * Slack API token
     * @var string
     */
    private $token;

    /**
     * Instance of the SlackRecord util class preparing data for Slack API.
     * @var SlackRecord
     */
    private $slackRecord;

    /**
     * @param  string                    $token                  Slack API token
     * @param  string                    $channel                Slack channel (encoded ID or name)
     * @param  string|null               $username               Name of a bot
     * @param  bool                      $useAttachment          Whether the message should be added to Slack as attachment (plain text otherwise)
     * @param  string|null               $iconEmoji              The emoji name to use (or null)
     * @param  int                       $level                  The minimum logging level at which this handler will be triggered
     * @param  bool                      $bubble                 Whether the messages that are handled can bubble up the stack or not
     * @param  bool                      $useShortAttachment     Whether the the context/extra messages added to Slack as attachments are in a short style
     * @param  bool                      $includeContextAndExtra Whether the attachment should include context and extra data
     * @param  array                     $excludeFields          Dot separated list of fields to exclude from slack message. E.g. ['context.field1', 'extra.field2']
     * @throws MissingExtensionException If no OpenSSL PHP extension configured
     */
<<<<<<< HEAD
    public function __construct($token, $channel, $username = null, $useAttachment = true, $iconEmoji = null, $level = Logger::CRITICAL, $bubble = true, $useShortAttachment = false, $includeContextAndExtra = false, array $excludeFields = array())
    {
=======
    public function __construct(
        string $token,
        string $channel,
        ?string $username = null,
        bool $useAttachment = true,
        ?string $iconEmoji = null,
        $level = Logger::CRITICAL,
        bool $bubble = true,
        bool $useShortAttachment = false,
        bool $includeContextAndExtra = false,
        array $excludeFields = array()
    ) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        if (!extension_loaded('openssl')) {
            throw new MissingExtensionException('The OpenSSL PHP extension is required to use the SlackHandler');
        }

        parent::__construct('ssl://slack.com:443', $level, $bubble);

        $this->slackRecord = new SlackRecord(
            $channel,
            $username,
            $useAttachment,
            $iconEmoji,
            $useShortAttachment,
            $includeContextAndExtra,
<<<<<<< HEAD
            $excludeFields,
            $this->formatter
=======
            $excludeFields
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );

        $this->token = $token;
    }

<<<<<<< HEAD
    public function getSlackRecord()
=======
    public function getSlackRecord(): SlackRecord
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->slackRecord;
    }

<<<<<<< HEAD
    public function getToken()
=======
    public function getToken(): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->token;
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
=======
     */
    private function buildContent(array $record): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $dataArray = $this->prepareContentData($record);

        return http_build_query($dataArray);
    }

<<<<<<< HEAD
    /**
     * Prepares content data
     *
     * @param  array $record
     * @return array
     */
    protected function prepareContentData($record)
=======
    protected function prepareContentData(array $record): array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $dataArray = $this->slackRecord->getSlackData($record);
        $dataArray['token'] = $this->token;

        if (!empty($dataArray['attachments'])) {
<<<<<<< HEAD
            $dataArray['attachments'] = Utils::jsonEncode($dataArray['attachments']);
=======
            $dataArray['attachments'] = json_encode($dataArray['attachments']);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return $dataArray;
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
        $header = "POST /api/chat.postMessage HTTP/1.1\r\n";
        $header .= "Host: slack.com\r\n";
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $header .= "Content-Length: " . strlen($content) . "\r\n";
        $header .= "\r\n";

        return $header;
    }

    /**
     * {@inheritdoc}
<<<<<<< HEAD
     *
     * @param array $record
     */
    protected function write(array $record)
=======
     */
    protected function write(array $record): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        parent::write($record);
        $this->finalizeWrite();
    }

    /**
     * Finalizes the request by reading some bytes and then closing the socket
     *
     * If we do not read some but close the socket too early, slack sometimes
     * drops the request entirely.
     */
<<<<<<< HEAD
    protected function finalizeWrite()
=======
    protected function finalizeWrite(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $res = $this->getResource();
        if (is_resource($res)) {
            @fread($res, 2048);
        }
        $this->closeSocket();
    }

<<<<<<< HEAD
    /**
     * Returned a Slack message attachment color associated with
     * provided level.
     *
     * @param  int    $level
     * @return string
     * @deprecated Use underlying SlackRecord instead
     */
    protected function getAttachmentColor($level)
    {
        trigger_error(
            'SlackHandler::getAttachmentColor() is deprecated. Use underlying SlackRecord instead.',
            E_USER_DEPRECATED
        );

        return $this->slackRecord->getAttachmentColor($level);
    }

    /**
     * Stringifies an array of key/value pairs to be used in attachment fields
     *
     * @param  array  $fields
     * @return string
     * @deprecated Use underlying SlackRecord instead
     */
    protected function stringify($fields)
    {
        trigger_error(
            'SlackHandler::stringify() is deprecated. Use underlying SlackRecord instead.',
            E_USER_DEPRECATED
        );

        return $this->slackRecord->stringify($fields);
    }

    public function setFormatter(FormatterInterface $formatter)
    {
        parent::setFormatter($formatter);
        $this->slackRecord->setFormatter($formatter);
=======
    public function setFormatter(FormatterInterface $formatter): HandlerInterface
    {
        parent::setFormatter($formatter);
        $this->slackRecord->setFormatter($formatter);

        return $this;
    }

    public function getFormatter(): FormatterInterface
    {
        $formatter = parent::getFormatter();
        $this->slackRecord->setFormatter($formatter);

        return $formatter;
    }

    /**
     * Channel used by the bot when posting
     */
    public function setChannel(string $channel): self
    {
        $this->slackRecord->setChannel($channel);

        return $this;
    }

    /**
     * Username used by the bot when posting
     */
    public function setUsername(string $username): self
    {
        $this->slackRecord->setUsername($username);

        return $this;
    }

    public function useAttachment(bool $useAttachment): self
    {
        $this->slackRecord->useAttachment($useAttachment);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return $this;
    }

<<<<<<< HEAD
    public function getFormatter()
    {
        $formatter = parent::getFormatter();
        $this->slackRecord->setFormatter($formatter);

        return $formatter;
=======
    public function setIconEmoji(string $iconEmoji): self
    {
        $this->slackRecord->setUserIcon($iconEmoji);

        return $this;
    }

    public function useShortAttachment(bool $useShortAttachment): self
    {
        $this->slackRecord->useShortAttachment($useShortAttachment);

        return $this;
    }

    public function includeContextAndExtra(bool $includeContextAndExtra): self
    {
        $this->slackRecord->includeContextAndExtra($includeContextAndExtra);

        return $this;
    }

    public function excludeFields(array $excludeFields): self
    {
        $this->slackRecord->excludeFields($excludeFields);

        return $this;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
