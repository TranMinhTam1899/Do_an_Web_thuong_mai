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
use Monolog\Utils;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * Stores to any stream resource
 *
 * Can be used to store into php://stderr, remote and local files, etc.
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
class StreamHandler extends AbstractProcessingHandler
{
<<<<<<< HEAD
    protected $stream;
    protected $url;
=======
    /** @var resource|null */
    protected $stream;
    protected $url;
    /** @var string|null */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    private $errorMessage;
    protected $filePermission;
    protected $useLocking;
    private $dirCreated;

    /**
     * @param resource|string $stream
<<<<<<< HEAD
     * @param int             $level          The minimum logging level at which this handler will be triggered
=======
     * @param string|int      $level          The minimum logging level at which this handler will be triggered
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * @param bool            $bubble         Whether the messages that are handled can bubble up the stack or not
     * @param int|null        $filePermission Optional file permissions (default (0644) are only for owner read/write)
     * @param bool            $useLocking     Try to lock log file before doing any writes
     *
     * @throws \Exception                If a missing directory is not buildable
     * @throws \InvalidArgumentException If stream is not a resource or string
     */
<<<<<<< HEAD
    public function __construct($stream, $level = Logger::DEBUG, $bubble = true, $filePermission = null, $useLocking = false)
=======
    public function __construct($stream, $level = Logger::DEBUG, bool $bubble = true, ?int $filePermission = null, bool $useLocking = false)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        parent::__construct($level, $bubble);
        if (is_resource($stream)) {
            $this->stream = $stream;
        } elseif (is_string($stream)) {
<<<<<<< HEAD
            $this->url = Utils::canonicalizePath($stream);
=======
            $this->url = $stream;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        } else {
            throw new \InvalidArgumentException('A stream must either be a resource or a string.');
        }

        $this->filePermission = $filePermission;
        $this->useLocking = $useLocking;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function close()
=======
    public function close(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if ($this->url && is_resource($this->stream)) {
            fclose($this->stream);
        }
        $this->stream = null;
        $this->dirCreated = null;
    }

    /**
     * Return the currently active stream if it is open
     *
     * @return resource|null
     */
    public function getStream()
    {
        return $this->stream;
    }

    /**
     * Return the stream URL if it was configured with a URL and not an active resource
     *
     * @return string|null
     */
<<<<<<< HEAD
    public function getUrl()
=======
    public function getUrl(): ?string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->url;
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
        if (!is_resource($this->stream)) {
            if (null === $this->url || '' === $this->url) {
                throw new \LogicException('Missing stream url, the stream can not be opened. This may be caused by a premature call to close().');
            }
            $this->createDir();
            $this->errorMessage = null;
<<<<<<< HEAD
            set_error_handler(array($this, 'customErrorHandler'));
=======
            set_error_handler([$this, 'customErrorHandler']);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $this->stream = fopen($this->url, 'a');
            if ($this->filePermission !== null) {
                @chmod($this->url, $this->filePermission);
            }
            restore_error_handler();
            if (!is_resource($this->stream)) {
                $this->stream = null;
<<<<<<< HEAD
=======

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                throw new \UnexpectedValueException(sprintf('The stream or file "%s" could not be opened: '.$this->errorMessage, $this->url));
            }
        }

        if ($this->useLocking) {
            // ignoring errors here, there's not much we can do about them
            flock($this->stream, LOCK_EX);
        }

        $this->streamWrite($this->stream, $record);

        if ($this->useLocking) {
            flock($this->stream, LOCK_UN);
        }
    }

    /**
     * Write to stream
     * @param resource $stream
<<<<<<< HEAD
     * @param array $record
     */
    protected function streamWrite($stream, array $record)
=======
     * @param array    $record
     */
    protected function streamWrite($stream, array $record): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        fwrite($stream, (string) $record['formatted']);
    }

<<<<<<< HEAD
    private function customErrorHandler($code, $msg)
    {
        $this->errorMessage = preg_replace('{^(fopen|mkdir)\(.*?\): }', '', $msg);
    }

    /**
     * @param string $stream
     *
     * @return null|string
     */
    private function getDirFromStream($stream)
=======
    private function customErrorHandler($code, $msg): bool
    {
        $this->errorMessage = preg_replace('{^(fopen|mkdir)\(.*?\): }', '', $msg);

        return true;
    }

    private function getDirFromStream(string $stream): ?string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $pos = strpos($stream, '://');
        if ($pos === false) {
            return dirname($stream);
        }

        if ('file://' === substr($stream, 0, 7)) {
            return dirname(substr($stream, 7));
        }

<<<<<<< HEAD
        return;
    }

    private function createDir()
=======
        return null;
    }

    private function createDir(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        // Do not try to create dir if it has already been tried.
        if ($this->dirCreated) {
            return;
        }

        $dir = $this->getDirFromStream($this->url);
        if (null !== $dir && !is_dir($dir)) {
            $this->errorMessage = null;
<<<<<<< HEAD
            set_error_handler(array($this, 'customErrorHandler'));
=======
            set_error_handler([$this, 'customErrorHandler']);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $status = mkdir($dir, 0777, true);
            restore_error_handler();
            if (false === $status && !is_dir($dir)) {
                throw new \UnexpectedValueException(sprintf('There is no existing directory at "%s" and its not buildable: '.$this->errorMessage, $dir));
            }
        }
        $this->dirCreated = true;
    }
}
