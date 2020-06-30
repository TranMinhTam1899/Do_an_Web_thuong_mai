<?php

namespace Illuminate\Foundation\Testing\Constraints;

<<<<<<< HEAD
use ReflectionClass;
use PHPUnit\Framework\Constraint\Constraint;
=======
use PHPUnit\Framework\Constraint\Constraint;
use ReflectionClass;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

class SeeInOrder extends Constraint
{
    /**
     * The string under validation.
     *
     * @var string
     */
    protected $content;

    /**
     * The last value that failed to pass validation.
     *
     * @var string
     */
    protected $failedValue;

    /**
     * Create a new constraint instance.
     *
     * @param  string  $content
     * @return void
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Determine if the rule passes validation.
     *
     * @param  array  $values
     * @return bool
     */
<<<<<<< HEAD
    public function matches($values): bool
=======
    public function matches($values) : bool
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $position = 0;

        foreach ($values as $value) {
            if (empty($value)) {
                continue;
            }

            $valuePosition = mb_strpos($this->content, $value, $position);

            if ($valuePosition === false || $valuePosition < $position) {
                $this->failedValue = $value;

                return false;
            }

            $position = $valuePosition + mb_strlen($value);
        }

        return true;
    }

    /**
     * Get the description of the failure.
     *
     * @param  array  $values
     * @return string
     */
<<<<<<< HEAD
    public function failureDescription($values): string
=======
    public function failureDescription($values) : string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return sprintf(
            'Failed asserting that \'%s\' contains "%s" in specified order.',
            $this->content,
            $this->failedValue
        );
    }

    /**
     * Get a string representation of the object.
     *
     * @return string
     */
<<<<<<< HEAD
    public function toString(): string
=======
    public function toString() : string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return (new ReflectionClass($this))->name;
    }
}
