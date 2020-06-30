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

<<<<<<< HEAD
use Monolog\ResettableInterface;

/**
 * Base Handler class providing the Handler structure
=======
/**
 * Base Handler class providing the Handler structure, including processors and formatters
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 *
 * Classes extending it should (in most cases) only implement write($record)
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 * @author Christophe Coevoet <stof@notk.org>
 */
<<<<<<< HEAD
abstract class AbstractProcessingHandler extends AbstractHandler
{
    /**
     * {@inheritdoc}
     */
    public function handle(array $record)
=======
abstract class AbstractProcessingHandler extends AbstractHandler implements ProcessableHandlerInterface, FormattableHandlerInterface
{
    use ProcessableHandlerTrait;
    use FormattableHandlerTrait;

    /**
     * {@inheritdoc}
     */
    public function handle(array $record): bool
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!$this->isHandling($record)) {
            return false;
        }

<<<<<<< HEAD
        $record = $this->processRecord($record);
=======
        if ($this->processors) {
            $record = $this->processRecord($record);
        }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        $record['formatted'] = $this->getFormatter()->format($record);

        $this->write($record);

        return false === $this->bubble;
    }

    /**
     * Writes the record down to the log of the implementing handler
<<<<<<< HEAD
     *
     * @param  array $record
     * @return void
     */
    abstract protected function write(array $record);

    /**
     * Processes a record.
     *
     * @param  array $record
     * @return array
     */
    protected function processRecord(array $record)
    {
        if ($this->processors) {
            foreach ($this->processors as $processor) {
                $record = call_user_func($processor, $record);
            }
        }

        return $record;
=======
     */
    abstract protected function write(array $record): void;

    public function reset()
    {
        parent::reset();

        $this->resetProcessors();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
