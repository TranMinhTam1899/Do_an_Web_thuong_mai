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

namespace Monolog\Handler\Slack;

use Monolog\Logger;
<<<<<<< HEAD
use Monolog\Utils;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use Monolog\Formatter\NormalizerFormatter;
use Monolog\Formatter\FormatterInterface;

/**
 * Slack record utility helping to log to Slack webhooks or API.
 *
 * @author Greg Kedzierski <greg@gregkedzierski.com>
 * @author Haralan Dobrev <hkdobrev@gmail.com>
 * @see    https://api.slack.com/incoming-webhooks
 * @see    https://api.slack.com/docs/message-attachments
 */
class SlackRecord
{
<<<<<<< HEAD
    const COLOR_DANGER = 'danger';

    const COLOR_WARNING = 'warning';

    const COLOR_GOOD = 'good';

    const COLOR_DEFAULT = '#e3e4e6';
=======
    public const COLOR_DANGER = 'danger';

    public const COLOR_WARNING = 'warning';

    public const COLOR_GOOD = 'good';

    public const COLOR_DEFAULT = '#e3e4e6';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Slack channel (encoded ID or name)
     * @var string|null
     */
    private $channel;

    /**
     * Name of a bot
     * @var string|null
     */
    private $username;

    /**
     * User icon e.g. 'ghost', 'http://example.com/user.png'
<<<<<<< HEAD
     * @var string
=======
     * @var string|null
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    private $userIcon;

    /**
     * Whether the message should be added to Slack as attachment (plain text otherwise)
     * @var bool
     */
    private $useAttachment;

    /**
     * Whether the the context/extra messages added to Slack as attachments are in a short style
     * @var bool
     */
    private $useShortAttachment;

    /**
     * Whether the attachment should include context and extra data
     * @var bool
     */
    private $includeContextAndExtra;

    /**
     * Dot separated list of fields to exclude from slack message. E.g. ['context.field1', 'extra.field2']
     * @var array
     */
    private $excludeFields;

    /**
     * @var FormatterInterface
     */
    private $formatter;

