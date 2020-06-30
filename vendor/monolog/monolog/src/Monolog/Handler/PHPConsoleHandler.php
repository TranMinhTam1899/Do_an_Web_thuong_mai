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
use Exception;
use Monolog\Formatter\LineFormatter;
use Monolog\Logger;
use Monolog\Utils;
use PhpConsole\Connector;
use PhpConsole\Handler;
=======
use Monolog\Formatter\LineFormatter;
use Monolog\Formatter\FormatterInterface;
use Monolog\Logger;
use PhpConsole\Connector;
use PhpConsole\Handler as VendorPhpConsoleHandler;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use PhpConsole\Helper;

/**
 * Monolog handler for Google Chrome extension "PHP Console"
 *
 * Display PHP error/debug log messages in Google Chrome console and notification popups, executes PHP code remotely
 *
 * Usage:
 * 1. Install Google Chrome extension https://chrome.google.com/webstore/detail/php-console/nfhmhhlpfleoednkpnnnkolmclajemef
 * 2. See overview https://github.com/barbushin/php-console#overview
 * 3. Install PHP Console library https://github.com/barbushin/php-console#installation
 * 4. Example (result will looks like http://i.hizliresim.com/vg3Pz4.png)
 *
 *      $logger = new \Monolog\Logger('all', array(new \Monolog\Handler\PHPConsoleHandler()));
 *      \Monolog\ErrorHandler::register($logger);
 *      echo $undefinedVar;
<<<<<<< HEAD
 *      $logger->addDebug('SELECT * FROM users', array('db', 'time' => 0.012));
=======
 *      $logger->debug('SELECT * FROM users', array('db', 'time' => 0.012));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 *      PC::debug($_SERVER); // PHP Console debugger for any type of vars
 *
 * @author Sergey Barbushin https://www.linkedin.com/in/barbushin
 */
class PHPConsoleHandler extends AbstractProcessingHandler
{
<<<<<<< HEAD
    private $options = array(
        'enabled' => true, // bool Is PHP Console server enabled
        'classesPartialsTraceIgnore' => array('Monolog\\'), // array Hide calls of classes started with...
        'debugTagsKeysInContext' => array(0, 'tag'), // bool Is PHP Console server enabled
=======
    private $options = [
        'enabled' => true, // bool Is PHP Console server enabled
        'classesPartialsTraceIgnore' => ['Monolog\\'], // array Hide calls of classes started with...
        'debugTagsKeysInContext' => [0, 'tag'], // bool Is PHP Console server enabled
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        'useOwnErrorsHandler' => false, // bool Enable errors handling
        'useOwnExceptionsHandler' => false, // bool Enable exceptions handling
        'sourcesBasePath' => null, // string Base path of all project sources to strip in errors source paths
        'registerHelper' => true, // bool Register PhpConsole\Helper that allows short debug calls like PC::debug($var, 'ta.g.s')
        'serverEncoding' => null, // string|null Server internal encoding
        'headersLimit' => null, // int|null Set headers size limit for your web-server
        'password' => null, // string|null Protect PHP Console connection by password
        'enableSslOnlyMode' => false, // bool Force connection by SSL for clients with PHP Console installed
<<<<<<< HEAD
        'ipMasks' => array(), // array Set IP masks of clients that will be allowed to connect to PHP Console: array('192.168.*.*', '127.0.0.1')
=======
        'ipMasks' => [], // array Set IP masks of clients that will be allowed to connect to PHP Console: array('192.168.*.*', '127.0.0.1')
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        'enableEvalListener' => false, // bool Enable eval request to be handled by eval dispatcher(if enabled, 'password' option is also required)
        'dumperDetectCallbacks' => false, // bool Convert callback items in dumper vars to (callback SomeClass::someMethod) strings
        'dumperLevelLimit' => 5, // int Maximum dumped vars array or object nested dump level
        'dumperItemsCountLimit' => 100, // int Maximum dumped var same level array items or object properties number
        'dumperItemSizeLimit' => 5000, // int Maximum length of any string or dumped array item
        'dumperDumpSizeLimit' => 500000, // int Maximum approximate size of dumped vars result formatted in JSON
        'detectDumpTraceAndSource' => false, // bool Autodetect and append trace data to debug
<<<<<<< HEAD
        'dataStorage' => null, // PhpConsole\Storage|null Fixes problem with custom $_SESSION handler(see http://goo.gl/Ne8juJ)
    );
=======
        'dataStorage' => null, // \PhpConsole\Storage|null Fixes problem with custom $_SESSION handler(see http://goo.gl/Ne8juJ)
    ];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /** @var Connector */
    private $connector;

