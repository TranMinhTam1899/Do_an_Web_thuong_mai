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
class MethodCallbackByReference
{
<<<<<<< HEAD
    public function bar(&$a, &$b, $c)
=======
    public function bar(&$a, &$b, $c): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        Legacy::bar($a, $b, $c);
    }

<<<<<<< HEAD
    public function callback(&$a, &$b, $c)
=======
    public function callback(&$a, &$b, $c): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $b = 1;
    }
}
