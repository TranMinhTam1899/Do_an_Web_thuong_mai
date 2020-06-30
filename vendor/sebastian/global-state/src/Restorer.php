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

use ReflectionProperty;

=======
namespace SebastianBergmann\GlobalState;

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/**
 * Restorer of snapshots of global state.
 */
class Restorer
{
    /**
     * Deletes function definitions that are not defined in a snapshot.
     *
     * @throws RuntimeException when the uopz_delete() function is not available
     *
<<<<<<< HEAD
     * @see    https://github.com/krakjoe/uopz
     */
    public function restoreFunctions(Snapshot $snapshot)
=======
     * @see https://github.com/krakjoe/uopz
     */
    public function restoreFunctions(Snapshot $snapshot): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!\function_exists('uopz_delete')) {
            throw new RuntimeException('The uopz_delete() function is required for this operation');
        }

        $functions = \get_defined_functions();

        foreach (\array_diff($functions['user'], $snapshot->functions()) as $function) {
            uopz_delete($function);
        }
    }

    /**
     * Restores all global and super-global variables from a snapshot.
     */
<<<<<<< HEAD
    public function restoreGlobalVariables(Snapshot $snapshot)
=======
    public function restoreGlobalVariables(Snapshot $snapshot): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $superGlobalArrays = $snapshot->superGlobalArrays();

        foreach ($superGlobalArrays as $superGlobalArray) {
            $this->restoreSuperGlobalArray($snapshot, $superGlobalArray);
        }

        $globalVariables = $snapshot->globalVariables();

        foreach (\array_keys($GLOBALS) as $key) {
<<<<<<< HEAD
            if ($key != 'GLOBALS' &&
=======
            if ($key !== 'GLOBALS' &&
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                !\in_array($key, $superGlobalArrays) &&
                !$snapshot->blacklist()->isGlobalVariableBlacklisted($key)) {
                if (\array_key_exists($key, $globalVariables)) {
                    $GLOBALS[$key] = $globalVariables[$key];
                } else {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }

    /**
     * Restores all static attributes in user-defined classes from this snapshot.
     */
<<<<<<< HEAD
    public function restoreStaticAttributes(Snapshot $snapshot)
=======
    public function restoreStaticAttributes(Snapshot $snapshot): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $current    = new Snapshot($snapshot->blacklist(), false, false, false, false, true, false, false, false, false);
        $newClasses = \array_diff($current->classes(), $snapshot->classes());

        unset($current);

        foreach ($snapshot->staticAttributes() as $className => $staticAttributes) {
            foreach ($staticAttributes as $name => $value) {
<<<<<<< HEAD
                $reflector = new ReflectionProperty($className, $name);
=======
                $reflector = new \ReflectionProperty($className, $name);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                $reflector->setAccessible(true);
                $reflector->setValue($value);
            }
        }

        foreach ($newClasses as $className) {
            $class    = new \ReflectionClass($className);
            $defaults = $class->getDefaultProperties();

            foreach ($class->getProperties() as $attribute) {
                if (!$attribute->isStatic()) {
                    continue;
                }

                $name = $attribute->getName();

                if ($snapshot->blacklist()->isStaticAttributeBlacklisted($className, $name)) {
                    continue;
                }

                if (!isset($defaults[$name])) {
                    continue;
                }

                $attribute->setAccessible(true);
                $attribute->setValue($defaults[$name]);
            }
        }
    }

    /**
     * Restores a super-global variable array from this snapshot.
     */
<<<<<<< HEAD
    private function restoreSuperGlobalArray(Snapshot $snapshot, string $superGlobalArray)
=======
    private function restoreSuperGlobalArray(Snapshot $snapshot, string $superGlobalArray): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $superGlobalVariables = $snapshot->superGlobalVariables();

        if (isset($GLOBALS[$superGlobalArray]) &&
            \is_array($GLOBALS[$superGlobalArray]) &&
            isset($superGlobalVariables[$superGlobalArray])) {
            $keys = \array_keys(
                \array_merge(
                    $GLOBALS[$superGlobalArray],
                    $superGlobalVariables[$superGlobalArray]
                )
            );

            foreach ($keys as $key) {
                if (isset($superGlobalVariables[$superGlobalArray][$key])) {
                    $GLOBALS[$superGlobalArray][$key] = $superGlobalVariables[$superGlobalArray][$key];
                } else {
                    unset($GLOBALS[$superGlobalArray][$key]);
                }
            }
        }
    }
}
