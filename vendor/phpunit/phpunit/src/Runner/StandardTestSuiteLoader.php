<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Runner;

<<<<<<< HEAD
use PHPUnit\Framework\TestCase;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use PHPUnit\Util\FileLoader;
use PHPUnit\Util\Filesystem;
use ReflectionClass;

/**
<<<<<<< HEAD
 * The standard test suite loader.
 */
class StandardTestSuiteLoader implements TestSuiteLoader
=======
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class StandardTestSuiteLoader implements TestSuiteLoader
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @throws Exception
     * @throws \PHPUnit\Framework\Exception
     */
    public function load(string $suiteClassName, string $suiteClassFile = ''): ReflectionClass
    {
<<<<<<< HEAD
        $suiteClassName = \str_replace('.php', '', $suiteClassName);
=======
        $suiteClassName = \str_replace('.php', '', \basename($suiteClassName));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        if (empty($suiteClassFile)) {
            $suiteClassFile = Filesystem::classNameToFilename(
                $suiteClassName
            );
        }

<<<<<<< HEAD
        if (!\class_exists($suiteClassName, false)) {
            $loadedClasses = \get_declared_classes();

            $filename = FileLoader::checkAndLoad($suiteClassFile);

            $loadedClasses = \array_values(
                \array_diff(\get_declared_classes(), $loadedClasses)
            );
        }

        if (!\class_exists($suiteClassName, false) && !empty($loadedClasses)) {
            $offset = 0 - \strlen($suiteClassName);

            foreach ($loadedClasses as $loadedClass) {
                $class = new ReflectionClass($loadedClass);

                if (\substr($loadedClass, $offset) === $suiteClassName &&
                    $class->getFileName() == $filename) {
                    $suiteClassName = $loadedClass;

                    break;
                }
            }
        }

        if (!\class_exists($suiteClassName, false) && !empty($loadedClasses)) {
            $testCaseClass = TestCase::class;

            foreach ($loadedClasses as $loadedClass) {
                $class     = new ReflectionClass($loadedClass);
                $classFile = $class->getFileName();

                if ($class->isSubclassOf($testCaseClass) && !$class->isAbstract()) {
                    $suiteClassName = $loadedClass;
                    $testCaseClass  = $loadedClass;

                    if ($classFile == \realpath($suiteClassFile)) {
                        break;
                    }
                }

                if ($class->hasMethod('suite')) {
                    $method = $class->getMethod('suite');

                    if (!$method->isAbstract() && $method->isPublic() && $method->isStatic()) {
                        $suiteClassName = $loadedClass;

                        if ($classFile == \realpath($suiteClassFile)) {
                            break;
                        }
                    }
                }
            }
        }

        if (\class_exists($suiteClassName, false)) {
            $class = new ReflectionClass($suiteClassName);

            if ($class->getFileName() == \realpath($suiteClassFile)) {
                return $class;
            }
        }

        throw new Exception(
            \sprintf(
                "Class '%s' could not be found in '%s'.",
                $suiteClassName,
                $suiteClassFile
            )
        );
=======
        $loadedClasses = \get_declared_classes();
        $filename      = FileLoader::checkAndLoad($suiteClassFile);
        $loadedClasses = \array_values(
            \array_diff(\get_declared_classes(), $loadedClasses)
        );

        $offset = 0 - \strlen($suiteClassName);
        $class  = null;

        foreach ($loadedClasses as $loadedClass) {
            try {
                $class = new ReflectionClass($loadedClass);
            } catch (\ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    (int) $e->getCode(),
                    $e
                );
            }

            if ($class->isAbstract()) {
                continue;
            }

            if (\substr($loadedClass, $offset) === $suiteClassName &&
                $class->getFileName() == $filename) {
                $suiteClassName = $loadedClass;

                break;
            }
        }

        if (!\class_exists($suiteClassName, false) ||
            !($class instanceof ReflectionClass)) {
            throw new Exception(
                \sprintf(
                    "Class '%s' could not be found in '%s'.",
                    $suiteClassName,
                    $suiteClassFile
                )
            );
        }

        return $class;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function reload(ReflectionClass $aClass): ReflectionClass
    {
        return $aClass;
    }
}
