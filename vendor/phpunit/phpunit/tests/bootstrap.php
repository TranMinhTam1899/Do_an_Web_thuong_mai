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
if (!\defined('TEST_FILES_PATH')) {
    \define('TEST_FILES_PATH', __DIR__ . \DIRECTORY_SEPARATOR . '_files' . \DIRECTORY_SEPARATOR);
}

<<<<<<< HEAD
\ini_set('precision', 14);
\ini_set('serialize_precision', 14);
=======
\ini_set('precision', '14');
\ini_set('serialize_precision', '14');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

require_once __DIR__ . '/../vendor/autoload.php';
