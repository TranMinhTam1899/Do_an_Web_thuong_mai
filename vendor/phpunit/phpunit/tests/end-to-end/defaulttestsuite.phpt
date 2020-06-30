--TEST--
phpunit --testdox --configuration=__DIR__.'/../_files/configuration.defaulttestsuite.xml'
--FILE--
<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
$_SERVER['argv'][1] = '--testdox';
$_SERVER['argv'][2] = '--configuration';
$_SERVER['argv'][3] = __DIR__.'/../_files/configuration.defaulttestsuite.xml';

require __DIR__ . '/../bootstrap.php';
PHPUnit\TextUI\Command::main();
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

<<<<<<< HEAD
DummyBar
=======
Dummy Bar
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 ✔ Bar equals bar

Time: %s, Memory: %s

OK (1 test, 1 assertion)
