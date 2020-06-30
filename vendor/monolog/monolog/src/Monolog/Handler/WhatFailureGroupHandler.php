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

namespace Monolog\Handler;

/**
 * Forwards records to multiple handlers suppressing failures of each handler
 * and continuing through to give every handler a chance to succeed.
 *
 * @author Craig D'Amelio <craig@damelio.ca>
 */
class WhatFailureGroupHandler extends GroupHandler
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function handle(array $record)
    {
        if ($this->processors) {
            foreach ($this->processors as $processor) {
                $record = call_user_func($processor, $record);
            }
=======
    public function handle(array $record): bool
    {
        if ($this->processors) {
            $record = $this->processRecord($record);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        foreach ($this->handlers as $handler) {
            try {
                $handler->handle($record);
<<<<<<< HEAD
            } catch (\Exception $e) {
                // What failure?
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            } catch (\Throwable $e) {
                // What failure?
            }
        }

        return false === $this->bubble;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function handleBatch(array $records)
=======
    public function handleBatch(array $records): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if ($this->processors) {
            $processed = array();
            foreach ($records as $record) {
<<<<<<< HEAD
                foreach ($this->processors as $processor) {
                    $record = call_user_func($processor, $record);
                }
                $processed[] = $record;
=======
                $processed[] = $this->processRecord($record);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            }
            $records = $processed;
        }

        foreach ($this->handlers as $handler) {
            try {
                $handler->handleBatch($records);
<<<<<<< HEAD
            } catch (\Exception $e) {
                // What failure?
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            } catch (\Throwable $e) {
                // What failure?
            }
        }
    }
}
