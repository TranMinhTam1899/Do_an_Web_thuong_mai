<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/*
 * This file is part of sebastian/global-state.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD

declare(strict_types=1);

namespace SebastianBergmann\GlobalState;

use ReflectionClass;

/**
 * A blacklist for global state elements that should not be snapshotted.
 */
class Blacklist
=======
namespace SebastianBergmann\GlobalState;

/**
 * A blacklist for global state elements that should not be snapshotted.
 */
final class Blacklist
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @var array
     */
    private $globalVariables = [];

    /**
     * @var string[]
     */
    private $classes = [];

    /**
     * @var string[]
     */
    private $classNamePrefixes = [];

    /**
     * @var string[]
     */
    private $parentClasses = [];

    /**
     * @var string[]
     */
    private $interfaces = [];

    /**
     * @var array
     */
    private $staticAttributes = [];

<<<<<<< HEAD
    public function addGlobalVariable(string $variableName)
=======
    public function addGlobalVariable(string $variableName): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->globalVariables[$variableName] = true;
    }

<<<<<<< HEAD
    public function addClass(string $className)
=======
    public function addClass(string $className): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->classes[] = $className;
    }

<<<<<<< HEAD
    public function addSubclassesOf(string $className)
=======
    public function addSubclassesOf(string $className): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->parentClasses[] = $className;
    }

<<<<<<< HEAD
    public function addImplementorsOf(string $interfaceName)
=======
    public function addImplementorsOf(string $interfaceName): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->interfaces[] = $interfaceName;
    }

<<<<<<< HEAD
    public function addClassNamePrefix(string $classNamePrefix)
=======
    public function addClassNamePrefix(string $classNamePrefix): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->classNamePrefixes[] = $classNamePrefix;
    }

<<<<<<< HEAD
    public function addStaticAttribute(string $className, string $attributeName)
=======
    public function addStaticAttribute(string $className, string $attributeName): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!isset($this->staticAttributes[$className])) {
            $this->staticAttributes[$className] = [];
        }

        $this->staticAttributes[$className][$attributeName] = true;
    }

    public function isGlobalVariableBlacklisted(string $variableName): bool
    {
        return isset($this->globalVariables[$variableName]);
    }

    public function isStaticAttributeBlacklisted(string $className, string $attributeName): bool
    {
        if (\in_array($className, $this->classes)) {
            return true;
        }

        foreach ($this->classNamePrefixes as $prefix) {
            if (\strpos($className, $prefix) === 0) {
                return true;
            }
        }

<<<<<<< HEAD
        $class = new ReflectionClass($className);
=======
        $class = new \ReflectionClass($className);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        foreach ($this->parentClasses as $type) {
            if ($class->isSubclassOf($type)) {
                return true;
            }
        }

        foreach ($this->interfaces as $type) {
            if ($class->implementsInterface($type)) {
                return true;
            }
        }

        if (isset($this->staticAttributes[$className][$attributeName])) {
            return true;
        }

        return false;
    }
}
