--TEST--
phpunit NothingTest ../_files/DoesNotPerformAssertionsButPerformingAssertionsTest.php
--FILE--
<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = 'DoesNotPerformAssertionsButPerformingAssertionsTest';
$_SERVER['argv'][3] = __DIR__ . '/../_files/DoesNotPerformAssertionsButPerformingAssertionsTest.php';

require __DIR__ . '/../bootstrap.php';
PHPUnit\TextUI\Command::main();
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

R                                                                   1 / 1 (100%)

Time: %s, Memory: %s

There was 1 risky test:

1) DoesNotPerformAssertionsButPerformingAssertionsTest::testFalseAndTrueAreStillFine
This test is annotated with "@doesNotPerformAssertions" but performed 2 assertions

OK, but incomplete, skipped, or risky tests!
Tests: 1, Assertions: 2, Risky: 1.
