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
namespace PHPUnit\Runner\Filter;

use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\WarningTestCase;
use PHPUnit\Util\RegularExpression;
use RecursiveFilterIterator;
use RecursiveIterator;

<<<<<<< HEAD
class NameFilterIterator extends RecursiveFilterIterator
=======
/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class NameFilterIterator extends RecursiveFilterIterator
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @var string
     */
<<<<<<< HEAD
    protected $filter;
=======
    private $filter;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * @var int
     */
<<<<<<< HEAD
    protected $filterMin;
=======
    private $filterMin;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * @var int
     */
<<<<<<< HEAD
    protected $filterMax;
=======
    private $filterMax;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * @throws \Exception
     */
    public function __construct(RecursiveIterator $iterator, string $filter)
    {
        parent::__construct($iterator);

        $this->setFilter($filter);
    }

<<<<<<< HEAD
=======
    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function accept(): bool
    {
        $test = $this->getInnerIterator()->current();

        if ($test instanceof TestSuite) {
            return true;
        }

        $tmp = \PHPUnit\Util\Test::describe($test);

        if ($test instanceof WarningTestCase) {
            $name = $test->getMessage();
<<<<<<< HEAD
        } else {
            if ($tmp[0] !== '') {
                $name = \implode('::', $tmp);
            } else {
                $name = $tmp[1];
            }
=======
        } elseif ($tmp[0] !== '') {
            $name = \implode('::', $tmp);
        } else {
            $name = $tmp[1];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        $accepted = @\preg_match($this->filter, $name, $matches);

        if ($accepted && isset($this->filterMax)) {
            $set      = \end($matches);
            $accepted = $set >= $this->filterMin && $set <= $this->filterMax;
        }

        return (bool) $accepted;
    }

    /**
     * @throws \Exception
     */
<<<<<<< HEAD
    protected function setFilter(string $filter): void
=======
    private function setFilter(string $filter): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (RegularExpression::safeMatch($filter, '') === false) {
            // Handles:
            //  * testAssertEqualsSucceeds#4
            //  * testAssertEqualsSucceeds#4-8
            if (\preg_match('/^(.*?)#(\d+)(?:-(\d+))?$/', $filter, $matches)) {
                if (isset($matches[3]) && $matches[2] < $matches[3]) {
                    $filter = \sprintf(
                        '%s.*with data set #(\d+)$',
                        $matches[1]
                    );

                    $this->filterMin = $matches[2];
                    $this->filterMax = $matches[3];
                } else {
                    $filter = \sprintf(
                        '%s.*with data set #%s$',
                        $matches[1],
                        $matches[2]
                    );
                }
            } // Handles:
            //  * testDetermineJsonError@JSON_ERROR_NONE
            //  * testDetermineJsonError@JSON.*
            elseif (\preg_match('/^(.*?)@(.+)$/', $filter, $matches)) {
                $filter = \sprintf(
                    '%s.*with data set "%s"$',
                    $matches[1],
                    $matches[2]
                );
            }

            // Escape delimiters in regular expression. Do NOT use preg_quote,
            // to keep magic characters.
            $filter = \sprintf('/%s/i', \str_replace(
                '/',
                '\\/',
                $filter
            ));
        }

        $this->filter = $filter;
    }
}
