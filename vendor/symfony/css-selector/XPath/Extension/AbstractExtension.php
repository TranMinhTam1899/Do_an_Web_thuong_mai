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

/**
 * XPath expression translator abstract extension.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
abstract class AbstractExtension implements ExtensionInterface
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getNodeTranslators(): array
=======
    public function getNodeTranslators()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getCombinationTranslators(): array
=======
    public function getCombinationTranslators()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getFunctionTranslators(): array
=======
    public function getFunctionTranslators()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getPseudoClassTranslators(): array
=======
    public function getPseudoClassTranslators()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getAttributeMatchingTranslators(): array
=======
    public function getAttributeMatchingTranslators()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return [];
    }
}