    /**
     * @var NormalizerFormatter
     */
    private $normalizerFormatter;

<<<<<<< HEAD
    public function __construct($channel = null, $username = null, $useAttachment = true, $userIcon = null, $useShortAttachment = false, $includeContextAndExtra = false, array $excludeFields = array(), FormatterInterface $formatter = null)
    {
        $this->channel = $channel;
        $this->username = $username;
        $this->userIcon = trim($userIcon, ':');
        $this->useAttachment = $useAttachment;
        $this->useShortAttachment = $useShortAttachment;
        $this->includeContextAndExtra = $includeContextAndExtra;
        $this->excludeFields = $excludeFields;
        $this->formatter = $formatter;
=======
    public function __construct(
        ?string $channel = null,
        ?string $username = null,
        bool $useAttachment = true,
        ?string $userIcon = null,
        bool $useShortAttachment = false,
        bool $includeContextAndExtra = false,
        array $excludeFields = array(),
        FormatterInterface $formatter = null
    ) {
        $this
            ->setChannel($channel)
            ->setUsername($username)
            ->useAttachment($useAttachment)
            ->setUserIcon($userIcon)
            ->useShortAttachment($useShortAttachment)
            ->includeContextAndExtra($includeContextAndExtra)
            ->excludeFields($excludeFields)
            ->setFormatter($formatter);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        if ($this->includeContextAndExtra) {
            $this->normalizerFormatter = new NormalizerFormatter();
        }
    }

<<<<<<< HEAD
    public function getSlackData(array $record)
    {
        $dataArray = array();
        $record = $this->excludeFields($record);
=======
    /**
     * Returns required data in format that Slack
     * is expecting.
     */
    public function getSlackData(array $record): array
    {
        $dataArray = array();
        $record = $this->removeExcludedFields($record);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        if ($this->username) {
            $dataArray['username'] = $this->username;
        }

        if ($this->channel) {
            $dataArray['channel'] = $this->channel;
        }

        if ($this->formatter && !$this->useAttachment) {
            $message = $this->formatter->format($record);
        } else {
            $message = $record['message'];
        }

        if ($this->useAttachment) {
            $attachment = array(
                'fallback'  => $message,
                'text'      => $message,
                'color'     => $this->getAttachmentColor($record['level']),
                'fields'    => array(),
                'mrkdwn_in' => array('fields'),
<<<<<<< HEAD
                'ts'        => $record['datetime']->getTimestamp()
=======
                'ts'        => $record['datetime']->getTimestamp(),
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            );

            if ($this->useShortAttachment) {
                $attachment['title'] = $record['level_name'];
            } else {
                $attachment['title'] = 'Message';
                $attachment['fields'][] = $this->generateAttachmentField('Level', $record['level_name']);
            }

<<<<<<< HEAD

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            if ($this->includeContextAndExtra) {
                foreach (array('extra', 'context') as $key) {
                    if (empty($record[$key])) {
                        continue;
                    }

                    if ($this->useShortAttachment) {
                        $attachment['fields'][] = $this->generateAttachmentField(
                            $key,
                            $record[$key]
                        );
                    } else {
                        // Add all extra fields as individual fields in attachment
                        $attachment['fields'] = array_merge(
                            $attachment['fields'],
                            $this->generateAttachmentFields($record[$key])
                        );
                    }
                }
            }

            $dataArray['attachments'] = array($attachment);
        } else {
            $dataArray['text'] = $message;
        }

        if ($this->userIcon) {
            if (filter_var($this->userIcon, FILTER_VALIDATE_URL)) {
                $dataArray['icon_url'] = $this->userIcon;
            } else {
                $dataArray['icon_emoji'] = ":{$this->userIcon}:";
            }
        }

        return $dataArray;
    }

    /**
<<<<<<< HEAD
     * Returned a Slack message attachment color associated with
     * provided level.
     *
     * @param  int    $level
     * @return string
     */
    public function getAttachmentColor($level)
    {
        switch (true) {
            case $level >= Logger::ERROR:
                return self::COLOR_DANGER;
            case $level >= Logger::WARNING:
                return self::COLOR_WARNING;
            case $level >= Logger::INFO:
                return self::COLOR_GOOD;
            default:
                return self::COLOR_DEFAULT;
=======
     * Returns a Slack message attachment color associated with
     * provided level.
     */
    public function getAttachmentColor(int $level): string
    {
        switch (true) {
            case $level >= Logger::ERROR:
                return static::COLOR_DANGER;
            case $level >= Logger::WARNING:
                return static::COLOR_WARNING;
            case $level >= Logger::INFO:
                return static::COLOR_GOOD;
            default:
                return static::COLOR_DEFAULT;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }
    }

    /**
     * Stringifies an array of key/value pairs to be used in attachment fields
<<<<<<< HEAD
     *
     * @param array $fields
     *
     * @return string
     */
    public function stringify($fields)
    {
        $normalized = $this->normalizerFormatter->format($fields);
        $prettyPrintFlag = defined('JSON_PRETTY_PRINT') ? JSON_PRETTY_PRINT : 128;
        $flags = 0;
        if (PHP_VERSION_ID >= 50400) {
            $flags = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
        }
=======
     */
    public function stringify(array $fields): string
    {
        $normalized = $this->normalizerFormatter->format($fields);
        $prettyPrintFlag = defined('JSON_PRETTY_PRINT') ? JSON_PRETTY_PRINT : 128;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        $hasSecondDimension = count(array_filter($normalized, 'is_array'));
        $hasNonNumericKeys = !count(array_filter(array_keys($normalized), 'is_numeric'));

        return $hasSecondDimension || $hasNonNumericKeys
<<<<<<< HEAD
            ? Utils::jsonEncode($normalized, $prettyPrintFlag | $flags)
            : Utils::jsonEncode($normalized, $flags);
    }

    /**
     * Sets the formatter
     *
     * @param FormatterInterface $formatter
     */
    public function setFormatter(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
=======
            ? json_encode($normalized, $prettyPrintFlag|JSON_UNESCAPED_UNICODE)
            : json_encode($normalized, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Channel used by the bot when posting
     *
     * @param ?string $channel
     *
     * @return SlackHandler
     */
    public function setChannel(?string $channel = null): self
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * Username used by the bot when posting
     *
     * @param ?string $username
     *
     * @return SlackHandler
     */
    public function setUsername(?string $username = null): self
    {
        $this->username = $username;

        return $this;
    }

    public function useAttachment(bool $useAttachment = true): self
    {
        $this->useAttachment = $useAttachment;

        return $this;
    }

    public function setUserIcon(?string $userIcon = null): self
    {
        $this->userIcon = $userIcon;

        if (\is_string($userIcon)) {
            $this->userIcon = trim($userIcon, ':');
        }

        return $this;
    }

    public function useShortAttachment(bool $useShortAttachment = false): self
    {
        $this->useShortAttachment = $useShortAttachment;

        return $this;
    }

    public function includeContextAndExtra(bool $includeContextAndExtra = false): self
    {
        $this->includeContextAndExtra = $includeContextAndExtra;

        if ($this->includeContextAndExtra) {
            $this->normalizerFormatter = new NormalizerFormatter();
        }

        return $this;
    }

    public function excludeFields(array $excludeFields = []): self
    {
        $this->excludeFields = $excludeFields;

        return $this;
    }

    public function setFormatter(?FormatterInterface $formatter = null): self
    {
        $this->formatter = $formatter;

        return $this;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Generates attachment field
     *
<<<<<<< HEAD
     * @param string       $title
     * @param string|array $value
     *
     * @return array
     */
    private function generateAttachmentField($title, $value)
    {
        $value = is_array($value)
            ? sprintf('```%s```', $this->stringify($value))
=======
     * @param string|array $value
     */
    private function generateAttachmentField(string $title, $value): array
    {
        $value = is_array($value)
            ? sprintf('```%s```', substr($this->stringify($value), 0, 1990))
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            : $value;

        return array(
            'title' => ucfirst($title),
            'value' => $value,
<<<<<<< HEAD
            'short' => false
=======
            'short' => false,
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );
    }

    /**
     * Generates a collection of attachment fields from array
<<<<<<< HEAD
     *
     * @param array $data
     *
     * @return array
     */
    private function generateAttachmentFields(array $data)
=======
     */
    private function generateAttachmentFields(array $data): array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $fields = array();
        foreach ($this->normalizerFormatter->format($data) as $key => $value) {
            $fields[] = $this->generateAttachmentField($key, $value);
        }

        return $fields;
    }

    /**
     * Get a copy of record with fields excluded according to $this->excludeFields
<<<<<<< HEAD
     *
     * @param array $record
     *
     * @return array
     */
    private function excludeFields(array $record)
=======
     */
    private function removeExcludedFields(array $record): array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        foreach ($this->excludeFields as $field) {
            $keys = explode('.', $field);
            $node = &$record;
            $lastKey = end($keys);
            foreach ($keys as $key) {
                if (!isset($node[$key])) {
                    break;
                }
                if ($lastKey === $key) {
                    unset($node[$key]);
                    break;
                }
                $node = &$node[$key];
            }
        }

        return $record;
    }
}
