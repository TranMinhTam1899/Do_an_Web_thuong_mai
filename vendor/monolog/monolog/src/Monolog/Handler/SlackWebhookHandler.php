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
 * Sends notifications through Slack Webhooks
 *
 * @author Haralan Dobrev <hkdobrev@gmail.com>
 * @see    https://api.slack.com/incoming-webhooks
 */
class SlackWebhookHandler extends AbstractProcessingHandler
{
    /**
     * Slack Webhook token
     * @var string
     */
    private $webhookUrl;

    /**
     * Instance of the SlackRecord util class preparing data for Slack API.
     * @var SlackRecord
     */
    private $slackRecord;

    /**
<<<<<<< HEAD
     * @param  string      $webhookUrl             Slack Webhook URL
     * @param  string|null $channel                Slack channel (encoded ID or name)
     * @param  string|null $username               Name of a bot
     * @param  bool        $useAttachment          Whether the message should be added to Slack as attachment (plain text otherwise)
     * @param  string|null $iconEmoji              The emoji name to use (or null)
     * @param  bool        $useShortAttachment     Whether the the context/extra messages added to Slack as attachments are in a short style
     * @param  bool        $includeContextAndExtra Whether the attachment should include context and extra data
     * @param  int         $level                  The minimum logging level at which this handler will be triggered
     * @param  bool        $bubble                 Whether the messages that are handled can bubble up the stack or not
     * @param  array       $excludeFields          Dot separated list of fields to exclude from slack message. E.g. ['context.field1', 'extra.field2']
     */
    public function __construct($webhookUrl, $channel = null, $username = null, $useAttachment = true, $iconEmoji = null, $useShortAttachment = false, $includeContextAndExtra = false, $level = Logger::CRITICAL, $bubble = true, array $excludeFields = array())
    {
=======
     * @param string      $webhookUrl             Slack Webhook URL
     * @param string|null $channel                Slack channel (encoded ID or name)
     * @param string|null $username               Name of a bot
     * @param bool        $useAttachment          Whether the message should be added to Slack as attachment (plain text otherwise)
     * @param string|null $iconEmoji              The emoji name to use (or null)
     * @param bool        $useShortAttachment     Whether the the context/extra messages added to Slack as attachments are in a short style
     * @param bool        $includeContextAndExtra Whether the attachment should include context and extra data
     * @param string|int  $level                  The minimum logging level at which this handler will be triggered
     * @param bool        $bubble                 Whether the messages that are handled can bubble up the stack or not
     * @param array       $excludeFields          Dot separated list of fields to exclude from slack message. E.g. ['context.field1', 'extra.field2']
     */
    public function __construct(
        string $webhookUrl,
        ?string $channel = null,
        ?string $username = null,
        bool $useAttachment = true,
        ?string $iconEmoji = null,
        bool $useShortAttachment = false,
        bool $includeContextAndExtra = false,
        $level = Logger::CRITICAL,
        bool $bubble = true,
        array $excludeFields = array()
    ) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        parent::__construct($level, $bubble);

        $this->webhookUrl = $webhookUrl;

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
        );
    }

    public function getSlackRecord()
=======
            $excludeFields
        );
    }

    public function getSlackRecord(): SlackRecord
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->slackRecord;
    }

<<<<<<< HEAD
    public function getWebhookUrl()
=======
    public function getWebhookUrl(): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->webhookUrl;
    }

    /**
     * {@inheritdoc}
     *
     * @param array $record
     */
<<<<<<< HEAD
    protected function write(array $record)
    {
        $postData = $this->slackRecord->getSlackData($record);
        $postString = Utils::jsonEncode($postData);
=======
    protected function write(array $record): void
    {
        $postData = $this->slackRecord->getSlackData($record);
        $postString = json_encode($postData);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        $ch = curl_init();
        $options = array(
            CURLOPT_URL => $this->webhookUrl,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array('Content-type: application/json'),
<<<<<<< HEAD
            CURLOPT_POSTFIELDS => $postString
=======
            CURLOPT_POSTFIELDS => $postString,
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );
        if (defined('CURLOPT_SAFE_UPLOAD')) {
            $options[CURLOPT_SAFE_UPLOAD] = true;
        }

        curl_setopt_array($ch, $options);

        Curl\Util::execute($ch);
    }

<<<<<<< HEAD
    public function setFormatter(FormatterInterface $formatter)
=======
    public function setFormatter(FormatterInterface $formatter): HandlerInterface
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        parent::setFormatter($formatter);
        $this->slackRecord->setFormatter($formatter);

        return $this;
    }

<<<<<<< HEAD
    public function getFormatter()
=======
    public function getFormatter(): FormatterInterface
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $formatter = parent::getFormatter();
        $this->slackRecord->setFormatter($formatter);

        return $formatter;
    }
}
