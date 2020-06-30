<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/*
 * This file is part of the php-code-coverage package.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeCoverage;

/**
 * Utility methods.
 */
final class Util
{
    /**
     * @return float|int|string
     */
    public static function percent(float $a, float $b, bool $asString = false, bool $fixedWidth = false)
    {
        if ($asString && $b == 0) {
            return '';
        }

        $percent = 100;

        if ($b > 0) {
            $percent = ($a / $b) * 100;
        }

        if ($asString) {
            $format = $fixedWidth ? '%6.2F%%' : '%01.2F%%';

            return \sprintf($format, $percent);
        }

        return $percent;
    }
}
