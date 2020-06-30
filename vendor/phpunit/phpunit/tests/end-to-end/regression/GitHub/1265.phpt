--TEST--
GH-1265: Could not use "PHPUnit\Runner\StandardTestSuiteLoader" as loader
--FILE--
<<<<<<< HEAD
<?php

=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
$_SERVER['argv'][1] = '--configuration';
$_SERVER['argv'][2] = __DIR__ . '/1265/phpunit1265.xml';
$_SERVER['argv'][3] = 'Issue1265Test';
$_SERVER['argv'][4] = __DIR__ . '/1265/Issue1265Test.php';

require __DIR__ . '/../../../bootstrap.php';
PHPUnit\TextUI\Command::main();
<<<<<<< HEAD
?>
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: %s, Memory: %s

OK (1 test, 1 assertion)
