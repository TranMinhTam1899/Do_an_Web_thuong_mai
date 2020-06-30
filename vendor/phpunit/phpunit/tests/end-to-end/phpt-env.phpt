--TEST--
PHPT runner should support ENV section
--ENV--
FOO=bar
--FILE--
<<<<<<< HEAD
<?php
if (isset($_SERVER['FOO'])) {
    \var_dump($_SERVER['FOO']);
}
?>
=======
<?php declare(strict_types=1);
if (isset($_SERVER['FOO'])) {
    \var_dump($_SERVER['FOO']);
}
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
--EXPECTF_EXTERNAL--
_files/phpt-env.expected.txt
