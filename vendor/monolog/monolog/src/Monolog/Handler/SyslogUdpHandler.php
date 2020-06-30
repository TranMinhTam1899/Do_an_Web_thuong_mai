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
use DateTimeInterface;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use Monolog\Logger;
use Monolog\Handler\SyslogUdp\UdpSocket;

/**
 * A Handler for logging to a remote syslogd server.
 *
 * @author Jesper Skovgaard Nielsen <nulpunkt@gmail.com>
 * @author Dominik Kukacka <dominik.kukacka@gmail.com>
 */
class SyslogUdpHandler extends AbstractSyslogHandler
{
    const RFC3164 = 0;
    const RFC5424 = 1;

    private $dateFormats = array(
        self::RFC3164 => 'M d H:i:s',
        self::RFC5424 => \DateTime::RFC3339,
    );

    protected $socket;
    protected $ident;
    protected $rfc;

    /**
<<<<<<< HEAD
     * @param string $host
     * @param int    $port
     * @param mixed  $facility
     * @param int    $level    The minimum logging level at which this handler will be triggered
     * @param bool   $bubble   Whether the messages that are handled can bubble up the stack or not
     * @param string $ident    Program name or tag for each log message.
     * @param int    $rfc      RFC to format the message for.
     */
    public function __construct($host, $port = 514, $facility = LOG_USER, $level = Logger::DEBUG, $bubble = true, $ident = 'php', $rfc = self::RFC5424)
=======
     * @param string     $host
     * @param int        $port
     * @param string|int $facility Either one of the names of the keys in $this->facilities, or a LOG_* facility constant
     * @param string|int $level    The minimum logging level at which this handler will be triggered
     * @param bool       $bubble   Whether the messages that are handled can bubble up the stack or not
     * @param string     $ident    Program name or tag for each log message.
     * @param int        $rfc      RFC to format the message for.
     */
    public function __construct(string $host, int $port = 514, $facility = LOG_USER, $level = Logger::DEBUG, bool $bubble = true, string $ident = 'php', int $rfc = self::RFC5424)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        parent::__construct($facility, $level, $bubble);

        $this->ident = $ident;
        $this->rfc = $rfc;

        $this->socket = new UdpSocket($host, $port ?: 514);
    }

<<<<<<< HEAD
    protected function write(array $record)
    {
        $lines = $this->splitMessageIntoLines($record['formatted']);

        $header = $this->makeCommonSyslogHeader($this->logLevels[$record['level']]);
=======
    protected function write(array $record): void
    {
        $lines = $this->splitMessageIntoLines($record['formatted']);

        $header = $this->makeCommonSyslogHeader($this->logLevels[$record['level']], $record['datetime']);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        foreach ($lines as $line) {
            $this->socket->write($line, $header);
        }
    }

<<<<<<< HEAD
    public function close()
=======
    public function close(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->socket->close();
    }

<<<<<<< HEAD
    private function splitMessageIntoLines($message)
=======
    private function splitMessageIntoLines($message): array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (is_array($message)) {
            $message = implode("\n", $message);
        }

<<<<<<< HEAD
        return preg_split('/$\R?^/m', $message, -1, PREG_SPLIT_NO_EMPTY);
=======
        return preg_split('/$\R?^/m', (string) $message, -1, PREG_SPLIT_NO_EMPTY);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Make common syslog header (see rfc5424 or rfc3164)
     */
<<<<<<< HEAD
    protected function makeCommonSyslogHeader($severity)
=======
    protected function makeCommonSyslogHeader(int $severity, DateTimeInterface $datetime): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $priority = $severity + $this->facility;

        if (!$pid = getmypid()) {
            $pid = '-';
        }

        if (!$hostname = gethostname()) {
            $hostname = '-';
        }

<<<<<<< HEAD
        $date = $this->getDateTime();
=======
        if ($this->rfc === self::RFC3164) {
            $datetime->setTimezone(new \DateTimeZone('UTC'));
        }
        $date = $datetime->format($this->dateFormats[$this->rfc]);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        if ($this->rfc === self::RFC3164) {
            return "<$priority>" .
                $date . " " .
                $hostname . " " .
                $this->ident . "[" . $pid . "]: ";
        } else {
            return "<$priority>1 " .
                $date . " " .
                $hostname . " " .
                $this->ident . " " .
                $pid . " - - ";
        }
    }

<<<<<<< HEAD
    protected function getDateTime()
    {
        return date($this->dateFormats[$this->rfc]);
    }

    /**
     * Inject your own socket, mainly used for testing
     */
    public function setSocket($socket)
    {
        $this->socket = $socket;
=======
    /**
     * Inject your own socket, mainly used for testing
     */
    public function setSocket(UdpSocket $socket): self
    {
        $this->socket = $socket;

        return $this;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
