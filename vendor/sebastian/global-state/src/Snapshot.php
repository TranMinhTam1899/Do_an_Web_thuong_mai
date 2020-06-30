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
use Serializable;
=======
namespace SebastianBergmann\GlobalState;

use SebastianBergmann\ObjectReflector\ObjectReflector;
use SebastianBergmann\RecursionContext\Context;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * A snapshot of global state.
 */
class Snapshot
{
    /**
     * @var Blacklist
     */
    private $blacklist;

    /**
     * @var array
     */
    private $globalVariables = [];

    /**
     * @var array
     */
    private $superGlobalArrays = [];

    /**
     * @var array
     */
    private $superGlobalVariables = [];

    /**
     * @var array
     */
    private $staticAttributes = [];

    /**
     * @var array
     */
    private $iniSettings = [];

    /**
     * @var array
     */
    private $includedFiles = [];

    /**
     * @var array
     */
    private $constants = [];

    /**
     * @var array
     */
    private $functions = [];

    /**
     * @var array
     */
    private $interfaces = [];

    /**
     * @var array
     */
    private $classes = [];

    /**
     * @var array
     */
    private $traits = [];

    /**
     * Creates a snapshot of the current global state.
     */
    public function __construct(Blacklist $blacklist = null, bool $includeGlobalVariables = true, bool $includeStaticAttributes = true, bool $includeConstants = true, bool $includeFunctions = true, bool $includeClasses = true, bool $includeInterfaces = true, bool $includeTraits = true, bool $includeIniSettings = true, bool $includeIncludedFiles = true)
    {
        if ($blacklist === null) {
            $blacklist = new Blacklist;
        }

        $this->blacklist = $blacklist;

        if ($includeConstants) {
            $this->snapshotConstants();
        }

        if ($includeFunctions) {
            $this->snapshotFunctions();
        }

        if ($includeClasses || $includeStaticAttributes) {
            $this->snapshotClasses();
        }

        if ($includeInterfaces) {
            $this->snapshotInterfaces();
        }

        if ($includeGlobalVariables) {
            $this->setupSuperGlobalArrays();
            $this->snapshotGlobals();
        }

        if ($includeStaticAttributes) {
            $this->snapshotStaticAttributes();
        }

        if ($includeIniSettings) {
            $this->iniSettings = \ini_get_all(null, false);
        }

        if ($includeIncludedFiles) {
            $this->includedFiles = \get_included_files();
        }

        $this->traits = \get_declared_traits();
    }

    public function blacklist(): Blacklist
    {
        return $this->blacklist;
    }

    public function globalVariables(): array
    {
        return $this->globalVariables;
    }

    public function superGlobalVariables(): array
    {
        return $this->superGlobalVariables;
    }

    public function superGlobalArrays(): array
    {
        return $this->superGlobalArrays;
    }

    public function staticAttributes(): array
    {
        return $this->staticAttributes;
    }

    public function iniSettings(): array
    {
        return $this->iniSettings;
    }

    public function includedFiles(): array
    {
        return $this->includedFiles;
    }

    public function constants(): array
    {
        return $this->constants;
    }

    public function functions(): array
    {
        return $this->functions;
    }

    public function interfaces(): array
    {
        return $this->interfaces;
    }

    public function classes(): array
    {
        return $this->classes;
    }

    public function traits(): array
    {
        return $this->traits;
    }

    /**
     * Creates a snapshot user-defined constants.
     */
<<<<<<< HEAD
    private function snapshotConstants()
=======
    private function snapshotConstants(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $constants = \get_defined_constants(true);

        if (isset($constants['user'])) {
            $this->constants = $constants['user'];
        }
    }

    /**
     * Creates a snapshot user-defined functions.
     */
<<<<<<< HEAD
    private function snapshotFunctions()
=======
    private function snapshotFunctions(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $functions = \get_defined_functions();

        $this->functions = $functions['user'];
    }