    /**
<<<<<<< HEAD
     * @param  array          $options   See \Monolog\Handler\PHPConsoleHandler::$options for more details
     * @param  Connector|null $connector Instance of \PhpConsole\Connector class (optional)
     * @param  int            $level
     * @param  bool           $bubble
     * @throws Exception
     */
    public function __construct(array $options = array(), Connector $connector = null, $level = Logger::DEBUG, $bubble = true)
    {
        if (!class_exists('PhpConsole\Connector')) {
            throw new Exception('PHP Console library not found. See https://github.com/barbushin/php-console#installation');
=======
     * @param  array             $options   See \Monolog\Handler\PHPConsoleHandler::$options for more details
     * @param  Connector|null    $connector Instance of \PhpConsole\Connector class (optional)
     * @param  string|int        $level     The minimum logging level at which this handler will be triggered.
     * @param  bool              $bubble    Whether the messages that are handled can bubble up the stack or not.
     * @throws \RuntimeException
     */
    public function __construct(array $options = [], ?Connector $connector = null, $level = Logger::DEBUG, bool $bubble = true)
    {
        if (!class_exists('PhpConsole\Connector')) {
            throw new \RuntimeException('PHP Console library not found. See https://github.com/barbushin/php-console#installation');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }
        parent::__construct($level, $bubble);
        $this->options = $this->initOptions($options);
        $this->connector = $this->initConnector($connector);
    }

<<<<<<< HEAD
    private function initOptions(array $options)
    {
        $wrongOptions = array_diff(array_keys($options), array_keys($this->options));
        if ($wrongOptions) {
            throw new Exception('Unknown options: ' . implode(', ', $wrongOptions));
=======
    private function initOptions(array $options): array
    {
        $wrongOptions = array_diff(array_keys($options), array_keys($this->options));
        if ($wrongOptions) {
            throw new \RuntimeException('Unknown options: ' . implode(', ', $wrongOptions));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return array_replace($this->options, $options);
    }

<<<<<<< HEAD
    private function initConnector(Connector $connector = null)
=======
    /**
     * @suppress PhanTypeMismatchArgument
     */
    private function initConnector(?Connector $connector = null): Connector
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!$connector) {
            if ($this->options['dataStorage']) {
                Connector::setPostponeStorage($this->options['dataStorage']);
            }
            $connector = Connector::getInstance();
        }

        if ($this->options['registerHelper'] && !Helper::isRegistered()) {
            Helper::register();
        }

        if ($this->options['enabled'] && $connector->isActiveClient()) {
            if ($this->options['useOwnErrorsHandler'] || $this->options['useOwnExceptionsHandler']) {
<<<<<<< HEAD
                $handler = Handler::getInstance();
=======
                $handler = VendorPhpConsoleHandler::getInstance();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                $handler->setHandleErrors($this->options['useOwnErrorsHandler']);
                $handler->setHandleExceptions($this->options['useOwnExceptionsHandler']);
                $handler->start();
            }
            if ($this->options['sourcesBasePath']) {
                $connector->setSourcesBasePath($this->options['sourcesBasePath']);
            }
            if ($this->options['serverEncoding']) {
                $connector->setServerEncoding($this->options['serverEncoding']);
            }
            if ($this->options['password']) {
                $connector->setPassword($this->options['password']);
            }
            if ($this->options['enableSslOnlyMode']) {
                $connector->enableSslOnlyMode();
            }
            if ($this->options['ipMasks']) {
                $connector->setAllowedIpMasks($this->options['ipMasks']);
            }
            if ($this->options['headersLimit']) {
                $connector->setHeadersLimit($this->options['headersLimit']);
            }
            if ($this->options['detectDumpTraceAndSource']) {
                $connector->getDebugDispatcher()->detectTraceAndSource = true;
            }
            $dumper = $connector->getDumper();
            $dumper->levelLimit = $this->options['dumperLevelLimit'];
            $dumper->itemsCountLimit = $this->options['dumperItemsCountLimit'];
            $dumper->itemSizeLimit = $this->options['dumperItemSizeLimit'];
            $dumper->dumpSizeLimit = $this->options['dumperDumpSizeLimit'];
            $dumper->detectCallbacks = $this->options['dumperDetectCallbacks'];
            if ($this->options['enableEvalListener']) {
                $connector->startEvalRequestsListener();
            }
        }

        return $connector;
    }

<<<<<<< HEAD
    public function getConnector()
=======
    public function getConnector(): Connector
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->connector;
    }

<<<<<<< HEAD
    public function getOptions()
=======
    public function getOptions(): array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->options;
    }

<<<<<<< HEAD
    public function handle(array $record)
=======
    public function handle(array $record): bool
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if ($this->options['enabled'] && $this->connector->isActiveClient()) {
            return parent::handle($record);
        }

        return !$this->bubble;
    }

