--TEST--
https://github.com/sebastianbergmann/phpunit/issues/3093
--FILE--
<<<<<<< HEAD
<?php
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = '--reverse-order';
$_SERVER['argv'][3] = '--resolve-dependencies';
$_SERVER['argv'][4] = __DIR__ . '/Issue3093Test.php';
=======
<?php declare(strict_types=1);
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = '--order-by=reverse';
$_SERVER['argv'][3] = __DIR__ . '/Issue3093Test.php';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

require __DIR__ . '/../../../../bootstrap.php';
PHPUnit\TextUI\Command::main();
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

..                                                                  2 / 2 (100%)

Time: %s, Memory: %s

OK (2 tests, 2 assertions)
