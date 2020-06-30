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

/**
 * An optional interface to allow labelling Monolog processors.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
interface ProcessorInterface
{
    /**
<<<<<<< HEAD
     * @return array The processed records
     */
    public function __invoke(array $records);
=======
     * @return array The processed record
     */
    public function __invoke(array $record);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
