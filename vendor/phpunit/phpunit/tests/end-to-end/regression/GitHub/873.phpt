--TEST--
GH-873: PHPUnit suppresses exceptions thrown outside of test case function
--SKIPIF--
<<<<<<< HEAD
<?php
if (PHP_MAJOR_VERSION < 7) {
    print 'skip: PHP 7 is required';
}
?>
--FILE--
<?php
=======
<?php declare(strict_types=1);
if (PHP_MAJOR_VERSION < 7) {
    print 'skip: PHP 7 is required';
}
--FILE--
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = 'Issue873Test';
$_SERVER['argv'][3] = __DIR__ . '/873/Issue873Test.php';

require __DIR__ . '/../../../bootstrap.php';
PHPUnit\TextUI\Command::main();
<<<<<<< HEAD
?>
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
--EXPECTF--
%AException: PHPUnit suppresses exceptions thrown outside of test case function in %s:%i
Stack trace:
%a
