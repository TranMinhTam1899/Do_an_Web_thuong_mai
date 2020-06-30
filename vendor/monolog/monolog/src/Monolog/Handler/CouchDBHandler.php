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
use Monolog\Formatter\JsonFormatter;
use Monolog\Logger;

/**
 * CouchDB handler
 *
 * @author Markus Bachmann <markus.bachmann@bachi.biz>
 */
class CouchDBHandler extends AbstractProcessingHandler
{
    private $options;

<<<<<<< HEAD
    public function __construct(array $options = array(), $level = Logger::DEBUG, $bubble = true)
    {
        $this->options = array_merge(array(
=======
    public function __construct(array $options = [], $level = Logger::DEBUG, bool $bubble = true)
    {
        $this->options = array_merge([
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            'host'     => 'localhost',
            'port'     => 5984,
            'dbname'   => 'logger',
            'username' => null,
            'password' => null,
<<<<<<< HEAD
        ), $options);
=======
        ], $options);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

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
        $basicAuth = null;
        if ($this->options['username']) {
            $basicAuth = sprintf('%s:%s@', $this->options['username'], $this->options['password']);
        }

        $url = 'http://'.$basicAuth.$this->options['host'].':'.$this->options['port'].'/'.$this->options['dbname'];
<<<<<<< HEAD
        $context = stream_context_create(array(
            'http' => array(
=======
        $context = stream_context_create([
            'http' => [
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                'method'        => 'POST',
                'content'       => $record['formatted'],
                'ignore_errors' => true,
                'max_redirects' => 0,
                'header'        => 'Content-type: application/json',
<<<<<<< HEAD
            ),
        ));

        if (false === @file_get_contents($url, null, $context)) {
=======
            ],
        ]);

        if (false === @file_get_contents($url, false, $context)) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            throw new \RuntimeException(sprintf('Could not connect to %s', $url));
        }
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
