<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 *
 * @internal
 */
final class SessionBagProxy implements SessionBagInterface
{
    private $bag;
    private $data;
    private $usageIndex;

<<<<<<< HEAD
    public function __construct(SessionBagInterface $bag, array &$data, ?int &$usageIndex)
=======
    public function __construct(SessionBagInterface $bag, array &$data, &$usageIndex)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->bag = $bag;
        $this->data = &$data;
        $this->usageIndex = &$usageIndex;
    }

<<<<<<< HEAD
    public function getBag(): SessionBagInterface
=======
    /**
     * @return SessionBagInterface
     */
    public function getBag()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        ++$this->usageIndex;

        return $this->bag;
    }

<<<<<<< HEAD
    public function isEmpty(): bool
=======
    /**
     * @return bool
     */
    public function isEmpty()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!isset($this->data[$this->bag->getStorageKey()])) {
            return true;
        }
        ++$this->usageIndex;

        return empty($this->data[$this->bag->getStorageKey()]);
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
        return $this->bag->getName();
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function initialize(array &$array): void
=======
    public function initialize(array &$array)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        ++$this->usageIndex;
        $this->data[$this->bag->getStorageKey()] = &$array;

        $this->bag->initialize($array);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getStorageKey(): string
=======
    public function getStorageKey()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->bag->getStorageKey();
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        return $this->bag->clear();
    }
}
