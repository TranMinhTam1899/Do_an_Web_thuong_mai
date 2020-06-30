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
=======
use Monolog\Formatter\FormatterInterface;
use Monolog\Formatter\HtmlFormatter;

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/**
 * Base class for all mail handlers
 *
 * @author Gyula Sallai
 */
abstract class MailHandler extends AbstractProcessingHandler
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function handleBatch(array $records)
    {
        $messages = array();
=======
    public function handleBatch(array $records): void
    {
        $messages = [];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        foreach ($records as $record) {
            if ($record['level'] < $this->level) {
                continue;
            }
            $messages[] = $this->processRecord($record);
        }

        if (!empty($messages)) {
            $this->send((string) $this->getFormatter()->formatBatch($messages), $messages);
        }
    }

    /**
     * Send a mail with the given content
     *
     * @param string $content formatted email body to be sent
     * @param array  $records the array of log records that formed this content
     */
<<<<<<< HEAD
    abstract protected function send($content, array $records);
=======
    abstract protected function send(string $content, array $records): void;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function write(array $record)
    {
        $this->send((string) $record['formatted'], array($record));
    }

    protected function getHighestRecord(array $records)
=======
    protected function write(array $record): void
    {
        $this->send((string) $record['formatted'], [$record]);
    }

    protected function getHighestRecord(array $records): array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $highestRecord = null;
        foreach ($records as $record) {
            if ($highestRecord === null || $highestRecord['level'] < $record['level']) {
                $highestRecord = $record;
            }
        }

        return $highestRecord;
    }
<<<<<<< HEAD
=======

    protected function isHtmlBody(string $body): bool
    {
        return substr($body, 0, 1) === '<';
    }

    /**
     * Gets the default formatter.
     *
     * @return FormatterInterface
     */
    protected function getDefaultFormatter(): FormatterInterface
    {
        return new HtmlFormatter();
    }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
