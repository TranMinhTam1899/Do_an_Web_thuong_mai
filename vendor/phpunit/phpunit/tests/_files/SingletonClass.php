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
class SingletonClass
{
<<<<<<< HEAD
    public static function getInstance()
=======
    public static function getInstance(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
    }

    protected function __construct()
    {
    }

<<<<<<< HEAD
    private function __sleep()
    {
    }

    private function __wakeup()
=======
    private function __sleep(): void
    {
    }

    private function __wakeup(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
    }

    private function __clone()
    {
    }

<<<<<<< HEAD
    public function doSomething()
=======
    public function doSomething(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
    }
}
