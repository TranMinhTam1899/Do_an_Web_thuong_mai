--TEST--
GH-1169: PHPT runner doesn't look at STDERR.
--FILE--
<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
$stderr = fopen('php://stderr', 'w');
fwrite($stderr, 'PHPUnit must look at STDERR when running PHPT tests.');
--EXPECTF--
PHPUnit must look at STDERR when running PHPT tests.
