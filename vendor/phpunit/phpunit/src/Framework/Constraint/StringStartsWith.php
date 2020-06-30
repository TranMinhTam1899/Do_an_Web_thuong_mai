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
use PHPUnit\Util\InvalidArgumentHelper;
=======
use PHPUnit\Framework\InvalidArgumentException;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * Constraint that asserts that the string it is evaluated for begins with a
 * given prefix.
 */
<<<<<<< HEAD
class StringStartsWith extends Constraint
=======
final class StringStartsWith extends Constraint
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @var string
     */
    private $prefix;

    public function __construct(string $prefix)
    {
<<<<<<< HEAD
        parent::__construct();

        if (\strlen($prefix) === 0) {
            throw InvalidArgumentHelper::factory(1, 'non-empty string');
=======
        if (\strlen($prefix) === 0) {
            throw InvalidArgumentException::create(1, 'non-empty string');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        $this->prefix = $prefix;
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'starts with "' . $this->prefix . '"';
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
<<<<<<< HEAD
        return \strpos($other, $this->prefix) === 0;
=======
        return \strpos((string) $other, $this->prefix) === 0;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
