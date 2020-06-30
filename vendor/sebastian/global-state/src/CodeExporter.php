<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/*
 * This file is part of sebastian/global-state.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD

declare(strict_types=1);

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
namespace SebastianBergmann\GlobalState;

/**
 * Exports parts of a Snapshot as PHP code.
 */
<<<<<<< HEAD
class CodeExporter
=======
final class CodeExporter
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    public function constants(Snapshot $snapshot): string
    {
        $result = '';

        foreach ($snapshot->constants() as $name => $value) {
            $result .= \sprintf(
                'if (!defined(\'%s\')) define(\'%s\', %s);' . "\n",
                $name,
                $name,
                $this->exportVariable($value)
            );
        }

        return $result;
    }

    public function globalVariables(Snapshot $snapshot): string
    {
<<<<<<< HEAD
        $result = '$GLOBALS = [];' . PHP_EOL;

        foreach ($snapshot->globalVariables() as $name => $value) {
            $result .= \sprintf(
                '$GLOBALS[%s] = %s;' . PHP_EOL,
=======
        $result = '$GLOBALS = [];' . \PHP_EOL;

        foreach ($snapshot->globalVariables() as $name => $value) {
            $result .= \sprintf(
                '$GLOBALS[%s] = %s;' . \PHP_EOL,
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                $this->exportVariable($name),
                $this->exportVariable($value)
            );
        }

        return $result;
    }

    public function iniSettings(Snapshot $snapshot): string
    {
        $result = '';

        foreach ($snapshot->iniSettings() as $key => $value) {
            $result .= \sprintf(
                '@ini_set(%s, %s);' . "\n",
                $this->exportVariable($key),
                $this->exportVariable($value)
            );
        }

        return $result;
    }

    private function exportVariable($variable): string
    {
<<<<<<< HEAD
        if (\is_scalar($variable) || \is_null($variable) ||
=======
        if (\is_scalar($variable) || null === $variable ||
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            (\is_array($variable) && $this->arrayOnlyContainsScalars($variable))) {
            return \var_export($variable, true);
        }

        return 'unserialize(' . \var_export(\serialize($variable), true) . ')';
    }

    private function arrayOnlyContainsScalars(array $array): bool
    {
        $result = true;

        foreach ($array as $element) {
            if (\is_array($element)) {
<<<<<<< HEAD
                $result = self::arrayOnlyContainsScalars($element);
            } elseif (!\is_scalar($element) && !\is_null($element)) {
=======
                $result = $this->arrayOnlyContainsScalars($element);
            } elseif (!\is_scalar($element) && null !== $element) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                $result = false;
            }

            if ($result === false) {
                break;
            }
        }

        return $result;
    }
}
