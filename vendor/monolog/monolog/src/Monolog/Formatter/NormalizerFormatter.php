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

<<<<<<< HEAD
use Exception;
use Monolog\Utils;
=======
use Monolog\DateTimeImmutable;
use Monolog\Utils;
use Throwable;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * Normalizes incoming records to remove objects/resources so it's easier to dump to various targets
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
class NormalizerFormatter implements FormatterInterface
{
<<<<<<< HEAD
    const SIMPLE_DATE = "Y-m-d H:i:s";

    protected $dateFormat;

    /**
     * @param string $dateFormat The format of the timestamp: one supported by DateTime::format
     */
    public function __construct($dateFormat = null)
    {
        $this->dateFormat = $dateFormat ?: static::SIMPLE_DATE;
=======
    public const SIMPLE_DATE = "Y-m-d\TH:i:sP";

    protected $dateFormat;
    protected $maxNormalizeDepth = 9;
    protected $maxNormalizeItemCount = 1000;

    private $jsonEncodeOptions = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRESERVE_ZERO_FRACTION;

    /**
     * @param string|null $dateFormat The format of the timestamp: one supported by DateTime::format
     */
    public function __construct(?string $dateFormat = null)
    {
        $this->dateFormat = null === $dateFormat ? static::SIMPLE_DATE : $dateFormat;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        if (!function_exists('json_encode')) {
            throw new \RuntimeException('PHP\'s json extension is required to use Monolog\'s NormalizerFormatter');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function format(array $record)
    {
        return $this->normalize($record);
    }

    /**
     * {@inheritdoc}
     */
    public function formatBatch(array $records)
    {
        foreach ($records as $key => $record) {
            $records[$key] = $this->format($record);
        }

        return $records;
    }

<<<<<<< HEAD
    protected function normalize($data, $depth = 0)
    {
        if ($depth > 9) {
            return 'Over 9 levels deep, aborting normalization';
=======
    /**
     * The maximum number of normalization levels to go through
     */
    public function getMaxNormalizeDepth(): int
    {
        return $this->maxNormalizeDepth;
    }

    public function setMaxNormalizeDepth(int $maxNormalizeDepth): self
    {
        $this->maxNormalizeDepth = $maxNormalizeDepth;

        return $this;
    }

    /**
     * The maximum number of items to normalize per level
     */
    public function getMaxNormalizeItemCount(): int
    {
        return $this->maxNormalizeItemCount;
    }

    public function setMaxNormalizeItemCount(int $maxNormalizeItemCount): self
    {
        $this->maxNormalizeItemCount = $maxNormalizeItemCount;

        return $this;
    }

    /**
     * Enables `json_encode` pretty print.
     */
    public function setJsonPrettyPrint(bool $enable): self
    {
        if ($enable) {
            $this->jsonEncodeOptions |= JSON_PRETTY_PRINT;
        } else {
            $this->jsonEncodeOptions ^= JSON_PRETTY_PRINT;
        }

        return $this;
    }

    /**
     * @param  mixed                      $data
     * @return int|bool|string|null|array
     */
    protected function normalize($data, int $depth = 0)
    {
        if ($depth > $this->maxNormalizeDepth) {
            return 'Over ' . $this->maxNormalizeDepth . ' levels deep, aborting normalization';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        if (null === $data || is_scalar($data)) {
            if (is_float($data)) {
                if (is_infinite($data)) {
                    return ($data > 0 ? '' : '-') . 'INF';
                }
                if (is_nan($data)) {
                    return 'NaN';
                }
            }

            return $data;
        }

        if (is_array($data)) {
<<<<<<< HEAD
            $normalized = array();

            $count = 1;
            foreach ($data as $key => $value) {
                if ($count++ > 1000) {
                    $normalized['...'] = 'Over 1000 items ('.count($data).' total), aborting normalization';
                    break;
                }

                $normalized[$key] = $this->normalize($value, $depth+1);
=======
            $normalized = [];

            $count = 1;
            foreach ($data as $key => $value) {
                if ($count++ > $this->maxNormalizeItemCount) {
                    $normalized['...'] = 'Over ' . $this->maxNormalizeItemCount . ' items ('.count($data).' total), aborting normalization';
                    break;
                }

                $normalized[$key] = $this->normalize($value, $depth + 1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            }

            return $normalized;
        }

<<<<<<< HEAD
        if ($data instanceof \DateTime) {
            return $data->format($this->dateFormat);
        }

        if (is_object($data)) {
            // TODO 2.0 only check for Throwable
            if ($data instanceof Exception || (PHP_VERSION_ID > 70000 && $data instanceof \Throwable)) {
                return $this->normalizeException($data);
            }

            // non-serializable objects that implement __toString stringified
            if (method_exists($data, '__toString') && !$data instanceof \JsonSerializable) {
                $value = $data->__toString();
            } else {
                // the rest is json-serialized in some way
                $value = $this->toJson($data, true);
            }

            return sprintf("[object] (%s: %s)", Utils::getClass($data), $value);
        }

        if (is_resource($data)) {
            return sprintf('[resource] (%s)', get_resource_type($data));
=======
        if ($data instanceof \DateTimeInterface) {
            return $this->formatDate($data);
        }

        if (is_object($data)) {
            if ($data instanceof Throwable) {
                return $this->normalizeException($data, $depth);
            }

            if ($data instanceof \JsonSerializable) {
                $value = $data->jsonSerialize();
            } elseif (method_exists($data, '__toString')) {
                $value = $data->__toString();
            } else {
                // the rest is normalized by json encoding and decoding it
                $encoded = $this->toJson($data, true);
                if ($encoded === false) {
                    $value = 'JSON_ERROR';
                } else {
                    $value = json_decode($encoded, true);
                }
            }

            return [Utils::getClass($data) => $value];
        }

        if (is_resource($data)) {
            return sprintf('[resource(%s)]', get_resource_type($data));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return '[unknown('.gettype($data).')]';
    }

<<<<<<< HEAD
    protected function normalizeException($e)
    {
        // TODO 2.0 only check for Throwable
        if (!$e instanceof Exception && !$e instanceof \Throwable) {
            throw new \InvalidArgumentException('Exception/Throwable expected, got '.gettype($e).' / '.Utils::getClass($e));
        }

        $data = array(
            'class' => Utils::getClass($e),
            'message' => $e->getMessage(),
            'code' => (int) $e->getCode(),
            'file' => $e->getFile().':'.$e->getLine(),
        );
=======
    /**
     * @return array
     */
    protected function normalizeException(Throwable $e, int $depth = 0)
    {
        if ($e instanceof \JsonSerializable) {
            return (array) $e->jsonSerialize();
        }

        $data = [
            'class' => Utils::getClass($e),
            'message' => $e->getMessage(),
            'code' => $e->getCode(),
            'file' => $e->getFile().':'.$e->getLine(),
        ];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        if ($e instanceof \SoapFault) {
            if (isset($e->faultcode)) {
                $data['faultcode'] = $e->faultcode;
            }

            if (isset($e->faultactor)) {
                $data['faultactor'] = $e->faultactor;
            }

            if (isset($e->detail)) {
<<<<<<< HEAD
                if  (is_string($e->detail)) {
                    $data['detail'] = $e->detail;
                } elseif (is_object($e->detail) || is_array($e->detail)) {
                    $data['detail'] = $this->toJson($e->detail, true);
                }
=======
                $data['detail'] = $e->detail;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            }
        }

        $trace = $e->getTrace();
        foreach ($trace as $frame) {
            if (isset($frame['file'])) {
                $data['trace'][] = $frame['file'].':'.$frame['line'];
            }
        }

        if ($previous = $e->getPrevious()) {
<<<<<<< HEAD
            $data['previous'] = $this->normalizeException($previous);
=======
            $data['previous'] = $this->normalizeException($previous, $depth + 1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return $data;
    }

    /**
     * Return the JSON representation of a value
     *
     * @param  mixed             $data
<<<<<<< HEAD
     * @param  bool              $ignoreErrors
     * @throws \RuntimeException if encoding fails and errors are not ignored
     * @return string
     */
    protected function toJson($data, $ignoreErrors = false)
    {
        return Utils::jsonEncode($data, null, $ignoreErrors);
=======
     * @throws \RuntimeException if encoding fails and errors are not ignored
     * @return string|bool
     */
    protected function toJson($data, bool $ignoreErrors = false)
    {
        // suppress json_encode errors since it's twitchy with some inputs
        if ($ignoreErrors) {
            return @$this->jsonEncode($data);
        }

        $json = $this->jsonEncode($data);

        if ($json === false) {
            $json = $this->handleJsonError(json_last_error(), $data);
        }

        return $json;
    }

    /**
     * @param  mixed       $data
     * @return string|bool JSON encoded data or false on failure
     */
    private function jsonEncode($data)
    {
        return json_encode($data, $this->jsonEncodeOptions);
    }

    /**
     * Handle a json_encode failure.
     *
     * If the failure is due to invalid string encoding, try to clean the
     * input and encode again. If the second encoding attempt fails, the
     * initial error is not encoding related or the input can't be cleaned then
     * raise a descriptive exception.
     *
     * @param  int               $code return code of json_last_error function
     * @param  mixed             $data data that was meant to be encoded
     * @throws \RuntimeException if failure can't be corrected
     * @return string            JSON encoded data after error correction
     */
    private function handleJsonError(int $code, $data): string
    {
        if ($code !== JSON_ERROR_UTF8) {
            $this->throwEncodeError($code, $data);
        }

        if (is_string($data)) {
            $this->detectAndCleanUtf8($data);
        } elseif (is_array($data)) {
            array_walk_recursive($data, [$this, 'detectAndCleanUtf8']);
        } else {
            $this->throwEncodeError($code, $data);
        }

        $json = $this->jsonEncode($data);

        if ($json === false) {
            $this->throwEncodeError(json_last_error(), $data);
        }

        return $json;
    }

    /**
     * Throws an exception according to a given code with a customized message
     *
     * @param  int               $code return code of json_last_error function
     * @param  mixed             $data data that was meant to be encoded
     * @throws \RuntimeException
     */
    private function throwEncodeError(int $code, $data)
    {
        switch ($code) {
            case JSON_ERROR_DEPTH:
                $msg = 'Maximum stack depth exceeded';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                $msg = 'Underflow or the modes mismatch';
                break;
            case JSON_ERROR_CTRL_CHAR:
                $msg = 'Unexpected control character found';
                break;
            case JSON_ERROR_UTF8:
                $msg = 'Malformed UTF-8 characters, possibly incorrectly encoded';
                break;
            default:
                $msg = 'Unknown error';
        }

        throw new \RuntimeException('JSON encoding failed: '.$msg.'. Encoding: '.var_export($data, true));
    }

    /**
     * Detect invalid UTF-8 string characters and convert to valid UTF-8.
     *
     * Valid UTF-8 input will be left unmodified, but strings containing
     * invalid UTF-8 codepoints will be reencoded as UTF-8 with an assumed
     * original encoding of ISO-8859-15. This conversion may result in
     * incorrect output if the actual encoding was not ISO-8859-15, but it
     * will be clean UTF-8 output and will not rely on expensive and fragile
     * detection algorithms.
     *
     * Function converts the input in place in the passed variable so that it
     * can be used as a callback for array_walk_recursive.
     *
     * @param mixed &$data Input to check and convert if needed
     * @private
     */
    public function detectAndCleanUtf8(&$data)
    {
        if (is_string($data) && !preg_match('//u', $data)) {
            $data = preg_replace_callback(
                '/[\x80-\xFF]+/',
                function ($m) {
                    return utf8_encode($m[0]);
                },
                $data
            );
            $data = str_replace(
                ['¤', '¦', '¨', '´', '¸', '¼', '½', '¾'],
                ['€', 'Š', 'š', 'Ž', 'ž', 'Œ', 'œ', 'Ÿ'],
                $data
            );
        }
    }

    protected function formatDate(\DateTimeInterface $date)
    {
        // in case the date format isn't custom then we defer to the custom DateTimeImmutable
        // formatting logic, which will pick the right format based on whether useMicroseconds is on
        if ($this->dateFormat === self::SIMPLE_DATE && $date instanceof DateTimeImmutable) {
            return (string) $date;
        }

        return $date->format($this->dateFormat);
    }

    protected function addJsonEncodeOption($option)
    {
        $this->jsonEncodeOptions |= $option;
    }

    protected function removeJsonEncodeOption($option)
    {
        $this->jsonEncodeOptions ^= $option;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
