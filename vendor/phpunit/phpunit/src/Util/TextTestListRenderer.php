<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Runner\PhptTestCase;

<<<<<<< HEAD
final class TextTestListRenderer
{
=======
/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class TextTestListRenderer
{
    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function render(TestSuite $suite): string
    {
        $buffer = 'Available test(s):' . \PHP_EOL;

        foreach (new \RecursiveIteratorIterator($suite->getIterator()) as $test) {
            if ($test instanceof TestCase) {
                $name = \sprintf(
                    '%s::%s',
                    \get_class($test),
                    \str_replace(' with data set ', '', $test->getName())
                );
            } elseif ($test instanceof PhptTestCase) {
                $name = $test->getName();
            } else {
                continue;
            }

            $buffer .= \sprintf(
                ' - %s' . \PHP_EOL,
                $name
            );
        }

        return $buffer;
    }
}
