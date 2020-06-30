<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\CssSelector\XPath\Extension;

use Symfony\Component\CssSelector\Exception\ExpressionErrorException;
use Symfony\Component\CssSelector\XPath\XPathExpr;

/**
 * XPath expression translator pseudo-class extension.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class PseudoClassExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getPseudoClassTranslators(): array
=======
    public function getPseudoClassTranslators()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return [
            'root' => [$this, 'translateRoot'],
            'first-child' => [$this, 'translateFirstChild'],
            'last-child' => [$this, 'translateLastChild'],
            'first-of-type' => [$this, 'translateFirstOfType'],
            'last-of-type' => [$this, 'translateLastOfType'],
            'only-child' => [$this, 'translateOnlyChild'],
            'only-of-type' => [$this, 'translateOnlyOfType'],
            'empty' => [$this, 'translateEmpty'],
        ];
    }

<<<<<<< HEAD
    public function translateRoot(XPathExpr $xpath): XPathExpr
=======
    /**
     * @return XPathExpr
     */
    public function translateRoot(XPathExpr $xpath)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $xpath->addCondition('not(parent::*)');
    }

<<<<<<< HEAD
    public function translateFirstChild(XPathExpr $xpath): XPathExpr
=======
    /**
     * @return XPathExpr
     */
    public function translateFirstChild(XPathExpr $xpath)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $xpath
            ->addStarPrefix()
            ->addNameTest()
            ->addCondition('position() = 1');
    }

<<<<<<< HEAD
    public function translateLastChild(XPathExpr $xpath): XPathExpr
=======
    /**
     * @return XPathExpr
     */
    public function translateLastChild(XPathExpr $xpath)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $xpath
            ->addStarPrefix()
            ->addNameTest()
            ->addCondition('position() = last()');
    }

    /**
<<<<<<< HEAD
     * @throws ExpressionErrorException
     */
    public function translateFirstOfType(XPathExpr $xpath): XPathExpr
=======
     * @return XPathExpr
     *
     * @throws ExpressionErrorException
     */
    public function translateFirstOfType(XPathExpr $xpath)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if ('*' === $xpath->getElement()) {
            throw new ExpressionErrorException('"*:first-of-type" is not implemented.');
        }

        return $xpath
            ->addStarPrefix()
            ->addCondition('position() = 1');
    }

    /**
<<<<<<< HEAD
     * @throws ExpressionErrorException
     */
    public function translateLastOfType(XPathExpr $xpath): XPathExpr
=======
     * @return XPathExpr
     *
     * @throws ExpressionErrorException
     */
    public function translateLastOfType(XPathExpr $xpath)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if ('*' === $xpath->getElement()) {
            throw new ExpressionErrorException('"*:last-of-type" is not implemented.');
        }

        return $xpath
            ->addStarPrefix()
            ->addCondition('position() = last()');
    }

<<<<<<< HEAD
    public function translateOnlyChild(XPathExpr $xpath): XPathExpr
=======
    /**
     * @return XPathExpr
     */
    public function translateOnlyChild(XPathExpr $xpath)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $xpath
            ->addStarPrefix()
            ->addNameTest()
            ->addCondition('last() = 1');
    }

<<<<<<< HEAD
    public function translateOnlyOfType(XPathExpr $xpath): XPathExpr
    {
        $element = $xpath->getElement();

        return $xpath->addCondition(sprintf('count(preceding-sibling::%s)=0 and count(following-sibling::%s)=0', $element, $element));
    }

    public function translateEmpty(XPathExpr $xpath): XPathExpr
=======
    /**
     * @return XPathExpr
     *
     * @throws ExpressionErrorException
     */
    public function translateOnlyOfType(XPathExpr $xpath)
    {
        $element = $xpath->getElement();

        if ('*' === $element) {
            throw new ExpressionErrorException('"*:only-of-type" is not implemented.');
        }

        return $xpath->addCondition(sprintf('count(preceding-sibling::%s)=0 and count(following-sibling::%s)=0', $element, $element));
    }

    /**
     * @return XPathExpr
     */
    public function translateEmpty(XPathExpr $xpath)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $xpath->addCondition('not(*) and not(string-length())');
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getName(): string
=======
    public function getName()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return 'pseudo-class';
    }
}
