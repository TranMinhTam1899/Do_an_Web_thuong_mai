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

<<<<<<< HEAD
class ExceptionMessage extends Constraint
=======
final class ExceptionMessage extends Constraint
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @var string
     */
    private $expectedMessage;

    public function __construct(string $expected)
    {
<<<<<<< HEAD
        parent::__construct();

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $this->expectedMessage = $expected;
    }

    public function toString(): string
    {
        if ($this->expectedMessage === '') {
            return 'exception message is empty';
        }

        return 'exception message contains ';
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param \Throwable $other
     */
    protected function matches($other): bool
    {
        if ($this->expectedMessage === '') {
            return $other->getMessage() === '';
        }

<<<<<<< HEAD
        return \strpos($other->getMessage(), $this->expectedMessage) !== false;
=======
        return \strpos((string) $other->getMessage(), $this->expectedMessage) !== false;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Returns the description of the failure
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
     *
     * @param mixed $other evaluated value or object
     */
    protected function failureDescription($other): string
    {
        if ($this->expectedMessage === '') {
            return \sprintf(
                "exception message is empty but is '%s'",
                $other->getMessage()
            );
        }

        return \sprintf(
            "exception message '%s' contains '%s'",
            $other->getMessage(),
            $this->expectedMessage
        );
    }
}
