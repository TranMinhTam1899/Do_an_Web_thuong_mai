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

/**
 * Serializes a log message to Logstash Event Format
 *
<<<<<<< HEAD
 * @see http://logstash.net/
 * @see https://github.com/logstash/logstash/blob/master/lib/logstash/event.rb
=======
 * @see https://www.elastic.co/products/logstash
 * @see https://github.com/elastic/logstash/blob/master/logstash-core/src/main/java/org/logstash/Event.java
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 *
 * @author Tim Mower <timothy.mower@gmail.com>
 */
class LogstashFormatter extends NormalizerFormatter
{
<<<<<<< HEAD
    const V0 = 0;
    const V1 = 1;

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    /**
     * @var string the name of the system for the Logstash log message, used to fill the @source field
     */
    protected $systemName;

    /**
     * @var string an application name for the Logstash log message, used to fill the @type field
     */
    protected $applicationName;

    /**
<<<<<<< HEAD
     * @var string a prefix for 'extra' fields from the Monolog record (optional)
     */
    protected $extraPrefix;

    /**
     * @var string a prefix for 'context' fields from the Monolog record (optional)
     */
    protected $contextPrefix;

    /**
     * @var int logstash format version to use
     */
    protected $version;

    /**
     * @param string $applicationName the application that sends the data, used as the "type" field of logstash
     * @param string $systemName      the system/machine name, used as the "source" field of logstash, defaults to the hostname of the machine
     * @param string $extraPrefix     prefix for extra keys inside logstash "fields"
     * @param string $contextPrefix   prefix for context keys inside logstash "fields", defaults to ctxt_
     * @param int    $version         the logstash format version to use, defaults to 0
     */
    public function __construct($applicationName, $systemName = null, $extraPrefix = null, $contextPrefix = 'ctxt_', $version = self::V0)
=======
     * @var string the key for 'extra' fields from the Monolog record
     */
    protected $extraKey;

    /**
     * @var string the key for 'context' fields from the Monolog record
     */
    protected $contextKey;

    /**
     * @param string      $applicationName The application that sends the data, used as the "type" field of logstash
     * @param string|null $systemName      The system/machine name, used as the "source" field of logstash, defaults to the hostname of the machine
     * @param string      $extraKey        The key for extra keys inside logstash "fields", defaults to extra
     * @param string      $contextKey      The key for context keys inside logstash "fields", defaults to context
     */
    public function __construct(string $applicationName, ?string $systemName = null, string $extraKey = 'extra', string $contextKey = 'context')
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        // logstash requires a ISO 8601 format date with optional millisecond precision.
        parent::__construct('Y-m-d\TH:i:s.uP');

<<<<<<< HEAD
        $this->systemName = $systemName ?: gethostname();
        $this->applicationName = $applicationName;
        $this->extraPrefix = $extraPrefix;
        $this->contextPrefix = $contextPrefix;
        $this->version = $version;
=======
        $this->systemName = $systemName === null ? gethostname() : $systemName;
        $this->applicationName = $applicationName;
        $this->extraKey = $extraKey;
        $this->contextKey = $contextKey;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function format(array $record)
    {
        $record = parent::format($record);

        if ($this->version === self::V1) {
            $message = $this->formatV1($record);
        } else {
            $message = $this->formatV0($record);
        }

        return $this->toJson($message) . "\n";
    }

    protected function formatV0(array $record)
    {
        if (empty($record['datetime'])) {
            $record['datetime'] = gmdate('c');
        }
        $message = array(
            '@timestamp' => $record['datetime'],
            '@source' => $this->systemName,
            '@fields' => array(),
        );
        if (isset($record['message'])) {
            $message['@message'] = $record['message'];
        }
        if (isset($record['channel'])) {
            $message['@tags'] = array($record['channel']);
            $message['@fields']['channel'] = $record['channel'];
        }
        if (isset($record['level'])) {
            $message['@fields']['level'] = $record['level'];
        }
        if ($this->applicationName) {
            $message['@type'] = $this->applicationName;
        }
        if (isset($record['extra']['server'])) {
            $message['@source_host'] = $record['extra']['server'];
        }
        if (isset($record['extra']['url'])) {
            $message['@source_path'] = $record['extra']['url'];
        }
        if (!empty($record['extra'])) {
            foreach ($record['extra'] as $key => $val) {
                $message['@fields'][$this->extraPrefix . $key] = $val;
            }
        }
        if (!empty($record['context'])) {
            foreach ($record['context'] as $key => $val) {
                $message['@fields'][$this->contextPrefix . $key] = $val;
            }
        }

        return $message;
    }

    protected function formatV1(array $record)
    {
        if (empty($record['datetime'])) {
            $record['datetime'] = gmdate('c');
        }
        $message = array(
            '@timestamp' => $record['datetime'],
            '@version' => 1,
            'host' => $this->systemName,
        );
=======
    public function format(array $record): string
    {
        $record = parent::format($record);

        if (empty($record['datetime'])) {
            $record['datetime'] = gmdate('c');
        }
        $message = [
            '@timestamp' => $record['datetime'],
            '@version' => 1,
            'host' => $this->systemName,
        ];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        if (isset($record['message'])) {
            $message['message'] = $record['message'];
        }
        if (isset($record['channel'])) {
            $message['type'] = $record['channel'];
            $message['channel'] = $record['channel'];
        }
        if (isset($record['level_name'])) {
            $message['level'] = $record['level_name'];
        }
<<<<<<< HEAD
=======
        if (isset($record['level'])) {
            $message['monolog_level'] = $record['level'];
        }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        if ($this->applicationName) {
            $message['type'] = $this->applicationName;
        }
        if (!empty($record['extra'])) {
<<<<<<< HEAD
            foreach ($record['extra'] as $key => $val) {
                $message[$this->extraPrefix . $key] = $val;
            }
        }
        if (!empty($record['context'])) {
            foreach ($record['context'] as $key => $val) {
                $message[$this->contextPrefix . $key] = $val;
            }
        }

        return $message;
=======
            $message[$this->extraKey] = $record['extra'];
        }
        if (!empty($record['context'])) {
            $message[$this->contextKey] = $record['context'];
        }

        return $this->toJson($message) . "\n";
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
