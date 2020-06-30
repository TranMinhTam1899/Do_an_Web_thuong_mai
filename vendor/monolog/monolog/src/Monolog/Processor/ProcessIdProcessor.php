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
 * Adds value of getmypid into records
 *
 * @author Andreas Hörnicke
 */
class ProcessIdProcessor implements ProcessorInterface
{
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
        $record['extra']['process_id'] = getmypid();

        return $record;
    }
}
