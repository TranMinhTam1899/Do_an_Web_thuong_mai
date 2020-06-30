--TEST--
PHPT runner supports STDIN section
--STDIN--
Hello World
--FILE--
<<<<<<< HEAD
<?php
$input = \file_get_contents('php://stdin');
print $input;
?>
=======
<?php declare(strict_types=1);
$input = \file_get_contents('php://stdin');
print $input;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
--EXPECT--
Hello World
