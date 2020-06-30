--TEST--
GH-433: expectOutputString not completely working as expected
--FILE--
<<<<<<< HEAD
<?php

=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = 'Issue433Test';
$_SERVER['argv'][3] = __DIR__ . '/433/Issue433Test.php';

require __DIR__ . '/../../../bootstrap.php';
PHPUnit\TextUI\Command::main();
<<<<<<< HEAD
?>
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

..F                                                                 3 / 3 (100%)

Time: %s, Memory: %s

There was 1 failure:

1) Issue433Test::testNotMatchingOutput
Failed asserting that two strings are equal.
--- Expected
+++ Actual
@@ @@
-'foo'
+'bar'

FAILURES!
Tests: 3, Assertions: 3, Failures: 1.
