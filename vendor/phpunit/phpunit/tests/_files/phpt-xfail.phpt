--TEST--
PHPT runner supports XFAIL section
--FILE--
<<<<<<< HEAD
<?php
{syntaxError}
echo "Should not see this";
?>
=======
<?php declare(strict_types=1);
{syntaxError}
echo "Should not see this";
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
--XFAIL--
Syntax Error in PHPT is supposed to fail
--EXPECT--
Should not see this
