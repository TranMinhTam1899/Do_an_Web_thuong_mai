--TEST--
https://github.com/sebastianbergmann/phpunit/issues/1437
--FILE--
<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = 'Issue1437Test';
$_SERVER['argv'][3] = __DIR__ . '/1437/Issue1437Test.php';

require __DIR__ . '/../../../bootstrap.php';
PHPUnit\TextUI\Command::main();
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

F                                                                   1 / 1 (100%)

Time: %s, Memory: %s

There was 1 failure:

1) Issue1437Test::testFailure
Failed asserting that false is true.

%sIssue1437Test.php:%i

FAILURES!
Tests: 1, Assertions: 1, Failures: 1.
