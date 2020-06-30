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

namespace Monolog\Handler\SyslogUdp;

<<<<<<< HEAD
class UdpSocket
{
    const DATAGRAM_MAX_LENGTH = 65023;

    protected $ip;
    protected $port;
    protected $socket;

    public function __construct($ip, $port = 514)
=======
use Monolog\Utils;

class UdpSocket
{
    protected const DATAGRAM_MAX_LENGTH = 65023;

    /** @var string */
    protected $ip;
    /** @var int */
    protected $port;
    /** @var resource|null */
    protected $socket;

    public function __construct(string $ip, int $port = 514)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->ip = $ip;
        $this->port = $port;
        $this->socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    }

    public function write($line, $header = "")
    {
        $this->send($this->assembleMessage($line, $header));
    }

<<<<<<< HEAD
    public function close()
=======
    public function close(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (is_resource($this->socket)) {
            socket_close($this->socket);
            $this->socket = null;
        }
    }

<<<<<<< HEAD
    protected function send($chunk)
    {
        if (!is_resource($this->socket)) {
            throw new \LogicException('The UdpSocket to '.$this->ip.':'.$this->port.' has been closed and can not be written to anymore');
=======
    protected function send(string $chunk): void
    {
        if (!is_resource($this->socket)) {
            throw new \RuntimeException('The UdpSocket to '.$this->ip.':'.$this->port.' has been closed and can not be written to anymore');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }
        socket_sendto($this->socket, $chunk, strlen($chunk), $flags = 0, $this->ip, $this->port);
    }

<<<<<<< HEAD
    protected function assembleMessage($line, $header)
    {
        $chunkSize = self::DATAGRAM_MAX_LENGTH - strlen($header);

        return $header . substr($line, 0, $chunkSize);
=======
    protected function assembleMessage(string $line, string $header): string
    {
        $chunkSize = static::DATAGRAM_MAX_LENGTH - strlen($header);

        return $header . Utils::substr($line, 0, $chunkSize);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
