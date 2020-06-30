--TEST--
GH-3379: Dependent test of skipped test has status -1
--FILE--
<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
$_SERVER['argv'][1] = '--configuration';
$_SERVER['argv'][2] = __DIR__ . '/3379/';

require __DIR__ . '/../../../bootstrap.php';
PHPUnit\TextUI\Command::main();
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

Skipped test testOne, status: 1
SSkipped test testTwo, status: 1
S                                                                  2 / 2 (100%)

Time: %s, Memory: %s

OK, but incomplete, skipped, or risky tests!
Tests: 2, Assertions: 0, Skipped: 2.