    /**
     * Writes the record down to the log of the implementing handler
<<<<<<< HEAD
     *
     * @param  array $record
     * @return void
     */
    protected function write(array $record)
    {
        if ($record['level'] < Logger::NOTICE) {
            $this->handleDebugRecord($record);
        } elseif (isset($record['context']['exception']) && $record['context']['exception'] instanceof Exception) {
=======
     */
    protected function write(array $record): void
    {
        if ($record['level'] < Logger::NOTICE) {
            $this->handleDebugRecord($record);
        } elseif (isset($record['context']['exception']) && $record['context']['exception'] instanceof \Throwable) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $this->handleExceptionRecord($record);
        } else {
            $this->handleErrorRecord($record);
        }
    }

<<<<<<< HEAD
    private function handleDebugRecord(array $record)
=======
    private function handleDebugRecord(array $record): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $tags = $this->getRecordTags($record);
        $message = $record['message'];
        if ($record['context']) {
<<<<<<< HEAD
            $message .= ' ' . Utils::jsonEncode($this->connector->getDumper()->dump(array_filter($record['context'])), null, true);
=======
            $message .= ' ' . json_encode($this->connector->getDumper()->dump(array_filter($record['context'])));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }
        $this->connector->getDebugDispatcher()->dispatchDebug($message, $tags, $this->options['classesPartialsTraceIgnore']);
    }

<<<<<<< HEAD
    private function handleExceptionRecord(array $record)
=======
    private function handleExceptionRecord(array $record): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->connector->getErrorsDispatcher()->dispatchException($record['context']['exception']);
    }

<<<<<<< HEAD
    private function handleErrorRecord(array $record)
=======
    private function handleErrorRecord(array $record): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $context = $record['context'];

        $this->connector->getErrorsDispatcher()->dispatchError(
<<<<<<< HEAD
            isset($context['code']) ? $context['code'] : null,
            isset($context['message']) ? $context['message'] : $record['message'],
            isset($context['file']) ? $context['file'] : null,
            isset($context['line']) ? $context['line'] : null,
=======
            $context['code'] ?? null,
            $context['message'] ?? $record['message'],
            $context['file'] ?? null,
            $context['line'] ?? null,
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $this->options['classesPartialsTraceIgnore']
        );
    }

    private function getRecordTags(array &$record)
    {
        $tags = null;
        if (!empty($record['context'])) {
            $context = & $record['context'];
            foreach ($this->options['debugTagsKeysInContext'] as $key) {
                if (!empty($context[$key])) {
                    $tags = $context[$key];
                    if ($key === 0) {
                        array_shift($context);
                    } else {
                        unset($context[$key]);
                    }
                    break;
                }
            }
        }

        return $tags ?: strtolower($record['level_name']);
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
        return new LineFormatter('%message%');
    }
}