    /**
     * Creates a snapshot user-defined classes.
     */
<<<<<<< HEAD
    private function snapshotClasses()
    {
        foreach (\array_reverse(\get_declared_classes()) as $className) {
            $class = new ReflectionClass($className);
=======
    private function snapshotClasses(): void
    {
        foreach (\array_reverse(\get_declared_classes()) as $className) {
            $class = new \ReflectionClass($className);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

            if (!$class->isUserDefined()) {
                break;
            }

            $this->classes[] = $className;
        }

        $this->classes = \array_reverse($this->classes);
    }

    /**
     * Creates a snapshot user-defined interfaces.
     */
<<<<<<< HEAD
    private function snapshotInterfaces()
    {
        foreach (\array_reverse(\get_declared_interfaces()) as $interfaceName) {
            $class = new ReflectionClass($interfaceName);
=======
    private function snapshotInterfaces(): void
    {
        foreach (\array_reverse(\get_declared_interfaces()) as $interfaceName) {
            $class = new \ReflectionClass($interfaceName);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

            if (!$class->isUserDefined()) {
                break;
            }

            $this->interfaces[] = $interfaceName;
        }

        $this->interfaces = \array_reverse($this->interfaces);
    }

    /**
     * Creates a snapshot of all global and super-global variables.
     */
<<<<<<< HEAD
    private function snapshotGlobals()
=======
    private function snapshotGlobals(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $superGlobalArrays = $this->superGlobalArrays();

        foreach ($superGlobalArrays as $superGlobalArray) {
            $this->snapshotSuperGlobalArray($superGlobalArray);
        }

        foreach (\array_keys($GLOBALS) as $key) {
<<<<<<< HEAD
            if ($key != 'GLOBALS' &&
                !\in_array($key, $superGlobalArrays) &&
                $this->canBeSerialized($GLOBALS[$key]) &&
                !$this->blacklist->isGlobalVariableBlacklisted($key)) {
=======
            if ($key !== 'GLOBALS' &&
                !\in_array($key, $superGlobalArrays) &&
                $this->canBeSerialized($GLOBALS[$key]) &&
                !$this->blacklist->isGlobalVariableBlacklisted($key)) {
                /* @noinspection UnserializeExploitsInspection */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                $this->globalVariables[$key] = \unserialize(\serialize($GLOBALS[$key]));
            }
        }
    }

    /**
     * Creates a snapshot a super-global variable array.
     */
<<<<<<< HEAD
    private function snapshotSuperGlobalArray(string $superGlobalArray)
=======
    private function snapshotSuperGlobalArray(string $superGlobalArray): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->superGlobalVariables[$superGlobalArray] = [];

        if (isset($GLOBALS[$superGlobalArray]) && \is_array($GLOBALS[$superGlobalArray])) {
            foreach ($GLOBALS[$superGlobalArray] as $key => $value) {
<<<<<<< HEAD
=======
                /* @noinspection UnserializeExploitsInspection */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                $this->superGlobalVariables[$superGlobalArray][$key] = \unserialize(\serialize($value));
            }
        }
    }

    /**
     * Creates a snapshot of all static attributes in user-defined classes.
     */
<<<<<<< HEAD
    private function snapshotStaticAttributes()
    {
        foreach ($this->classes as $className) {
            $class    = new ReflectionClass($className);
=======
    private function snapshotStaticAttributes(): void
    {
        foreach ($this->classes as $className) {
            $class    = new \ReflectionClass($className);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $snapshot = [];

            foreach ($class->getProperties() as $attribute) {
                if ($attribute->isStatic()) {
                    $name = $attribute->getName();

                    if ($this->blacklist->isStaticAttributeBlacklisted($className, $name)) {
                        continue;
                    }

                    $attribute->setAccessible(true);
                    $value = $attribute->getValue();

                    if ($this->canBeSerialized($value)) {
<<<<<<< HEAD
=======
                        /* @noinspection UnserializeExploitsInspection */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                        $snapshot[$name] = \unserialize(\serialize($value));
                    }
                }
            }

            if (!empty($snapshot)) {
                $this->staticAttributes[$className] = $snapshot;
            }
        }
    }

    /**
     * Returns a list of all super-global variable arrays.
     */
<<<<<<< HEAD
    private function setupSuperGlobalArrays()
=======
    private function setupSuperGlobalArrays(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->superGlobalArrays = [
            '_ENV',
            '_POST',
            '_GET',
            '_COOKIE',
            '_SERVER',
            '_FILES',
<<<<<<< HEAD
            '_REQUEST'
        ];

        if (\ini_get('register_long_arrays') == '1') {
            $this->superGlobalArrays = \array_merge(
                $this->superGlobalArrays,
                [
                    'HTTP_ENV_VARS',
                    'HTTP_POST_VARS',
                    'HTTP_GET_VARS',
                    'HTTP_COOKIE_VARS',
                    'HTTP_SERVER_VARS',
                    'HTTP_POST_FILES'
                ]
            );
        }
    }

    /**
     * @todo Implement this properly
     */
    private function canBeSerialized($variable): bool
    {
        if (!\is_object($variable)) {
            return !\is_resource($variable);
        }

        if ($variable instanceof \stdClass) {
            return true;
        }

        $class = new ReflectionClass($variable);

        do {
            if ($class->isInternal()) {
                return $variable instanceof Serializable;
            }
        } while ($class = $class->getParentClass());

        return true;
    }
=======
            '_REQUEST',
        ];
    }

    private function canBeSerialized($variable): bool
    {
        if (\is_scalar($variable) || $variable === null) {
            return true;
        }

        if (\is_resource($variable)) {
            return false;
        }

        foreach ($this->enumerateObjectsAndResources($variable) as $value) {
            if (\is_resource($value)) {
                return false;
            }

            if (\is_object($value)) {
                $class = new \ReflectionClass($value);

                if ($class->isAnonymous()) {
                    return false;
                }

                try {
                    @\serialize($value);
                } catch (\Throwable $t) {
                    return false;
                }
            }
        }

        return true;
    }

    private function enumerateObjectsAndResources($variable): array
    {
        if (isset(\func_get_args()[1])) {
            $processed = \func_get_args()[1];
        } else {
            $processed = new Context;
        }

        $result = [];

        if ($processed->contains($variable)) {
            return $result;
        }

        $array = $variable;
        $processed->add($variable);

        if (\is_array($variable)) {
            foreach ($array as $element) {
                if (!\is_array($element) && !\is_object($element) && !\is_resource($element)) {
                    continue;
                }

                if (!\is_resource($element)) {
                    /** @noinspection SlowArrayOperationsInLoopInspection */
                    $result = \array_merge(
                        $result,
                        $this->enumerateObjectsAndResources($element, $processed)
                    );
                } else {
                    $result[] = $element;
                }
            }
        } else {
            $result[] = $variable;

            foreach ((new ObjectReflector)->getAttributes($variable) as $value) {
                if (!\is_array($value) && !\is_object($value) && !\is_resource($value)) {
                    continue;
                }

                if (!\is_resource($value)) {
                    /** @noinspection SlowArrayOperationsInLoopInspection */
                    $result = \array_merge(
                        $result,
                        $this->enumerateObjectsAndResources($value, $processed)
                    );
                } else {
                    $result[] = $value;
                }
            }
        }

        return $result;
    }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
