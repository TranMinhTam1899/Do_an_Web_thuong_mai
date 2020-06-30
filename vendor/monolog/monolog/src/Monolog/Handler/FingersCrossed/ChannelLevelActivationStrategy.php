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
 * Channel and Error level based monolog activation strategy. Allows to trigger activation
 * based on level per channel. e.g. trigger activation on level 'ERROR' by default, except
 * for records of the 'sql' channel; those should trigger activation on level 'WARN'.
 *
 * Example:
 *
 * <code>
 *   $activationStrategy = new ChannelLevelActivationStrategy(
 *       Logger::CRITICAL,
 *       array(
 *           'request' => Logger::ALERT,
 *           'sensitive' => Logger::ERROR,
 *       )
 *   );
 *   $handler = new FingersCrossedHandler(new StreamHandler('php://stderr'), $activationStrategy);
 * </code>
 *
 * @author Mike Meessen <netmikey@gmail.com>
 */
class ChannelLevelActivationStrategy implements ActivationStrategyInterface
{
<<<<<<< HEAD
    private $defaultActionLevel;
    private $channelToActionLevel;

    /**
     * @param int   $defaultActionLevel   The default action level to be used if the record's category doesn't match any
     * @param array $channelToActionLevel An array that maps channel names to action levels.
     */
    public function __construct($defaultActionLevel, $channelToActionLevel = array())
=======
    /**
     * @var int
     */
    private $defaultActionLevel;

    /**
     * @var array
     */
    private $channelToActionLevel;

    /**
     * @param int|string $defaultActionLevel   The default action level to be used if the record's category doesn't match any
     * @param array      $channelToActionLevel An array that maps channel names to action levels.
     */
    public function __construct($defaultActionLevel, array $channelToActionLevel = [])
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->defaultActionLevel = Logger::toMonologLevel($defaultActionLevel);
        $this->channelToActionLevel = array_map('Monolog\Logger::toMonologLevel', $channelToActionLevel);
    }

<<<<<<< HEAD
    public function isHandlerActivated(array $record)
=======
    public function isHandlerActivated(array $record): bool
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (isset($this->channelToActionLevel[$record['channel']])) {
            return $record['level'] >= $this->channelToActionLevel[$record['channel']];
        }

        return $record['level'] >= $this->defaultActionLevel;
    }
}
