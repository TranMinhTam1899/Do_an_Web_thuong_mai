--TEST--
#2448: Weird error when trying to run `Test` from `Test.php` but `Test.php` does not exist
--FILE--
<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = 'Test';

require __DIR__ . '/../../../bootstrap.php';
PHPUnit\TextUI\Command::main(false);

@unlink(__DIR__ . '/2448/.phpunit.result.cache');
--EXPECTF--
Cannot open file "Test.php".
