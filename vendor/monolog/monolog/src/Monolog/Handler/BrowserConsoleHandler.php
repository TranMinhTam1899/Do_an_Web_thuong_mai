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

use Monolog\Formatter\LineFormatter;
<<<<<<< HEAD
=======
use Monolog\Formatter\FormatterInterface;
use Monolog\Utils;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * Handler sending logs to browser's javascript console with no browser extension required
 *
 * @author Olivier Poitrey <rs@dailymotion.com>
 */
class BrowserConsoleHandler extends AbstractProcessingHandler
{
    protected static $initialized = false;
<<<<<<< HEAD
    protected static $records = array();
=======
    protected static $records = [];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * {@inheritDoc}
     *
     * Formatted output may contain some formatting markers to be transferred to `console.log` using the %c format.
     *
     * Example of formatted string:
     *
     *     You can do [[blue text]]{color: blue} or [[green background]]{background-color: green; color: white}
     */
<<<<<<< HEAD
    protected function getDefaultFormatter()
=======
    protected function getDefaultFormatter(): FormatterInterface
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return new LineFormatter('[[%channel%]]{macro: autolabel} [[%level_name%]]{font-weight: bold} %message%');
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
        // Accumulate records
        static::$records[] = $record;

        // Register shutdown handler if not already done
        if (!static::$initialized) {
            static::$initialized = true;
            $this->registerShutdownFunction();
        }
    }

    /**
     * Convert records to javascript console commands and send it to the browser.
     * This method is automatically called on PHP shutdown if output is HTML or Javascript.
     */
<<<<<<< HEAD
    public static function send()
=======
    public static function send(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $format = static::getResponseFormat();
        if ($format === 'unknown') {
            return;
        }

        if (count(static::$records)) {
            if ($format === 'html') {
                static::writeOutput('<script>' . static::generateScript() . '</script>');
            } elseif ($format === 'js') {
                static::writeOutput(static::generateScript());
            }
            static::resetStatic();
        }
    }

<<<<<<< HEAD
    public function close()
=======
    public function close(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        self::resetStatic();
    }

    public function reset()
    {
<<<<<<< HEAD
=======
        parent::reset();

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        self::resetStatic();
    }

    /**
     * Forget all logged records
     */
