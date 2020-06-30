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
 * Serializes a log message according to Wildfire's header requirements
 *
 * @author Eric Clemmons (@ericclemmons) <eric@uxdriven.com>
 * @author Christophe Coevoet <stof@notk.org>
 * @author Kirill chEbba Chebunin <iam@chebba.org>
 */
class WildfireFormatter extends NormalizerFormatter
{
<<<<<<< HEAD
    const TABLE = 'table';

    /**
     * Translates Monolog log levels to Wildfire levels.
     */
    private $logLevels = array(
=======
    /**
     * Translates Monolog log levels to Wildfire levels.
     */
    private $logLevels = [
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        Logger::DEBUG     => 'LOG',
        Logger::INFO      => 'INFO',
        Logger::NOTICE    => 'INFO',
        Logger::WARNING   => 'WARN',
        Logger::ERROR     => 'ERROR',
        Logger::CRITICAL  => 'ERROR',
        Logger::ALERT     => 'ERROR',
        Logger::EMERGENCY => 'ERROR',
<<<<<<< HEAD
    );
=======
    ];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function format(array $record)
=======
    public function format(array $record): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        // Retrieve the line and file if set and remove them from the formatted extra
        $file = $line = '';
        if (isset($record['extra']['file'])) {
            $file = $record['extra']['file'];
            unset($record['extra']['file']);
        }
        if (isset($record['extra']['line'])) {
            $line = $record['extra']['line'];
            unset($record['extra']['line']);
        }

        $record = $this->normalize($record);
<<<<<<< HEAD
        $message = array('message' => $record['message']);
=======
        $message = ['message' => $record['message']];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $handleError = false;
        if ($record['context']) {
            $message['context'] = $record['context'];
            $handleError = true;
        }
        if ($record['extra']) {
            $message['extra'] = $record['extra'];
            $handleError = true;
        }
        if (count($message) === 1) {
            $message = reset($message);
        }

<<<<<<< HEAD
        if (isset($record['context'][self::TABLE])) {
            $type  = 'TABLE';
            $label = $record['channel'] .': '. $record['message'];
            $message = $record['context'][self::TABLE];
=======
        if (isset($record['context']['table'])) {
            $type  = 'TABLE';
            $label = $record['channel'] .': '. $record['message'];
            $message = $record['context']['table'];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        } else {
            $type  = $this->logLevels[$record['level']];
            $label = $record['channel'];
        }

        // Create JSON object describing the appearance of the message in the console
<<<<<<< HEAD
        $json = $this->toJson(array(
            array(
=======
        $json = $this->toJson([
            [
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                'Type'  => $type,
                'File'  => $file,
                'Line'  => $line,
                'Label' => $label,
<<<<<<< HEAD
            ),
            $message,
        ), $handleError);

        // The message itself is a serialization of the above JSON object + it's length
        return sprintf(
            '%s|%s|',
=======
            ],
            $message,
        ], $handleError);

        // The message itself is a serialization of the above JSON object + it's length
        return sprintf(
            '%d|%s|',
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            strlen($json),
            $json
        );
    }

<<<<<<< HEAD
=======
    /**
     * {@inheritdoc}
     */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function formatBatch(array $records)
    {
        throw new \BadMethodCallException('Batch formatting does not make sense for the WildfireFormatter');
    }

<<<<<<< HEAD
    protected function normalize($data, $depth = 0)
    {
        if (is_object($data) && !$data instanceof \DateTime) {
=======
    /**
     * {@inheritdoc}
     * @suppress PhanTypeMismatchReturn
     */
    protected function normalize($data, int $depth = 0)
    {
        if (is_object($data) && !$data instanceof \DateTimeInterface) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            return $data;
        }

        return parent::normalize($data, $depth);
    }
}
