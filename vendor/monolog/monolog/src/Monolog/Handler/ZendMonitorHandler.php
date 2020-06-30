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

<<<<<<< HEAD
=======
use Monolog\Formatter\FormatterInterface;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use Monolog\Formatter\NormalizerFormatter;
use Monolog\Logger;

/**
 * Handler sending logs to Zend Monitor
 *
 * @author  Christian Bergau <cbergau86@gmail.com>
 * @author  Jason Davis <happydude@jasondavis.net>
 */
class ZendMonitorHandler extends AbstractProcessingHandler
{
    /**
     * Monolog level / ZendMonitor Custom Event priority map
     *
     * @var array
     */
<<<<<<< HEAD
    protected $levelMap = array();

    /**
     * Construct
     *
     * @param  int                       $level
     * @param  bool                      $bubble
     * @throws MissingExtensionException
     */
    public function __construct($level = Logger::DEBUG, $bubble = true)
=======
    protected $levelMap = [];

    /**
     * @param  string|int                $level  The minimum logging level at which this handler will be triggered.
     * @param  bool                      $bubble Whether the messages that are handled can bubble up the stack or not.
     * @throws MissingExtensionException
     */
    public function __construct($level = Logger::DEBUG, bool $bubble = true)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!function_exists('zend_monitor_custom_event')) {
            throw new MissingExtensionException(
                'You must have Zend Server installed with Zend Monitor enabled in order to use this handler'
            );
        }
        //zend monitor constants are not defined if zend monitor is not enabled.
<<<<<<< HEAD
        $this->levelMap = array(
=======
        $this->levelMap = [
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            Logger::DEBUG     => \ZEND_MONITOR_EVENT_SEVERITY_INFO,
            Logger::INFO      => \ZEND_MONITOR_EVENT_SEVERITY_INFO,
            Logger::NOTICE    => \ZEND_MONITOR_EVENT_SEVERITY_INFO,
            Logger::WARNING   => \ZEND_MONITOR_EVENT_SEVERITY_WARNING,
            Logger::ERROR     => \ZEND_MONITOR_EVENT_SEVERITY_ERROR,
            Logger::CRITICAL  => \ZEND_MONITOR_EVENT_SEVERITY_ERROR,
            Logger::ALERT     => \ZEND_MONITOR_EVENT_SEVERITY_ERROR,
            Logger::EMERGENCY => \ZEND_MONITOR_EVENT_SEVERITY_ERROR,
<<<<<<< HEAD
        );
=======
        ];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        parent::__construct($level, $bubble);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function write(array $record)
=======
    protected function write(array $record): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->writeZendMonitorCustomEvent(
            Logger::getLevelName($record['level']),
            $record['message'],
            $record['formatted'],
            $this->levelMap[$record['level']]
        );
    }

    /**
     * Write to Zend Monitor Events
     * @param string $type Text displayed in "Class Name (custom)" field
     * @param string $message Text displayed in "Error String"
     * @param mixed $formatted Displayed in Custom Variables tab
     * @param int $severity Set the event severity level (-1,0,1)
     */
<<<<<<< HEAD
    protected function writeZendMonitorCustomEvent($type, $message, $formatted, $severity)
=======
    protected function writeZendMonitorCustomEvent(string $type, string $message, array $formatted, int $severity): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        zend_monitor_custom_event($type, $message, $formatted, $severity);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getDefaultFormatter()
=======
    public function getDefaultFormatter(): FormatterInterface
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return new NormalizerFormatter();
    }

<<<<<<< HEAD
    /**
     * Get the level map
     *
     * @return array
     */
    public function getLevelMap()
=======
    public function getLevelMap(): array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->levelMap;
    }
}
