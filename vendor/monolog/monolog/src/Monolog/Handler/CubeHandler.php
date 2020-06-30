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
 * Logs to Cube.
 *
 * @link http://square.github.com/cube/
 * @author Wan Chen <kami@kamisama.me>
 */
class CubeHandler extends AbstractProcessingHandler
{
    private $udpConnection;
    private $httpConnection;
    private $scheme;
    private $host;
    private $port;
<<<<<<< HEAD
    private $acceptedSchemes = array('http', 'udp');
=======
    private $acceptedSchemes = ['http', 'udp'];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Create a Cube handler
     *
     * @throws \UnexpectedValueException when given url is not a valid url.
     *                                   A valid url must consist of three parts : protocol://host:port
     *                                   Only valid protocols used by Cube are http and udp
     */
<<<<<<< HEAD
    public function __construct($url, $level = Logger::DEBUG, $bubble = true)
=======
    public function __construct(string $url, $level = Logger::DEBUG, bool $bubble = true)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $urlInfo = parse_url($url);

        if (!isset($urlInfo['scheme'], $urlInfo['host'], $urlInfo['port'])) {
            throw new \UnexpectedValueException('URL "'.$url.'" is not valid');
        }

        if (!in_array($urlInfo['scheme'], $this->acceptedSchemes)) {
            throw new \UnexpectedValueException(
                'Invalid protocol (' . $urlInfo['scheme']  . ').'
<<<<<<< HEAD
                . ' Valid options are ' . implode(', ', $this->acceptedSchemes));
=======
                . ' Valid options are ' . implode(', ', $this->acceptedSchemes)
            );
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        $this->scheme = $urlInfo['scheme'];
        $this->host = $urlInfo['host'];
        $this->port = $urlInfo['port'];

        parent::__construct($level, $bubble);
    }

    /**
     * Establish a connection to an UDP socket
     *
     * @throws \LogicException           when unable to connect to the socket
     * @throws MissingExtensionException when there is no socket extension
     */
<<<<<<< HEAD
    protected function connectUdp()
=======
    protected function connectUdp(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!extension_loaded('sockets')) {
            throw new MissingExtensionException('The sockets extension is required to use udp URLs with the CubeHandler');
        }

        $this->udpConnection = socket_create(AF_INET, SOCK_DGRAM, 0);
        if (!$this->udpConnection) {
            throw new \LogicException('Unable to create a socket');
        }

        if (!socket_connect($this->udpConnection, $this->host, $this->port)) {
            throw new \LogicException('Unable to connect to the socket at ' . $this->host . ':' . $this->port);
        }
    }

    /**
<<<<<<< HEAD
     * Establish a connection to a http server
     * @throws \LogicException when no curl extension
     */
    protected function connectHttp()
    {
        if (!extension_loaded('curl')) {
            throw new \LogicException('The curl extension is needed to use http URLs with the CubeHandler');
=======
     * Establish a connection to an http server
     *
     * @throws \LogicException           when unable to connect to the socket
     * @throws MissingExtensionException when no curl extension
     */
    protected function connectHttp(): void
    {
        if (!extension_loaded('curl')) {
            throw new MissingExtensionException('The curl extension is required to use http URLs with the CubeHandler');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        $this->httpConnection = curl_init('http://'.$this->host.':'.$this->port.'/1.0/event/put');

        if (!$this->httpConnection) {
            throw new \LogicException('Unable to connect to ' . $this->host . ':' . $this->port);
        }

        curl_setopt($this->httpConnection, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($this->httpConnection, CURLOPT_RETURNTRANSFER, true);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function write(array $record)
    {
        $date = $record['datetime'];

        $data = array('time' => $date->format('Y-m-d\TH:i:s.uO'));
=======
    protected function write(array $record): void
    {
        $date = $record['datetime'];

        $data = ['time' => $date->format('Y-m-d\TH:i:s.uO')];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        unset($record['datetime']);

        if (isset($record['context']['type'])) {
            $data['type'] = $record['context']['type'];
            unset($record['context']['type']);
        } else {
            $data['type'] = $record['channel'];
        }

        $data['data'] = $record['context'];
        $data['data']['level'] = $record['level'];

        if ($this->scheme === 'http') {
<<<<<<< HEAD
            $this->writeHttp(Utils::jsonEncode($data));
        } else {
            $this->writeUdp(Utils::jsonEncode($data));
        }
    }

    private function writeUdp($data)
=======
            $this->writeHttp(json_encode($data));
        } else {
            $this->writeUdp(json_encode($data));
        }
    }

    private function writeUdp(string $data): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!$this->udpConnection) {
            $this->connectUdp();
        }

        socket_send($this->udpConnection, $data, strlen($data), 0);
    }

<<<<<<< HEAD
    private function writeHttp($data)
=======
    private function writeHttp(string $data): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!$this->httpConnection) {
            $this->connectHttp();
        }

        curl_setopt($this->httpConnection, CURLOPT_POSTFIELDS, '['.$data.']');
<<<<<<< HEAD
        curl_setopt($this->httpConnection, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen('['.$data.']'),
        ));
=======
        curl_setopt($this->httpConnection, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen('['.$data.']'),
        ]);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        Curl\Util::execute($this->httpConnection, 5, false);
    }
}
