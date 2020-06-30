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
use Monolog\Utils;
=======
use InvalidArgumentException;
use Monolog\Logger;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * Stores logs to files that are rotated every day and a limited number of files are kept.
 *
 * This rotation is only intended to be used as a workaround. Using logrotate to
 * handle the rotation is strongly encouraged when you can use it.
 *
 * @author Christophe Coevoet <stof@notk.org>
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
class RotatingFileHandler extends StreamHandler
{
<<<<<<< HEAD
    const FILE_PER_DAY = 'Y-m-d';
    const FILE_PER_MONTH = 'Y-m';
    const FILE_PER_YEAR = 'Y';
=======
    public const FILE_PER_DAY = 'Y-m-d';
    public const FILE_PER_MONTH = 'Y-m';
    public const FILE_PER_YEAR = 'Y';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    protected $filename;
    protected $maxFiles;
    protected $mustRotate;
    protected $nextRotation;
    protected $filenameFormat;
    protected $dateFormat;

    /**
<<<<<<< HEAD
     * @param string   $filename
     * @param int      $maxFiles       The maximal amount of files to keep (0 means unlimited)
     * @param int      $level          The minimum logging level at which this handler will be triggered
     * @param bool     $bubble         Whether the messages that are handled can bubble up the stack or not
     * @param int|null $filePermission Optional file permissions (default (0644) are only for owner read/write)
     * @param bool     $useLocking     Try to lock log file before doing any writes
     */
    public function __construct($filename, $maxFiles = 0, $level = Logger::DEBUG, $bubble = true, $filePermission = null, $useLocking = false)
    {
        $this->filename = Utils::canonicalizePath($filename);
        $this->maxFiles = (int) $maxFiles;
        $this->nextRotation = new \DateTime('tomorrow');
        $this->filenameFormat = '{filename}-{date}';
        $this->dateFormat = 'Y-m-d';
=======
     * @param string     $filename
     * @param int        $maxFiles       The maximal amount of files to keep (0 means unlimited)
     * @param string|int $level          The minimum logging level at which this handler will be triggered
     * @param bool       $bubble         Whether the messages that are handled can bubble up the stack or not
     * @param int|null   $filePermission Optional file permissions (default (0644) are only for owner read/write)
     * @param bool       $useLocking     Try to lock log file before doing any writes
     */
    public function __construct(string $filename, int $maxFiles = 0, $level = Logger::DEBUG, bool $bubble = true, ?int $filePermission = null, bool $useLocking = false)
    {
        $this->filename = $filename;
        $this->maxFiles = $maxFiles;
        $this->nextRotation = new \DateTimeImmutable('tomorrow');
        $this->filenameFormat = '{filename}-{date}';
        $this->dateFormat = static::FILE_PER_DAY;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        parent::__construct($this->getTimedFilename(), $level, $bubble, $filePermission, $useLocking);
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
        parent::close();

        if (true === $this->mustRotate) {
            $this->rotate();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function reset()
    {
        parent::reset();

        if (true === $this->mustRotate) {
            $this->rotate();
        }
    }

<<<<<<< HEAD
    public function setFilenameFormat($filenameFormat, $dateFormat)
    {
        if (!preg_match('{^Y(([/_.-]?m)([/_.-]?d)?)?$}', $dateFormat)) {
            trigger_error(
                'Invalid date format - format must be one of '.
                'RotatingFileHandler::FILE_PER_DAY ("Y-m-d"), RotatingFileHandler::FILE_PER_MONTH ("Y-m") '.
                'or RotatingFileHandler::FILE_PER_YEAR ("Y"), or you can set one of the '.
                'date formats using slashes, underscores and/or dots instead of dashes.',
                E_USER_DEPRECATED
            );
        }
        if (substr_count($filenameFormat, '{date}') === 0) {
            trigger_error(
                'Invalid filename format - format should contain at least `{date}`, because otherwise rotating is impossible.',
                E_USER_DEPRECATED
=======
    public function setFilenameFormat(string $filenameFormat, string $dateFormat): self
    {
        if (!preg_match('{^[Yy](([/_.-]?m)([/_.-]?d)?)?$}', $dateFormat)) {
            throw new InvalidArgumentException(
                'Invalid date format - format must be one of '.
                'RotatingFileHandler::FILE_PER_DAY ("Y-m-d"), RotatingFileHandler::FILE_PER_MONTH ("Y-m") '.
                'or RotatingFileHandler::FILE_PER_YEAR ("Y"), or you can set one of the '.
                'date formats using slashes, underscores and/or dots instead of dashes.'
            );
        }
        if (substr_count($filenameFormat, '{date}') === 0) {
            throw new InvalidArgumentException(
                'Invalid filename format - format must contain at least `{date}`, because otherwise rotating is impossible.'
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            );
        }
        $this->filenameFormat = $filenameFormat;
        $this->dateFormat = $dateFormat;
        $this->url = $this->getTimedFilename();
        $this->close();
<<<<<<< HEAD
=======

        return $this;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
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
        // on the first record written, if the log is new, we should rotate (once per day)
        if (null === $this->mustRotate) {
            $this->mustRotate = !file_exists($this->url);
        }

<<<<<<< HEAD
        if ($this->nextRotation < $record['datetime']) {
=======
        if ($this->nextRotation <= $record['datetime']) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $this->mustRotate = true;
            $this->close();
        }

        parent::write($record);
    }

    /**
     * Rotates the files.
     */
<<<<<<< HEAD
    protected function rotate()
    {
        // update filename
        $this->url = $this->getTimedFilename();
        $this->nextRotation = new \DateTime('tomorrow');
=======
    protected function rotate(): void
    {
        // update filename
        $this->url = $this->getTimedFilename();
        $this->nextRotation = new \DateTimeImmutable('tomorrow');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        // skip GC of old logs if files are unlimited
        if (0 === $this->maxFiles) {
            return;
        }

        $logFiles = glob($this->getGlobPattern());
        if ($this->maxFiles >= count($logFiles)) {
            // no files to remove
            return;
        }

        // Sorting the files by name to remove the older ones
        usort($logFiles, function ($a, $b) {
            return strcmp($b, $a);
        });

        foreach (array_slice($logFiles, $this->maxFiles) as $file) {
            if (is_writable($file)) {
                // suppress errors here as unlink() might fail if two processes
                // are cleaning up/rotating at the same time
<<<<<<< HEAD
                set_error_handler(function ($errno, $errstr, $errfile, $errline) {});
=======
                set_error_handler(function (int $errno, string $errstr, string $errfile, int $errline): bool {
                    return false;
                });
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                unlink($file);
                restore_error_handler();
            }
        }

        $this->mustRotate = false;
    }

<<<<<<< HEAD
    protected function getTimedFilename()
    {
        $fileInfo = pathinfo($this->filename);
        $timedFilename = str_replace(
            array('{filename}', '{date}'),
            array($fileInfo['filename'], date($this->dateFormat)),
=======
    protected function getTimedFilename(): string
    {
        $fileInfo = pathinfo($this->filename);
        $timedFilename = str_replace(
            ['{filename}', '{date}'],
            [$fileInfo['filename'], date($this->dateFormat)],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $fileInfo['dirname'] . '/' . $this->filenameFormat
        );

        if (!empty($fileInfo['extension'])) {
            $timedFilename .= '.'.$fileInfo['extension'];
        }

        return $timedFilename;
    }

<<<<<<< HEAD
    protected function getGlobPattern()
    {
        $fileInfo = pathinfo($this->filename);
        $glob = str_replace(
            array('{filename}', '{date}'),
            array($fileInfo['filename'], '[0-9][0-9][0-9][0-9]*'),
=======
    protected function getGlobPattern(): string
    {
        $fileInfo = pathinfo($this->filename);
        $glob = str_replace(
            ['{filename}', '{date}'],
            [$fileInfo['filename'], '[0-9][0-9][0-9][0-9]*'],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $fileInfo['dirname'] . '/' . $this->filenameFormat
        );
        if (!empty($fileInfo['extension'])) {
            $glob .= '.'.$fileInfo['extension'];
        }

        return $glob;
    }
}
