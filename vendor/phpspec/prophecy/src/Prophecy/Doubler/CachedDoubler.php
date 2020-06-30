<?php

/*
 * This file is part of the Prophecy.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *     Marcello Duarte <marcello.duarte@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Prophecy\Doubler;

use ReflectionClass;

/**
 * Cached class doubler.
 * Prevents mirroring/creation of the same structure twice.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class CachedDoubler extends Doubler
{
<<<<<<< HEAD
    private static $classes = array();
=======
    private $classes = array();

    /**
     * {@inheritdoc}
     */
    public function registerClassPatch(ClassPatch\ClassPatchInterface $patch)
    {
        $this->classes[] = array();

        parent::registerClassPatch($patch);
    }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * {@inheritdoc}
     */
    protected function createDoubleClass(ReflectionClass $class = null, array $interfaces)
    {
        $classId = $this->generateClassId($class, $interfaces);
<<<<<<< HEAD
        if (isset(self::$classes[$classId])) {
            return self::$classes[$classId];
        }

        return self::$classes[$classId] = parent::createDoubleClass($class, $interfaces);
=======
        if (isset($this->classes[$classId])) {
            return $this->classes[$classId];
        }

        return $this->classes[$classId] = parent::createDoubleClass($class, $interfaces);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * @param ReflectionClass   $class
     * @param ReflectionClass[] $interfaces
     *
     * @return string
     */
    private function generateClassId(ReflectionClass $class = null, array $interfaces)
    {
        $parts = array();
        if (null !== $class) {
            $parts[] = $class->getName();
        }
        foreach ($interfaces as $interface) {
            $parts[] = $interface->getName();
        }
<<<<<<< HEAD
        foreach ($this->getClassPatches() as $patch) {
            $parts[] = get_class($patch);
        }
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        sort($parts);

        return md5(implode('', $parts));
    }
<<<<<<< HEAD

    public function resetCache()
    {
        self::$classes = array();
    }
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
