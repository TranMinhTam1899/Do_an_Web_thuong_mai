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
 * Adds a tags array into record
 *
 * @author Martijn Riemers
 */
class TagProcessor implements ProcessorInterface
{
    private $tags;

<<<<<<< HEAD
    public function __construct(array $tags = array())
=======
    public function __construct(array $tags = [])
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->setTags($tags);
    }

<<<<<<< HEAD
    public function addTags(array $tags = array())
    {
        $this->tags = array_merge($this->tags, $tags);
    }

    public function setTags(array $tags = array())
    {
        $this->tags = $tags;
    }

    public function __invoke(array $record)
=======
    public function addTags(array $tags = []): self
    {
        $this->tags = array_merge($this->tags, $tags);

        return $this;
    }

    public function setTags(array $tags = []): self
    {
        $this->tags = $tags;

        return $this;
    }

    public function __invoke(array $record): array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $record['extra']['tags'] = $this->tags;

        return $record;
    }
}
