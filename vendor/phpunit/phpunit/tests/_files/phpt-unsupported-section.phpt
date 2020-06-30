--TEST--
PHPT runner handles unsupported --SECTION-- gracefully
--FILE--
<<<<<<< HEAD
<?php
echo "Hello world";
?>
=======
<?php declare(strict_types=1);
echo "Hello world";
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
--GET--
Gerste, Hopfen und Wasser
--EXPECT--
Hello world
