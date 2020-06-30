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

/**
 * Stores to any socket - uses fsockopen() or pfsockopen().
 *
 * @author Pablo de Leon Belloc <pablolb@gmail.com>
 * @see    http://php.net/manual/en/function.fsockopen.php
 */
class SocketHandler extends AbstractProcessingHandler
{
    private $connectionString;
    private $connectionTimeout;
<<<<<<< HEAD
    private $resource;
    private $timeout = 0;
    private $writingTimeout = 10;
    private $lastSentBytes = null;
=======
    /** @var resource|null */
    private $resource;
    /** @var float */
    private $timeout = 0;
    /** @var float */
    private $writingTimeout = 10;
    private $lastSentBytes = null;
    /** @var int */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    private $chunkSize = null;
    private $persistent = false;
    private $errno;
    private $errstr;
    private $lastWritingAt;

    /**
<<<<<<< HEAD
     * @param string $connectionString Socket connection string
     * @param int    $level            The minimum logging level at which this handler will be triggered
     * @param bool   $bubble           Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct($connectionString, $level = Logger::DEBUG, $bubble = true)
=======
     * @param string     $connectionString Socket connection string
     * @param int|string $level            The minimum logging level at which this handler will be triggered
     * @param bool       $bubble           Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct(string $connectionString, $level = Logger::DEBUG, bool $bubble = true)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        parent::__construct($level, $bubble);
        $this->connectionString = $connectionString;
        $this->connectionTimeout = (float) ini_get('default_socket_timeout');
    }

    /**
     * Connect (if necessary) and write to the socket
     *
     * @param array $record
     *
     * @throws \UnexpectedValueException
     * @throws \RuntimeException
     */
<<<<<<< HEAD
    protected function write(array $record)
=======
    protected function write(array $record): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->connectIfNotConnected();
        $data = $this->generateDataStream($record);
        $this->writeToSocket($data);
    }

    /**
     * We will not close a PersistentSocket instance so it can be reused in other requests.
     */
<<<<<<< HEAD
    public function close()
=======
    public function close(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!$this->isPersistent()) {
            $this->closeSocket();
        }
    }

    /**
     * Close socket, if open
     */
<<<<<<< HEAD
    public function closeSocket()
