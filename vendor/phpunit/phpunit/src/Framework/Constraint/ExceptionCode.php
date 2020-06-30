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
class ExceptionCode extends Constraint
=======
final class ExceptionCode extends Constraint
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @var int|string
     */
    private $expectedCode;

    /**
     * @param int|string $expected
     */
    public function __construct($expected)
    {
<<<<<<< HEAD
        parent::__construct();

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $this->expectedCode = $expected;
    }

    public function toString(): string
    {
        return 'exception code is ';
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param \Throwable $other
     */
    protected function matches($other): bool
    {
        return (string) $other->getCode() === (string) $this->expectedCode;
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
        return \sprintf(
            '%s is equal to expected exception code %s',
<<<<<<< HEAD
            $this->exporter->export($other->getCode()),
            $this->exporter->export($this->expectedCode)
=======
            $this->exporter()->export($other->getCode()),
            $this->exporter()->export($this->expectedCode)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );
    }
}
