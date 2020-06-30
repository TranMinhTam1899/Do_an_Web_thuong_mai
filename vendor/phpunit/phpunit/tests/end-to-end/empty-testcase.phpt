--TEST--
phpunit EmptyTestCaseTest ../../_files/EmptyTestCaseTest.php
--FILE--
<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = 'EmptyTestCaseTest';
$_SERVER['argv'][3] = __DIR__ . '/../_files/EmptyTestCaseTest.php';

require __DIR__ . '/../bootstrap.php';
PHPUnit\TextUI\Command::main();
<<<<<<< HEAD
?>
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

W                                                                   1 / 1 (100%)

Time: %s, Memory: %s

There was 1 warning:

1) Warning
No tests found in class "EmptyTestCaseTest".

WARNINGS!
Tests: 1, Assertions: 0, Warnings: 1.
