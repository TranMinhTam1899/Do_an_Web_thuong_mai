--TEST--
phpunit AssertionExampleTest ../../_files/AssertionExampleTest.php
--SKIPIF--
<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
if (PHP_MAJOR_VERSION < 7) {
    print 'skip: PHP 7 is required' . PHP_EOL;
}

if (ini_get('zend.assertions') != 1) {
    print 'skip: zend.assertions=1 is required' . PHP_EOL;
}

if (ini_get('assert.exception') != 1) {
    print 'skip: assert.exception=1 is required' . PHP_EOL;
}
--FILE--
<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = 'AssertionExampleTest';
$_SERVER['argv'][3] = __DIR__ . '/../_files/AssertionExampleTest.php';

require __DIR__ . '/../bootstrap.php';
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

1) AssertionExampleTest::testOne
assert(false) in %sAssertionExample.php:%d

FAILURES!
Tests: 1, Assertions: 1, Failures: 1.
