<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
$globalString                          = 'Hello';
$globalIntTruthy                       = 1;
$globalIntFalsey                       = 0;
$globalFloat                           = 1.123;
$globalBoolTrue                        = true;
$globalBoolFalse                       = false;
$globalNull                            = null;
$globalArray                           = ['foo'];
$globalNestedArray                     = [['foo']];
$globalObject                          = (object) ['foo'=> 'bar'];
$globalObjectWithBackSlashString       = (object) ['foo'=> 'back\\slash'];
$globalObjectWithDoubleBackSlashString = (object) ['foo'=> 'back\\\\slash'];
