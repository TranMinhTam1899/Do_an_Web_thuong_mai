<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/*
 * This file is part of the Monolog package.
 *
<<<<<<< HEAD
 * (c) Jonathan A. Schweder <jonathanschweder@gmail.com>
=======
 * (c) Jordi Boggiano <j.boggiano@seld.be>
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Processor;

use Monolog\Logger;

/**
 * Injects Hg branch and Hg revision number in all records
 *
 * @author Jonathan A. Schweder <jonathanschweder@gmail.com>
 */
class MercurialProcessor implements ProcessorInterface
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

        $record['extra']['hg'] = self::getMercurialInfo();

        return $record;
    }

<<<<<<< HEAD
    private static function getMercurialInfo()
=======
    private static function getMercurialInfo(): array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (self::$cache) {
            return self::$cache;
        }

        $result = explode(' ', trim(`hg id -nb`));
<<<<<<< HEAD
        if (count($result) >= 3) {
            return self::$cache = array(
                'branch' => $result[1],
                'revision' => $result[2],
            );
        }

        return self::$cache = array();
=======

        if (count($result) >= 3) {
            return self::$cache = [
                'branch' => $result[1],
                'revision' => $result[2],
            ];
        }

        return self::$cache = [];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