=======
    public function closeSocket(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (is_resource($this->resource)) {
            fclose($this->resource);
            $this->resource = null;
        }
    }

    /**
<<<<<<< HEAD
     * Set socket connection to nbe persistent. It only has effect before the connection is initiated.
     *
     * @param bool $persistent
     */
    public function setPersistent($persistent)
    {
        $this->persistent = (bool) $persistent;
=======
     * Set socket connection to be persistent. It only has effect before the connection is initiated.
     */
    public function setPersistent(bool $persistent): self
    {
        $this->persistent = $persistent;

        return $this;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Set connection timeout.  Only has effect before we connect.
     *
<<<<<<< HEAD
     * @param float $seconds
     *
     * @see http://php.net/manual/en/function.fsockopen.php
     */
    public function setConnectionTimeout($seconds)
    {
        $this->validateTimeout($seconds);
        $this->connectionTimeout = (float) $seconds;
=======
     * @see http://php.net/manual/en/function.fsockopen.php
     */
    public function setConnectionTimeout(float $seconds): self
    {
        $this->validateTimeout($seconds);
        $this->connectionTimeout = $seconds;

        return $this;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Set write timeout. Only has effect before we connect.
     *
<<<<<<< HEAD
     * @param float $seconds
     *
     * @see http://php.net/manual/en/function.stream-set-timeout.php
     */
    public function setTimeout($seconds)
    {
        $this->validateTimeout($seconds);
        $this->timeout = (float) $seconds;
=======
     * @see http://php.net/manual/en/function.stream-set-timeout.php
     */
    public function setTimeout(float $seconds): self
    {
        $this->validateTimeout($seconds);
        $this->timeout = $seconds;

        return $this;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Set writing timeout. Only has effect during connection in the writing cycle.
     *
     * @param float $seconds 0 for no timeout
     */
<<<<<<< HEAD
    public function setWritingTimeout($seconds)
    {
        $this->validateTimeout($seconds);
        $this->writingTimeout = (float) $seconds;
=======
    public function setWritingTimeout(float $seconds): self
    {
        $this->validateTimeout($seconds);
        $this->writingTimeout = $seconds;

        return $this;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Set chunk size. Only has effect during connection in the writing cycle.
<<<<<<< HEAD
     *
     * @param float $bytes
     */
    public function setChunkSize($bytes)
    {
        $this->chunkSize = $bytes;
=======
     */
    public function setChunkSize(int $bytes): self
    {
        $this->chunkSize = $bytes;

        return $this;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Get current connection string
<<<<<<< HEAD
     *
     * @return string
     */
    public function getConnectionString()
=======
     */
    public function getConnectionString(): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->connectionString;
    }

    /**
     * Get persistent setting
<<<<<<< HEAD
     *
     * @return bool
     */
    public function isPersistent()
=======
     */
    public function isPersistent(): bool
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->persistent;
    }

    /**
     * Get current connection timeout setting
<<<<<<< HEAD
     *
     * @return float
     */
    public function getConnectionTimeout()
=======
     */
    public function getConnectionTimeout(): float
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->connectionTimeout;
    }

    /**
     * Get current in-transfer timeout
<<<<<<< HEAD
     *
     * @return float
     */
    public function getTimeout()
=======
     */
    public function getTimeout(): float
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->timeout;
    }

    /**
     * Get current local writing timeout
     *
     * @return float
     */
<<<<<<< HEAD
    public function getWritingTimeout()
=======
    public function getWritingTimeout(): float
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->writingTimeout;
    }

    /**
     * Get current chunk size
<<<<<<< HEAD
     *
     * @return float
     */
    public function getChunkSize()
=======
     */
    public function getChunkSize(): int
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->chunkSize;
    }

    /**
     * Check to see if the socket is currently available.
     *
     * UDP might appear to be connected but might fail when writing.  See http://php.net/fsockopen for details.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function isConnected()
=======
     */
    public function isConnected(): bool
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return is_resource($this->resource)
            && !feof($this->resource);  // on TCP - other party can close connection.
    }

    /**
     * Wrapper to allow mocking
     */
    protected function pfsockopen()
    {
        return @pfsockopen($this->connectionString, -1, $this->errno, $this->errstr, $this->connectionTimeout);
    }

    /**
     * Wrapper to allow mocking
     */
    protected function fsockopen()
    {
        return @fsockopen($this->connectionString, -1, $this->errno, $this->errstr, $this->connectionTimeout);
    }

    /**
     * Wrapper to allow mocking
     *
     * @see http://php.net/manual/en/function.stream-set-timeout.php
     */
    protected function streamSetTimeout()
    {
        $seconds = floor($this->timeout);
        $microseconds = round(($this->timeout - $seconds) * 1e6);

<<<<<<< HEAD
        return stream_set_timeout($this->resource, $seconds, $microseconds);
=======
        return stream_set_timeout($this->resource, (int) $seconds, (int) $microseconds);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Wrapper to allow mocking
     *
     * @see http://php.net/manual/en/function.stream-set-chunk-size.php
     */
    protected function streamSetChunkSize()
    {
        return stream_set_chunk_size($this->resource, $this->chunkSize);
    }

    /**
     * Wrapper to allow mocking
     */
    protected function fwrite($data)
    {
        return @fwrite($this->resource, $data);
    }

    /**
     * Wrapper to allow mocking
     */
    protected function streamGetMetadata()
    {
        return stream_get_meta_data($this->resource);
    }

    private function validateTimeout($value)
    {
        $ok = filter_var($value, FILTER_VALIDATE_FLOAT);
        if ($ok === false || $value < 0) {
            throw new \InvalidArgumentException("Timeout must be 0 or a positive float (got $value)");
        }
    }

    private function connectIfNotConnected()
    {
        if ($this->isConnected()) {
            return;
        }
        $this->connect();
    }

<<<<<<< HEAD
    protected function generateDataStream($record)
=======
    protected function generateDataStream(array $record): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return (string) $record['formatted'];
    }

    /**
     * @return resource|null
     */
    protected function getResource()
    {
        return $this->resource;
    }

<<<<<<< HEAD
    private function connect()
=======
    private function connect(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->createSocketResource();
        $this->setSocketTimeout();
        $this->setStreamChunkSize();
    }

<<<<<<< HEAD
    private function createSocketResource()
=======
    private function createSocketResource(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if ($this->isPersistent()) {
            $resource = $this->pfsockopen();
        } else {
            $resource = $this->fsockopen();
        }
        if (!$resource) {
            throw new \UnexpectedValueException("Failed connecting to $this->connectionString ($this->errno: $this->errstr)");
        }
        $this->resource = $resource;
    }

<<<<<<< HEAD
    private function setSocketTimeout()
=======
    private function setSocketTimeout(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!$this->streamSetTimeout()) {
            throw new \UnexpectedValueException("Failed setting timeout with stream_set_timeout()");
        }
    }

<<<<<<< HEAD
    private function setStreamChunkSize()
=======
    private function setStreamChunkSize(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if ($this->chunkSize && !$this->streamSetChunkSize()) {
            throw new \UnexpectedValueException("Failed setting chunk size with stream_set_chunk_size()");
        }
    }

<<<<<<< HEAD
    private function writeToSocket($data)
=======
    private function writeToSocket(string $data): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $length = strlen($data);
        $sent = 0;
        $this->lastSentBytes = $sent;
        while ($this->isConnected() && $sent < $length) {
            if (0 == $sent) {
                $chunk = $this->fwrite($data);
            } else {
                $chunk = $this->fwrite(substr($data, $sent));
            }
            if ($chunk === false) {
                throw new \RuntimeException("Could not write to socket");
            }
            $sent += $chunk;
            $socketInfo = $this->streamGetMetadata();
            if ($socketInfo['timed_out']) {
                throw new \RuntimeException("Write timed-out");
            }

            if ($this->writingIsTimedOut($sent)) {
                throw new \RuntimeException("Write timed-out, no data sent for `{$this->writingTimeout}` seconds, probably we got disconnected (sent $sent of $length)");
            }
        }
        if (!$this->isConnected() && $sent < $length) {
            throw new \RuntimeException("End-of-file reached, probably we got disconnected (sent $sent of $length)");
        }
    }

<<<<<<< HEAD
    private function writingIsTimedOut($sent)
=======
    private function writingIsTimedOut(int $sent): bool
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $writingTimeout = (int) floor($this->writingTimeout);
        if (0 === $writingTimeout) {
            return false;
        }

        if ($sent !== $this->lastSentBytes) {
            $this->lastWritingAt = time();
            $this->lastSentBytes = $sent;

            return false;
        } else {
            usleep(100);
        }

        if ((time() - $this->lastWritingAt) >= $writingTimeout) {
            $this->closeSocket();

            return true;
        }

        return false;
    }
}
