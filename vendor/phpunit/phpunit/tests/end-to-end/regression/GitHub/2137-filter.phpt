--TEST--
#2137: Error message for invalid dataprovider
--FILE--
<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = 'Issue2137Test';
$_SERVER['argv'][3] = __DIR__ . '/2137/Issue2137Test.php';
$_SERVER['argv'][4] = '--filter';
$_SERVER['argv'][5] = 'BrandService';

require __DIR__ . '/../../../bootstrap.php';
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
The data provider specified for Issue2137Test::testBrandService is invalid.
Data set #0 is invalid.

WARNINGS!
Tests: 1, Assertions: 0, Warnings: 1.
