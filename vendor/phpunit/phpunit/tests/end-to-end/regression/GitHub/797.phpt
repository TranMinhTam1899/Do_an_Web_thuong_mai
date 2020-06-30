--TEST--
GH-797: Disabled $preserveGlobalState does not load bootstrap.php.
--FILE--
<<<<<<< HEAD
<?php

=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][]  = '--process-isolation';
$_SERVER['argv'][]  = '--bootstrap';
$_SERVER['argv'][]  = __DIR__ . '/797/bootstrap797.php';
$_SERVER['argv'][]  = __DIR__ . '/797/Issue797Test.php';

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
