--TEST--
phpunit --group balanceIsInitiallyZero BankAccountTest ../../_files/BankAccountTest.php
--FILE--
<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = '--testdox';
$_SERVER['argv'][3] = '--group';
$_SERVER['argv'][4] = '3502';
$_SERVER['argv'][5] = 'NumericGroupAnnotationTest';
$_SERVER['argv'][6] = __DIR__ . '/../_files/NumericGroupAnnotationTest.php';

require __DIR__ . '/../bootstrap.php';
PHPUnit\TextUI\Command::main();
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

<<<<<<< HEAD
NumericGroupAnnotation
=======
Numeric Group Annotation
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 ✔ Empty test for @ticket numeric annotation values
 ✔ Empty test for @group numeric annotation values

Time: %s, Memory: %s

OK (2 tests, 2 assertions)
