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

use Monolog\Logger;

/**
 * Formats a log message according to the ChromePHP array format
 *
 * @author Christophe Coevoet <stof@notk.org>
 */
class ChromePHPFormatter implements FormatterInterface
{
    /**
     * Translates Monolog log levels to Wildfire levels.
     */
<<<<<<< HEAD
    private $logLevels = array(
=======
    private $logLevels = [
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        Logger::DEBUG     => 'log',
        Logger::INFO      => 'info',
        Logger::NOTICE    => 'info',
        Logger::WARNING   => 'warn',
        Logger::ERROR     => 'error',
        Logger::CRITICAL  => 'error',
        Logger::ALERT     => 'error',
        Logger::EMERGENCY => 'error',
<<<<<<< HEAD
    );
=======
    ];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * {@inheritdoc}
     */
    public function format(array $record)
    {
        // Retrieve the line and file if set and remove them from the formatted extra
        $backtrace = 'unknown';
        if (isset($record['extra']['file'], $record['extra']['line'])) {
            $backtrace = $record['extra']['file'].' : '.$record['extra']['line'];
            unset($record['extra']['file'], $record['extra']['line']);
        }

<<<<<<< HEAD
        $message = array('message' => $record['message']);
=======
        $message = ['message' => $record['message']];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        if ($record['context']) {
            $message['context'] = $record['context'];
        }
        if ($record['extra']) {
            $message['extra'] = $record['extra'];
        }
        if (count($message) === 1) {
            $message = reset($message);
        }

<<<<<<< HEAD
        return array(
=======
        return [
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $record['channel'],
            $message,
            $backtrace,
            $this->logLevels[$record['level']],
<<<<<<< HEAD
        );
    }

    public function formatBatch(array $records)
    {
        $formatted = array();
=======
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function formatBatch(array $records)
    {
        $formatted = [];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        foreach ($records as $record) {
            $formatted[] = $this->format($record);
        }

        return $formatted;
    }
}
