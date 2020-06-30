--TEST--
PHPT runner supports ARGS section
--ARGS--
help
--FILE--
<<<<<<< HEAD
<?php
if ($argc > 0 && $argv[1] == 'help') {
    print 'Help';
}
?>
=======
<?php declare(strict_types=1);
if ($argc > 0 && $argv[1] == 'help') {
    print 'Help';
}
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
--EXPECT--
Help
