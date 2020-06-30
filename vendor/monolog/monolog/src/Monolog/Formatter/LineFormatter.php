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

namespace Monolog\Formatter;

use Monolog\Utils;

/**
 * Formats incoming records into a one-line string
 *
 * This is especially useful for logging to files
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 * @author Christophe Coevoet <stof@notk.org>
 */
class LineFormatter extends NormalizerFormatter
{
<<<<<<< HEAD
    const SIMPLE_FORMAT = "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n";
=======
    public const SIMPLE_FORMAT = "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n";
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    protected $format;
    protected $allowInlineLineBreaks;
    protected $ignoreEmptyContextAndExtra;
    protected $includeStacktraces;

    /**
<<<<<<< HEAD
     * @param string $format                     The format of the message
     * @param string $dateFormat                 The format of the timestamp: one supported by DateTime::format
     * @param bool   $allowInlineLineBreaks      Whether to allow inline line breaks in log entries
     * @param bool   $ignoreEmptyContextAndExtra
     */
    public function __construct($format = null, $dateFormat = null, $allowInlineLineBreaks = false, $ignoreEmptyContextAndExtra = false)
    {
        $this->format = $format ?: static::SIMPLE_FORMAT;
=======
     * @param string|null $format                     The format of the message
     * @param string|null $dateFormat                 The format of the timestamp: one supported by DateTime::format
     * @param bool        $allowInlineLineBreaks      Whether to allow inline line breaks in log entries
     * @param bool        $ignoreEmptyContextAndExtra
     */
    public function __construct(?string $format = null, ?string $dateFormat = null, bool $allowInlineLineBreaks = false, bool $ignoreEmptyContextAndExtra = false)
    {
        $this->format = $format === null ? static::SIMPLE_FORMAT : $format;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $this->allowInlineLineBreaks = $allowInlineLineBreaks;
        $this->ignoreEmptyContextAndExtra = $ignoreEmptyContextAndExtra;
        parent::__construct($dateFormat);
    }

<<<<<<< HEAD
    public function includeStacktraces($include = true)
=======
    public function includeStacktraces(bool $include = true)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->includeStacktraces = $include;
        if ($this->includeStacktraces) {
            $this->allowInlineLineBreaks = true;
        }
    }

<<<<<<< HEAD
    public function allowInlineLineBreaks($allow = true)
=======
    public function allowInlineLineBreaks(bool $allow = true)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->allowInlineLineBreaks = $allow;
    }

<<<<<<< HEAD
    public function ignoreEmptyContextAndExtra($ignore = true)
=======
    public function ignoreEmptyContextAndExtra(bool $ignore = true)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->ignoreEmptyContextAndExtra = $ignore;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function format(array $record)
=======
    public function format(array $record): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $vars = parent::format($record);

        $output = $this->format;

        foreach ($vars['extra'] as $var => $val) {
            if (false !== strpos($output, '%extra.'.$var.'%')) {
                $output = str_replace('%extra.'.$var.'%', $this->stringify($val), $output);
                unset($vars['extra'][$var]);
            }
        }

<<<<<<< HEAD

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        foreach ($vars['context'] as $var => $val) {
            if (false !== strpos($output, '%context.'.$var.'%')) {
                $output = str_replace('%context.'.$var.'%', $this->stringify($val), $output);
                unset($vars['context'][$var]);
            }
        }

        if ($this->ignoreEmptyContextAndExtra) {
            if (empty($vars['context'])) {
                unset($vars['context']);
                $output = str_replace('%context%', '', $output);
            }

            if (empty($vars['extra'])) {
                unset($vars['extra']);
                $output = str_replace('%extra%', '', $output);
            }
        }

        foreach ($vars as $var => $val) {
            if (false !== strpos($output, '%'.$var.'%')) {
                $output = str_replace('%'.$var.'%', $this->stringify($val), $output);
            }
        }

        // remove leftover %extra.xxx% and %context.xxx% if any
        if (false !== strpos($output, '%')) {
            $output = preg_replace('/%(?:extra|context)\..+?%/', '', $output);
        }

        return $output;
    }

<<<<<<< HEAD
    public function formatBatch(array $records)
=======
    public function formatBatch(array $records): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $message = '';
        foreach ($records as $record) {
            $message .= $this->format($record);
        }

        return $message;
    }

<<<<<<< HEAD
    public function stringify($value)
=======
    public function stringify($value): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->replaceNewlines($this->convertToString($value));
    }

<<<<<<< HEAD
    protected function normalizeException($e)
    {
        // TODO 2.0 only check for Throwable
        if (!$e instanceof \Exception && !$e instanceof \Throwable) {
            throw new \InvalidArgumentException('Exception/Throwable expected, got '.gettype($e).' / '.Utils::getClass($e));
        }

        $previousText = '';
        if ($previous = $e->getPrevious()) {
            do {
                $previousText .= ', '.Utils::getClass($previous).'(code: '.$previous->getCode().'): '.$previous->getMessage().' at '.$previous->getFile().':'.$previous->getLine();
            } while ($previous = $previous->getPrevious());
        }

        $str = '[object] ('.Utils::getClass($e).'(code: '.$e->getCode().'): '.$e->getMessage().' at '.$e->getFile().':'.$e->getLine().$previousText.')';
        if ($this->includeStacktraces) {
            $str .= "\n[stacktrace]\n".$e->getTraceAsString()."\n";
        }

        return $str;
    }

    protected function convertToString($data)
=======
    /**
     * @suppress PhanParamSignatureMismatch
     */
    protected function normalizeException(\Throwable $e, int $depth = 0): string
    {
        $str = $this->formatException($e);

        if ($previous = $e->getPrevious()) {
            do {
                $str .= "\n[previous exception] " . $this->formatException($previous);
            } while ($previous = $previous->getPrevious());
        }

        return $str;
    }

    protected function convertToString($data): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (null === $data || is_bool($data)) {
            return var_export($data, true);
        }

        if (is_scalar($data)) {
            return (string) $data;
        }

<<<<<<< HEAD
        if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
            return $this->toJson($data, true);
        }

        return str_replace('\\/', '/', $this->toJson($data, true));
    }

    protected function replaceNewlines($str)
=======
        return (string) $this->toJson($data, true);
    }

    protected function replaceNewlines(string $str): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if ($this->allowInlineLineBreaks) {
            if (0 === strpos($str, '{')) {
                return str_replace(array('\r', '\n'), array("\r", "\n"), $str);
            }

            return $str;
        }

<<<<<<< HEAD
        return str_replace(array("\r\n", "\r", "\n"), ' ', $str);
=======
        return str_replace(["\r\n", "\r", "\n"], ' ', $str);
    }

    private function formatException(\Throwable $e): string
    {
        $str = '[object] (' . Utils::getClass($e) . '(code: ' . $e->getCode();
        if ($e instanceof \SoapFault) {
            if (isset($e->faultcode)) {
                $str .= ' faultcode: ' . $e->faultcode;
            }

            if (isset($e->faultactor)) {
                $str .= ' faultactor: ' . $e->faultactor;
            }

            if (isset($e->detail)) {
                $str .= ' detail: ' . $e->detail;
            }
        }
        $str .= '): ' . $e->getMessage() . ' at ' . $e->getFile() . ':' . $e->getLine() . ')';

        if ($this->includeStacktraces) {
            $str .= "\n[stacktrace]\n" . $e->getTraceAsString() . "\n";
        }

        return $str;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
