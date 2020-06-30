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
<<<<<<< HEAD
=======
use Monolog\Formatter\FormatterInterface;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use Monolog\Formatter\JsonFormatter;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Channel\AMQPChannel;
use AMQPExchange;

class AmqpHandler extends AbstractProcessingHandler
{
    /**
     * @var AMQPExchange|AMQPChannel $exchange
     */
    protected $exchange;

    /**
     * @var string
     */
    protected $exchangeName;

    /**
     * @param AMQPExchange|AMQPChannel $exchange     AMQPExchange (php AMQP ext) or PHP AMQP lib channel, ready for use
<<<<<<< HEAD
     * @param string                   $exchangeName
     * @param int                      $level
     * @param bool                     $bubble       Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct($exchange, $exchangeName = 'log', $level = Logger::DEBUG, $bubble = true)
    {
        if ($exchange instanceof AMQPExchange) {
            $exchange->setName($exchangeName);
        } elseif ($exchange instanceof AMQPChannel) {
            $this->exchangeName = $exchangeName;
        } else {
            throw new \InvalidArgumentException('PhpAmqpLib\Channel\AMQPChannel or AMQPExchange instance required');
=======
     * @param string|null              $exchangeName Optional exchange name, for AMQPChannel (PhpAmqpLib) only
     * @param string|int               $level        The minimum logging level at which this handler will be triggered
     * @param bool                     $bubble       Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct($exchange, ?string $exchangeName = null, $level = Logger::DEBUG, bool $bubble = true)
    {
        if ($exchange instanceof AMQPChannel) {
            $this->exchangeName = (string) $exchangeName;
        } elseif (!$exchange instanceof AMQPExchange) {
            throw new \InvalidArgumentException('PhpAmqpLib\Channel\AMQPChannel or AMQPExchange instance required');
        } elseif ($exchangeName) {
            @trigger_error('The $exchangeName parameter can only be passed when using PhpAmqpLib, if using an AMQPExchange instance configure it beforehand', E_USER_DEPRECATED);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }
        $this->exchange = $exchange;

        parent::__construct($level, $bubble);
    }

    /**
     * {@inheritDoc}
     */
<<<<<<< HEAD
    protected function write(array $record)
=======
    protected function write(array $record): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $data = $record["formatted"];
        $routingKey = $this->getRoutingKey($record);

        if ($this->exchange instanceof AMQPExchange) {
            $this->exchange->publish(
                $data,
                $routingKey,
                0,
<<<<<<< HEAD
                array(
                    'delivery_mode' => 2,
                    'content_type' => 'application/json',
                )
=======
                [
                    'delivery_mode' => 2,
                    'content_type' => 'application/json',
                ]
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            );
        } else {
            $this->exchange->basic_publish(
                $this->createAmqpMessage($data),
                $this->exchangeName,
                $routingKey
            );
        }
    }

    /**
     * {@inheritDoc}
     */
<<<<<<< HEAD
    public function handleBatch(array $records)
=======
    public function handleBatch(array $records): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if ($this->exchange instanceof AMQPExchange) {
            parent::handleBatch($records);

            return;
        }

        foreach ($records as $record) {
            if (!$this->isHandling($record)) {
                continue;
            }

            $record = $this->processRecord($record);
            $data = $this->getFormatter()->format($record);

            $this->exchange->batch_basic_publish(
                $this->createAmqpMessage($data),
                $this->exchangeName,
                $this->getRoutingKey($record)
            );
        }

        $this->exchange->publish_batch();
    }

    /**
     * Gets the routing key for the AMQP exchange
<<<<<<< HEAD
     *
     * @param  array  $record
     * @return string
     */
    protected function getRoutingKey(array $record)
    {
        $routingKey = sprintf(
            '%s.%s',
            // TODO 2.0 remove substr call
            substr($record['level_name'], 0, 4),
            $record['channel']
        );
=======
     */
    protected function getRoutingKey(array $record): string
    {
        $routingKey = sprintf('%s.%s', $record['level_name'], $record['channel']);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return strtolower($routingKey);
    }

<<<<<<< HEAD
    /**
     * @param  string      $data
     * @return AMQPMessage
     */
    private function createAmqpMessage($data)
    {
        return new AMQPMessage(
            (string) $data,
            array(
                'delivery_mode' => 2,
                'content_type' => 'application/json',
            )
=======
    private function createAmqpMessage(string $data): AMQPMessage
    {
        return new AMQPMessage(
            $data,
            [
                'delivery_mode' => 2,
                'content_type' => 'application/json',
            ]
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
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
        return new JsonFormatter(JsonFormatter::BATCH_MODE_JSON, false);
    }
}
