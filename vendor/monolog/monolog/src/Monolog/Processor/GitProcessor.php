<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Processor;

use Monolog\Logger;

/**
 * Injects Git branch and Git commit SHA in all records
 *
 * @author Nick Otter
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
class GitProcessor implements ProcessorInterface
{
    private $level;
    private static $cache;

<<<<<<< HEAD
=======
    /**
     * @param string|int $level The minimum logging level at which this Processor will be triggered
     */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function __construct($level = Logger::DEBUG)
    {
        $this->level = Logger::toMonologLevel($level);
    }

<<<<<<< HEAD
    /**
     * @param  array $record
     * @return array
     */
    public function __invoke(array $record)
=======
    public function __invoke(array $record): array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        // return if the level is not high enough
        if ($record['level'] < $this->level) {
            return $record;
        }

        $record['extra']['git'] = self::getGitInfo();

        return $record;
    }

<<<<<<< HEAD
    private static function getGitInfo()
=======
    private static function getGitInfo(): array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (self::$cache) {
            return self::$cache;
        }

        $branches = `git branch -v --no-abbrev`;
<<<<<<< HEAD
        if ($branches && preg_match('{^\* (.+?)\s+([a-f0-9]{40})(?:\s|$)}m', $branches, $matches)) {
            return self::$cache = array(
                'branch' => $matches[1],
                'commit' => $matches[2],
            );
        }

        return self::$cache = array();
=======
        if (preg_match('{^\* (.+?)\s+([a-f0-9]{40})(?:\s|$)}m', $branches, $matches)) {
            return self::$cache = [
                'branch' => $matches[1],
                'commit' => $matches[2],
            ];
        }

        return self::$cache = [];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
