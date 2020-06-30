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
use Monolog\Logger;
use Monolog\Formatter\NormalizerFormatter;
=======
use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\Manager;
use MongoDB\Client;
use Monolog\Logger;
use Monolog\Formatter\FormatterInterface;
use Monolog\Formatter\MongoDBFormatter;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * Logs to a MongoDB database.
 *
<<<<<<< HEAD
 * usage example:
 *
 *   $log = new Logger('application');
 *   $mongodb = new MongoDBHandler(new \Mongo("mongodb://localhost:27017"), "logs", "prod");
 *   $log->pushHandler($mongodb);
 *
 * @author Thomas Tourlourat <thomas@tourlourat.com>
 */
class MongoDBHandler extends AbstractProcessingHandler
{
    protected $mongoCollection;

    public function __construct($mongo, $database, $collection, $level = Logger::DEBUG, $bubble = true)
    {
        if (!($mongo instanceof \MongoClient || $mongo instanceof \Mongo || $mongo instanceof \MongoDB\Client)) {
            throw new \InvalidArgumentException('MongoClient, Mongo or MongoDB\Client instance required');
        }

        $this->mongoCollection = $mongo->selectCollection($database, $collection);
=======
 * Usage example:
 *
 *   $log = new \Monolog\Logger('application');
 *   $client = new \MongoDB\Client('mongodb://localhost:27017');
 *   $mongodb = new \Monolog\Handler\MongoDBHandler($client, 'logs', 'prod');
 *   $log->pushHandler($mongodb);
 *
 * The above examples uses the MongoDB PHP library's client class; however, the
 * MongoDB\Driver\Manager class from ext-mongodb is also supported.
 */
class MongoDBHandler extends AbstractProcessingHandler
{
    private $collection;
    private $manager;
    private $namespace;

    /**
     * Constructor.
     *
     * @param Client|Manager $mongodb    MongoDB library or driver client
     * @param string         $database   Database name
     * @param string         $collection Collection name
     * @param string|int     $level      The minimum logging level at which this handler will be triggered
     * @param bool           $bubble     Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct($mongodb, string $database, string $collection, $level = Logger::DEBUG, bool $bubble = true)
    {
        if (!($mongodb instanceof Client || $mongodb instanceof Manager)) {
            throw new \InvalidArgumentException('MongoDB\Client or MongoDB\Driver\Manager instance required');
        }

        if ($mongodb instanceof Client) {
            $this->collection = $mongodb->selectCollection($database, $collection);
        } else {
            $this->manager = $mongodb;
            $this->namespace = $database . '.' . $collection;
        }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        parent::__construct($level, $bubble);
    }

<<<<<<< HEAD
    protected function write(array $record)
    {
        if ($this->mongoCollection instanceof \MongoDB\Collection) {
            $this->mongoCollection->insertOne($record["formatted"]);
        } else {
            $this->mongoCollection->save($record["formatted"]);
=======
    protected function write(array $record): void
    {
        if (isset($this->collection)) {
            $this->collection->insertOne($record['formatted']);
        }

        if (isset($this->manager, $this->namespace)) {
            $bulk = new BulkWrite;
            $bulk->insert($record["formatted"]);
            $this->manager->executeBulkWrite($this->namespace, $bulk);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }
    }

    /**
     * {@inheritDoc}
     */
<<<<<<< HEAD
    protected function getDefaultFormatter()
    {
        return new NormalizerFormatter();
=======
    protected function getDefaultFormatter(): FormatterInterface
    {
        return new MongoDBFormatter;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
