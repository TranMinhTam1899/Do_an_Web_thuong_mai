<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Runner;

<<<<<<< HEAD
interface AfterTestHook extends Hook
=======
interface AfterTestHook extends TestHook
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * This hook will fire after any test, regardless of the result.
     *
     * For more fine grained control, have a look at the other hooks
     * that extend PHPUnit\Runner\Hook.
     */
    public function executeAfterTest(string $test, float $time): void;
}
