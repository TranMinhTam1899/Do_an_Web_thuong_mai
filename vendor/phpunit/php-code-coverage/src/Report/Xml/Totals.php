<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/*
 * This file is part of the php-code-coverage package.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeCoverage\Report\Xml;

use SebastianBergmann\CodeCoverage\Util;

final class Totals
{
    /**
     * @var \DOMNode
     */
    private $container;

    /**
     * @var \DOMElement
     */
    private $linesNode;

    /**
     * @var \DOMElement
     */
    private $methodsNode;

    /**
     * @var \DOMElement
     */
    private $functionsNode;

    /**
     * @var \DOMElement
     */
    private $classesNode;

    /**
     * @var \DOMElement
     */
    private $traitsNode;

    public function __construct(\DOMElement $container)
    {
        $this->container = $container;
        $dom             = $container->ownerDocument;

        $this->linesNode = $dom->createElementNS(
            'https://schema.phpunit.de/coverage/1.0',
            'lines'
        );

        $this->methodsNode = $dom->createElementNS(
            'https://schema.phpunit.de/coverage/1.0',
            'methods'
        );

        $this->functionsNode = $dom->createElementNS(
            'https://schema.phpunit.de/coverage/1.0',
            'functions'
        );

        $this->classesNode = $dom->createElementNS(
            'https://schema.phpunit.de/coverage/1.0',
            'classes'
        );

        $this->traitsNode = $dom->createElementNS(
            'https://schema.phpunit.de/coverage/1.0',
            'traits'
        );

        $container->appendChild($this->linesNode);
        $container->appendChild($this->methodsNode);
        $container->appendChild($this->functionsNode);
        $container->appendChild($this->classesNode);
        $container->appendChild($this->traitsNode);
    }

    public function getContainer(): \DOMNode
    {
        return $this->container;
    }

    public function setNumLines(int $loc, int $cloc, int $ncloc, int $executable, int $executed): void
    {
<<<<<<< HEAD
        $this->linesNode->setAttribute('total', $loc);
        $this->linesNode->setAttribute('comments', $cloc);
        $this->linesNode->setAttribute('code', $ncloc);
        $this->linesNode->setAttribute('executable', $executable);
        $this->linesNode->setAttribute('executed', $executed);
        $this->linesNode->setAttribute(
            'percent',
            $executable === 0 ? 0 : \sprintf('%01.2F', Util::percent($executed, $executable))
=======
        $this->linesNode->setAttribute('total', (string) $loc);
        $this->linesNode->setAttribute('comments', (string) $cloc);
        $this->linesNode->setAttribute('code', (string) $ncloc);
        $this->linesNode->setAttribute('executable', (string) $executable);
        $this->linesNode->setAttribute('executed', (string) $executed);
        $this->linesNode->setAttribute(
            'percent',
            $executable === 0 ? '0' : \sprintf('%01.2F', Util::percent($executed, $executable))
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );
    }

    public function setNumClasses(int $count, int $tested): void
    {
<<<<<<< HEAD
        $this->classesNode->setAttribute('count', $count);
        $this->classesNode->setAttribute('tested', $tested);
        $this->classesNode->setAttribute(
            'percent',
            $count === 0 ? 0 : \sprintf('%01.2F', Util::percent($tested, $count))
=======
        $this->classesNode->setAttribute('count', (string) $count);
        $this->classesNode->setAttribute('tested', (string) $tested);
        $this->classesNode->setAttribute(
            'percent',
            $count === 0 ? '0' : \sprintf('%01.2F', Util::percent($tested, $count))
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );
    }

    public function setNumTraits(int $count, int $tested): void
    {
<<<<<<< HEAD
        $this->traitsNode->setAttribute('count', $count);
        $this->traitsNode->setAttribute('tested', $tested);
        $this->traitsNode->setAttribute(
            'percent',
            $count === 0 ? 0 : \sprintf('%01.2F', Util::percent($tested, $count))
=======
        $this->traitsNode->setAttribute('count', (string) $count);
        $this->traitsNode->setAttribute('tested', (string) $tested);
        $this->traitsNode->setAttribute(
            'percent',
            $count === 0 ? '0' : \sprintf('%01.2F', Util::percent($tested, $count))
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );
    }

    public function setNumMethods(int $count, int $tested): void
    {
<<<<<<< HEAD
        $this->methodsNode->setAttribute('count', $count);
        $this->methodsNode->setAttribute('tested', $tested);
        $this->methodsNode->setAttribute(
            'percent',
            $count === 0 ? 0 : \sprintf('%01.2F', Util::percent($tested, $count))
=======
        $this->methodsNode->setAttribute('count', (string) $count);
        $this->methodsNode->setAttribute('tested', (string) $tested);
        $this->methodsNode->setAttribute(
            'percent',
            $count === 0 ? '0' : \sprintf('%01.2F', Util::percent($tested, $count))
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );
    }

    public function setNumFunctions(int $count, int $tested): void
    {
<<<<<<< HEAD
        $this->functionsNode->setAttribute('count', $count);
        $this->functionsNode->setAttribute('tested', $tested);
        $this->functionsNode->setAttribute(
            'percent',
            $count === 0 ? 0 : \sprintf('%01.2F', Util::percent($tested, $count))
=======
        $this->functionsNode->setAttribute('count', (string) $count);
        $this->functionsNode->setAttribute('tested', (string) $tested);
        $this->functionsNode->setAttribute(
            'percent',
            $count === 0 ? '0' : \sprintf('%01.2F', Util::percent($tested, $count))
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        );
    }
}
