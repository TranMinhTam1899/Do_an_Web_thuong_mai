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
namespace PHPUnit\Runner;

use ReflectionClass;

/**
 * An interface to define how a test suite should be loaded.
 */
interface TestSuiteLoader
{
    public function load(string $suiteClassName, string $suiteClassFile = ''): ReflectionClass;

    public function reload(ReflectionClass $aClass): ReflectionClass;
}
