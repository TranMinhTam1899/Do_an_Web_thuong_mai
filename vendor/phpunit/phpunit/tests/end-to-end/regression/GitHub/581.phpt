--TEST--
GH-581: PHPUnit_Util_Type::export adds extra newlines in Windows
--FILE--
<<<<<<< HEAD
<?php

=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = 'Issue581Test';
$_SERVER['argv'][3] = __DIR__ . '/581/Issue581Test.php';

require __DIR__ . '/../../../bootstrap.php';
PHPUnit\TextUI\Command::main();
<<<<<<< HEAD
?>
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

F                                                                   1 / 1 (100%)

Time: %s, Memory: %s

There was 1 failure:

1) Issue581Test::testExportingObjectsDoesNotBreakWindowsLineFeeds
Failed asserting that two objects are equal.
--- Expected
+++ Actual
@@ @@
     1 => 2
     2 => 'Test\r\n'
     3 => 4
-    4 => 5
+    4 => 1
     5 => 6
     6 => 7
     7 => 8
 )

%s:%i

FAILURES!
Tests: 1, Assertions: 1, Failures: 1.
