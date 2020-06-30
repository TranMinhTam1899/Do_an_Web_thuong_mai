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

/**
 * @requires PHP 5.3
 * @requires PHPUnit 4.0
 * @requires OS Linux
 * @requires function testFuncClass
 * @requires extension testExtClass
 */
class RequirementsClassDocBlockTest
{
    /**
     * @requires PHP 5.4
     * @requires PHPUnit 3.7
     * @requires OS WINNT
     * @requires function testFuncMethod
     * @requires extension testExtMethod
     */
    public function testMethod(): void
    {
    }
}
