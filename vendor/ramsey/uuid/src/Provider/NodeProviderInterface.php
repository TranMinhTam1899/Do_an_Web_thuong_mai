<?php
/**
 * This file is part of the ramsey/uuid library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license http://opensource.org/licenses/MIT MIT
 * @link https://benramsey.com/projects/ramsey-uuid/ Documentation
 * @link https://packagist.org/packages/ramsey/uuid Packagist
 * @link https://github.com/ramsey/uuid GitHub
 */

namespace Ramsey\Uuid\Provider;

<<<<<<< HEAD
use Exception;

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/**
 * NodeProviderInterface provides functionality to get the node ID (or host ID
 * in the form of the system's MAC address) from a specific type of node provider
 */
interface NodeProviderInterface
{
    /**
     * Returns the system node ID
     *
     * @return string System node ID as a hexadecimal string
<<<<<<< HEAD
     * @throws Exception if it was not possible to gather sufficient entropy
=======
     * @throws \Exception if it was not possible to gather sufficient entropy
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function getNode();
}
