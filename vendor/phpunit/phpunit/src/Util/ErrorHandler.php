<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util;

use PHPUnit\Framework\Error\Deprecated;
use PHPUnit\Framework\Error\Error;
use PHPUnit\Framework\Error\Notice;
use PHPUnit\Framework\Error\Warning;

/**
<<<<<<< HEAD
 * Error handler that converts PHP errors and warnings to exceptions.
 */
final class ErrorHandler
{
    private static $errorStack = [];

    /**
     * Returns the error stack.
     */
    public static function getErrorStack(): array
    {
        return self::$errorStack;
    }

    public static function handleError(int $errorNumber, string $errorString, string $errorFile, int $errorLine): bool
    {
=======
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class ErrorHandler
{
    /**
     * @var bool
     */
    private $convertDeprecationsToExceptions;

    /**
     * @var bool
     */
    private $convertErrorsToExceptions;

    /**
     * @var bool
     */
    private $convertNoticesToExceptions;

    /**
     * @var bool
     */
    private $convertWarningsToExceptions;

    /**
     * @var bool
     */
    private $registered = false;

    public static function invokeIgnoringWarnings(callable $callable)
    {
        \set_error_handler(
            static function ($errorNumber, $errorString) {
                if ($errorNumber === \E_WARNING) {
                    return;
                }

                return false;
            }
        );

        $result = $callable();

        \restore_error_handler();

        return $result;
    }

    public function __construct(bool $convertDeprecationsToExceptions, bool $convertErrorsToExceptions, bool $convertNoticesToExceptions, bool $convertWarningsToExceptions)
    {
        $this->convertDeprecationsToExceptions = $convertDeprecationsToExceptions;
        $this->convertErrorsToExceptions       = $convertErrorsToExceptions;
        $this->convertNoticesToExceptions      = $convertNoticesToExceptions;
        $this->convertWarningsToExceptions     = $convertWarningsToExceptions;
    }

    public function __invoke(int $errorNumber, string $errorString, string $errorFile, int $errorLine): bool
    {
        /*
         * Do not raise an exception when the error suppression operator (@) was used.
         *
         * @see https://github.com/sebastianbergmann/phpunit/issues/3739
         */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        if (!($errorNumber & \error_reporting())) {
            return false;
        }

<<<<<<< HEAD
        self::$errorStack[] = [$errorNumber, $errorString, $errorFile, $errorLine];

        $trace = \debug_backtrace();
        \array_shift($trace);

        foreach ($trace as $frame) {
            if ($frame['function'] === '__toString') {
                return false;
            }
        }

        if ($errorNumber === \E_NOTICE || $errorNumber === \E_USER_NOTICE || $errorNumber === \E_STRICT) {
            if (Notice::$enabled !== true) {
                return false;
            }

            $exception = Notice::class;
        } elseif ($errorNumber === \E_WARNING || $errorNumber === \E_USER_WARNING) {
            if (Warning::$enabled !== true) {
                return false;
            }

            $exception = Warning::class;
        } elseif ($errorNumber === \E_DEPRECATED || $errorNumber === \E_USER_DEPRECATED) {
            if (Deprecated::$enabled !== true) {
                return false;
            }

            $exception = Deprecated::class;
        } else {
            $exception = Error::class;
        }

        throw new $exception($errorString, $errorNumber, $errorFile, $errorLine);
    }

    /**
     * Registers an error handler and returns a function that will restore
     * the previous handler when invoked
     *
     * @param int $severity PHP predefined error constant
     *
     * @throws \Exception if event of specified severity is emitted
     */
    public static function handleErrorOnce($severity = \E_WARNING): callable
    {
        $terminator = function () {
            static $expired = false;

            if (!$expired) {
                $expired = true;

                return \restore_error_handler();
            }
        };

        \set_error_handler(
            function ($errorNumber, $errorString) use ($severity) {
                if ($errorNumber === $severity) {
                    return;
                }

                return false;
            }
        );

        return $terminator;
=======
        switch ($errorNumber) {
            case \E_NOTICE:
            case \E_USER_NOTICE:
            case \E_STRICT:
                if (!$this->convertNoticesToExceptions) {
                    return false;
                }

                throw new Notice($errorString, $errorNumber, $errorFile, $errorLine);

            case \E_WARNING:
            case \E_USER_WARNING:
                if (!$this->convertWarningsToExceptions) {
                    return false;
                }

                throw new Warning($errorString, $errorNumber, $errorFile, $errorLine);

            case \E_DEPRECATED:
            case \E_USER_DEPRECATED:
                if (!$this->convertDeprecationsToExceptions) {
                    return false;
                }

                throw new Deprecated($errorString, $errorNumber, $errorFile, $errorLine);

            default:
                if (!$this->convertErrorsToExceptions) {
                    return false;
                }

                throw new Error($errorString, $errorNumber, $errorFile, $errorLine);
        }
    }

    public function register(): void
    {
        if ($this->registered) {
            return;
        }

        $oldErrorHandler = \set_error_handler($this);

        if ($oldErrorHandler !== null) {
            \restore_error_handler();

            return;
        }

        $this->registered = true;
    }

    public function unregister(): void
    {
        if (!$this->registered) {
            return;
        }

        \restore_error_handler();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
