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
namespace PHPUnit\Framework\Constraint;

/**
 * Constraint that asserts that a string is valid JSON.
 */
<<<<<<< HEAD
class IsJson extends Constraint
=======
final class IsJson extends Constraint
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'is valid JSON';
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
        if ($other === '') {
            return false;
        }

        \json_decode($other);

        if (\json_last_error()) {
            return false;
        }

        return true;
    }

    /**
     * Returns the description of the failure
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
     *
     * @param mixed $other evaluated value or object
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    protected function failureDescription($other): string
    {
        if ($other === '') {
            return 'an empty string is valid JSON';
        }

        \json_decode($other);
        $error = JsonMatchesErrorMessageProvider::determineJsonError(
<<<<<<< HEAD
            \json_last_error()
=======
            (string) \json_last_error()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );

        return \sprintf(
            '%s is valid JSON (%s)',
<<<<<<< HEAD
            $this->exporter->shortenedExport($other),
=======
            $this->exporter()->shortenedExport($other),
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $error
        );
    }
}
