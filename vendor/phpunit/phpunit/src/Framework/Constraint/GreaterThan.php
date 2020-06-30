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
 * Constraint that asserts that the value it is evaluated for is greater
 * than a given value.
 */
<<<<<<< HEAD
class GreaterThan extends Constraint
=======
final class GreaterThan extends Constraint
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @var float|int
     */
    private $value;

    /**
     * @param float|int $value
     */
    public function __construct($value)
    {
<<<<<<< HEAD
        parent::__construct();

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $this->value = $value;
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function toString(): string
    {
<<<<<<< HEAD
        return 'is greater than ' . $this->exporter->export($this->value);
=======
        return 'is greater than ' . $this->exporter()->export($this->value);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
        return $this->value < $other;
    }
}
