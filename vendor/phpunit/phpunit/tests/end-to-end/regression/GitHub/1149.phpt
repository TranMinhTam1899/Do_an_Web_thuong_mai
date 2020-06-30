--TEST--
GH-1149: Test swallows output buffer when run in a separate process
--FILE--
<<<<<<< HEAD
<?php

=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = 'Issue1149Test';
$_SERVER['argv'][3] = __DIR__ . '/1149/Issue1149Test.php';

require __DIR__ . '/../../../bootstrap.php';
PHPUnit\TextUI\Command::main();
<<<<<<< HEAD
?>
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

.1.                                                                  2 / 2 (100%)2

Time: %s, Memory: %s

OK (2 tests, 2 assertions)