<<<<<<< HEAD
    public static function resetStatic()
    {
        static::$records = array();
=======
    public static function resetStatic(): void
    {
        static::$records = [];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Wrapper for register_shutdown_function to allow overriding
     */
<<<<<<< HEAD
    protected function registerShutdownFunction()
    {
        if (PHP_SAPI !== 'cli') {
            register_shutdown_function(array('Monolog\Handler\BrowserConsoleHandler', 'send'));
=======
    protected function registerShutdownFunction(): void
    {
        if (PHP_SAPI !== 'cli') {
            register_shutdown_function(['Monolog\Handler\BrowserConsoleHandler', 'send']);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }
    }

    /**
     * Wrapper for echo to allow overriding
<<<<<<< HEAD
     *
     * @param string $str
     */
    protected static function writeOutput($str)
=======
     */
    protected static function writeOutput(string $str): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        echo $str;
    }

    /**
     * Checks the format of the response
     *
     * If Content-Type is set to application/javascript or text/javascript -> js
     * If Content-Type is set to text/html, or is unset -> html
     * If Content-Type is anything else -> unknown
     *
     * @return string One of 'js', 'html' or 'unknown'
     */
<<<<<<< HEAD
    protected static function getResponseFormat()
=======
    protected static function getResponseFormat(): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        // Check content type
        foreach (headers_list() as $header) {
            if (stripos($header, 'content-type:') === 0) {
                // This handler only works with HTML and javascript outputs
                // text/javascript is obsolete in favour of application/javascript, but still used
                if (stripos($header, 'application/javascript') !== false || stripos($header, 'text/javascript') !== false) {
                    return 'js';
                }
                if (stripos($header, 'text/html') === false) {
                    return 'unknown';
                }
                break;
            }
        }

        return 'html';
    }

<<<<<<< HEAD
    private static function generateScript()
    {
        $script = array();
=======
    private static function generateScript(): string
    {
        $script = [];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        foreach (static::$records as $record) {
            $context = static::dump('Context', $record['context']);
            $extra = static::dump('Extra', $record['extra']);

            if (empty($context) && empty($extra)) {
                $script[] = static::call_array('log', static::handleStyles($record['formatted']));
            } else {
<<<<<<< HEAD
                $script = array_merge($script,
                    array(static::call_array('groupCollapsed', static::handleStyles($record['formatted']))),
                    $context,
                    $extra,
                    array(static::call('groupEnd'))
=======
                $script = array_merge(
                    $script,
                    [static::call_array('groupCollapsed', static::handleStyles($record['formatted']))],
                    $context,
                    $extra,
                    [static::call('groupEnd')]
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                );
            }
        }

        return "(function (c) {if (c && c.groupCollapsed) {\n" . implode("\n", $script) . "\n}})(console);";
    }

<<<<<<< HEAD
    private static function handleStyles($formatted)
    {
        $args = array();
=======
    private static function handleStyles(string $formatted): array
    {
        $args = [static::quote('font-weight: normal')];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $format = '%c' . $formatted;
        preg_match_all('/\[\[(.*?)\]\]\{([^}]*)\}/s', $format, $matches, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);

        foreach (array_reverse($matches) as $match) {
<<<<<<< HEAD
            $args[] = '"font-weight: normal"';
            $args[] = static::quote(static::handleCustomStyles($match[2][0], $match[1][0]));

            $pos = $match[0][1];
            $format = substr($format, 0, $pos) . '%c' . $match[1][0] . '%c' . substr($format, $pos + strlen($match[0][0]));
        }

        $args[] = static::quote('font-weight: normal');
        $args[] = static::quote($format);

        return array_reverse($args);
    }

    private static function handleCustomStyles($style, $string)
    {
        static $colors = array('blue', 'green', 'red', 'magenta', 'orange', 'black', 'grey');
        static $labels = array();

        return preg_replace_callback('/macro\s*:(.*?)(?:;|$)/', function ($m) use ($string, &$colors, &$labels) {
=======
            $args[] = static::quote(static::handleCustomStyles($match[2][0], $match[1][0]));
            $args[] = '"font-weight: normal"';

            $pos = $match[0][1];
            $format = Utils::substr($format, 0, $pos) . '%c' . $match[1][0] . '%c' . Utils::substr($format, $pos + strlen($match[0][0]));
        }

        array_unshift($args, static::quote($format));

        return $args;
    }

    private static function handleCustomStyles(string $style, string $string): string
    {
        static $colors = ['blue', 'green', 'red', 'magenta', 'orange', 'black', 'grey'];
        static $labels = [];

        return preg_replace_callback('/macro\s*:(.*?)(?:;|$)/', function (array $m) use ($string, &$colors, &$labels) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            if (trim($m[1]) === 'autolabel') {
                // Format the string as a label with consistent auto assigned background color
                if (!isset($labels[$string])) {
                    $labels[$string] = $colors[count($labels) % count($colors)];
                }
                $color = $labels[$string];

                return "background-color: $color; color: white; border-radius: 3px; padding: 0 2px 0 2px";
            }

            return $m[1];
        }, $style);
    }

<<<<<<< HEAD
    private static function dump($title, array $dict)
    {
        $script = array();
=======
    private static function dump(string $title, array $dict): array
    {
        $script = [];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $dict = array_filter($dict);
        if (empty($dict)) {
            return $script;
        }
        $script[] = static::call('log', static::quote('%c%s'), static::quote('font-weight: bold'), static::quote($title));
        foreach ($dict as $key => $value) {
            $value = json_encode($value);
            if (empty($value)) {
                $value = static::quote('');
            }
            $script[] = static::call('log', static::quote('%s: %o'), static::quote($key), $value);
        }

        return $script;
    }

<<<<<<< HEAD
    private static function quote($arg)
=======
    private static function quote(string $arg): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return '"' . addcslashes($arg, "\"\n\\") . '"';
    }

<<<<<<< HEAD
    private static function call()
    {
        $args = func_get_args();
=======
    private static function call(...$args): string
    {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $method = array_shift($args);

        return static::call_array($method, $args);
    }

<<<<<<< HEAD
    private static function call_array($method, array $args)
=======
    private static function call_array(string $method, array $args): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return 'c.' . $method . '(' . implode(', ', $args) . ');';
    }
}
