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

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\ExpectationFailedException;

<<<<<<< HEAD
class Attribute extends Composite
=======
/**
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 * @codeCoverageIgnore
 */
final class Attribute extends Composite
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @var string
     */
    private $attributeName;

    public function __construct(Constraint $constraint, string $attributeName)
    {
        parent::__construct($constraint);

        $this->attributeName = $attributeName;
    }

    /**
     * Evaluates the constraint for parameter $other
     *
     * If $returnResult is set to false (the default), an exception is thrown
     * in case of a failure. null is returned otherwise.
     *
     * If $returnResult is true, the result of the evaluation is returned as
     * a boolean value instead: true in case of success, false in case of a
     * failure.
     *
<<<<<<< HEAD
     * @param mixed  $other        value or object to evaluate
     * @param string $description  Additional information about the test
     * @param bool   $returnResult Whether to return a result or throw an exception
     *
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * @throws ExpectationFailedException
     * @throws \PHPUnit\Framework\Exception
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
<<<<<<< HEAD
    public function evaluate($other, $description = '', $returnResult = false)
=======
    public function evaluate($other, string $description = '', bool $returnResult = false)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return parent::evaluate(
            Assert::readAttribute(
                $other,
                $this->attributeName
            ),
            $description,
            $returnResult
        );
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'attribute "' . $this->attributeName . '" ' . $this->innerConstraint()->toString();
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
        return $this->toString();
    }
}
