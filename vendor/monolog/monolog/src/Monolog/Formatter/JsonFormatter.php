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
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use Monolog\Utils;
use Throwable;

/**
 * Encodes whatever record data is passed to it as json
 *
 * This can be useful to log to databases or remote APIs
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
class JsonFormatter extends NormalizerFormatter
{
<<<<<<< HEAD
    const BATCH_MODE_JSON = 1;
    const BATCH_MODE_NEWLINES = 2;
=======
    public const BATCH_MODE_JSON = 1;
    public const BATCH_MODE_NEWLINES = 2;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    protected $batchMode;
    protected $appendNewline;

    /**
     * @var bool
     */
    protected $includeStacktraces = false;

<<<<<<< HEAD
    /**
     * @param int $batchMode
     * @param bool $appendNewline
     */
    public function __construct($batchMode = self::BATCH_MODE_JSON, $appendNewline = true)
=======
    public function __construct(int $batchMode = self::BATCH_MODE_JSON, bool $appendNewline = true)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->batchMode = $batchMode;
        $this->appendNewline = $appendNewline;
    }

    /**
     * The batch mode option configures the formatting style for
     * multiple records. By default, multiple records will be
     * formatted as a JSON-encoded array. However, for
     * compatibility with some API endpoints, alternative styles
     * are available.
<<<<<<< HEAD
     *
     * @return int
     */
    public function getBatchMode()
=======
     */
    public function getBatchMode(): int
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->batchMode;
    }

    /**
     * True if newlines are appended to every formatted record
<<<<<<< HEAD
     *
     * @return bool
     */
    public function isAppendingNewlines()
=======
     */
    public function isAppendingNewlines(): bool
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->appendNewline;
    }

    /**
     * {@inheritdoc}
<<<<<<< HEAD
     */
    public function format(array $record)
    {
        return $this->toJson($this->normalize($record), true) . ($this->appendNewline ? "\n" : '');
=======
     *
     * @suppress PhanTypeComparisonToArray
     */
    public function format(array $record): string
    {
        $normalized = $this->normalize($record);
        if (isset($normalized['context']) && $normalized['context'] === []) {
            $normalized['context'] = new \stdClass;
        }
        if (isset($normalized['extra']) && $normalized['extra'] === []) {
            $normalized['extra'] = new \stdClass;
        }

        return $this->toJson($normalized, true) . ($this->appendNewline ? "\n" : '');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function formatBatch(array $records)
=======
    public function formatBatch(array $records): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        switch ($this->batchMode) {
            case static::BATCH_MODE_NEWLINES:
                return $this->formatBatchNewlines($records);

            case static::BATCH_MODE_JSON:
            default:
                return $this->formatBatchJson($records);
        }
    }

<<<<<<< HEAD
    /**
     * @param bool $include
     */
    public function includeStacktraces($include = true)
=======
    public function includeStacktraces(bool $include = true)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->includeStacktraces = $include;
    }

    /**
     * Return a JSON-encoded array of records.
<<<<<<< HEAD
     *
     * @param  array  $records
     * @return string
     */
    protected function formatBatchJson(array $records)
=======
     */
    protected function formatBatchJson(array $records): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->toJson($this->normalize($records), true);
    }

    /**
     * Use new lines to separate records instead of a
     * JSON-encoded array.
<<<<<<< HEAD
     *
     * @param  array  $records
     * @return string
     */
    protected function formatBatchNewlines(array $records)
=======
     */
    protected function formatBatchNewlines(array $records): string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $instance = $this;

        $oldNewline = $this->appendNewline;
        $this->appendNewline = false;
        array_walk($records, function (&$value, $key) use ($instance) {
            $value = $instance->format($value);
        });
        $this->appendNewline = $oldNewline;

        return implode("\n", $records);
    }

    /**
     * Normalizes given $data.
     *
     * @param mixed $data
     *
     * @return mixed
     */
<<<<<<< HEAD
    protected function normalize($data, $depth = 0)
    {
        if ($depth > 9) {
            return 'Over 9 levels deep, aborting normalization';
        }

        if (is_array($data)) {
            $normalized = array();

            $count = 1;
            foreach ($data as $key => $value) {
                if ($count++ > 1000) {
                    $normalized['...'] = 'Over 1000 items ('.count($data).' total), aborting normalization';
                    break;
                }

                $normalized[$key] = $this->normalize($value, $depth+1);
=======
    protected function normalize($data, int $depth = 0)
    {
        if ($depth > $this->maxNormalizeDepth) {
            return 'Over '.$this->maxNormalizeDepth.' levels deep, aborting normalization';
        }

        if (is_array($data) || $data instanceof \Traversable) {
            $normalized = [];

            $count = 1;
            foreach ($data as $key => $value) {
                if ($count++ > $this->maxNormalizeItemCount) {
                    $normalized['...'] = 'Over '.$this->maxNormalizeItemCount.' items ('.count($data).' total), aborting normalization';
                    break;
                }

                $normalized[$key] = $this->normalize($value, $depth + 1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            }

            return $normalized;
        }

<<<<<<< HEAD
        if ($data instanceof Exception || $data instanceof Throwable) {
            return $this->normalizeException($data);
        }

        if (is_resource($data)) {
            return parent::normalize($data);
=======
        if ($data instanceof Throwable) {
            return $this->normalizeException($data, $depth);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return $data;
    }

    /**
     * Normalizes given exception with or without its own stack trace based on
     * `includeStacktraces` property.
<<<<<<< HEAD
     *
     * @param Exception|Throwable $e
     *
     * @return array
     */
    protected function normalizeException($e)
    {
        // TODO 2.0 only check for Throwable
        if (!$e instanceof Exception && !$e instanceof Throwable) {
            throw new \InvalidArgumentException('Exception/Throwable expected, got '.gettype($e).' / '.Utils::getClass($e));
        }

        $data = array(
            'class' => Utils::getClass($e),
            'message' => $e->getMessage(),
            'code' => (int) $e->getCode(),
            'file' => $e->getFile().':'.$e->getLine(),
        );

        if ($this->includeStacktraces) {
            $trace = $e->getTrace();
            foreach ($trace as $frame) {
                if (isset($frame['file'])) {
                    $data['trace'][] = $frame['file'].':'.$frame['line'];
                }
            }
        }

        if ($previous = $e->getPrevious()) {
            $data['previous'] = $this->normalizeException($previous);
=======
     */
    protected function normalizeException(Throwable $e, int $depth = 0): array
    {
        $data = parent::normalizeException($e, $depth);
        if (!$this->includeStacktraces) {
            unset($data['trace']);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return $data;
    }
}
