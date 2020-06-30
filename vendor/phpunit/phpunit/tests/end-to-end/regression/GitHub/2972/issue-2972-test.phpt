--TEST--
Just a sample test for issue 2972, does not actually test anything
--FILE--
<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
print "Hello world\n";
?>
===DONE===
--EXPECT--
Hello world
===DONE===
