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

namespace Monolog\Handler\FingersCrossed;

use Monolog\Logger;

/**
 * Error level based activation strategy.
 *
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
class ErrorLevelActivationStrategy implements ActivationStrategyInterface
{
<<<<<<< HEAD
    private $actionLevel;

=======
    /**
     * @var int
     */
    private $actionLevel;

    /**
     * @param int|string $actionLevel Level or name or value
     */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function __construct($actionLevel)
    {
        $this->actionLevel = Logger::toMonologLevel($actionLevel);
    }

<<<<<<< HEAD
    public function isHandlerActivated(array $record)
=======
    public function isHandlerActivated(array $record): bool
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $record['level'] >= $this->actionLevel;
    }
}
