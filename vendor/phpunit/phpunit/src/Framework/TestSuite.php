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
namespace PHPUnit\Framework;

<<<<<<< HEAD
use Iterator;
use IteratorAggregate;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use PHPUnit\Runner\BaseTestRunner;
use PHPUnit\Runner\Filter\Factory;
use PHPUnit\Runner\PhptTestCase;
use PHPUnit\Util\FileLoader;
<<<<<<< HEAD
use PHPUnit\Util\InvalidArgumentHelper;
use ReflectionClass;
use ReflectionMethod;
use Throwable;

/**
 * A TestSuite is a composite of Tests. It runs a collection of test cases.
 */
class TestSuite implements IteratorAggregate, SelfDescribing, Test
=======
use PHPUnit\Util\Test as TestUtil;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
class TestSuite implements \IteratorAggregate, SelfDescribing, Test
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * Enable or disable the backup and restoration of the $GLOBALS array.
     *
     * @var bool
     */
    protected $backupGlobals;

    /**
     * Enable or disable the backup and restoration of static attributes.
     *
     * @var bool
     */
    protected $backupStaticAttributes;

    /**
     * @var bool
     */
    protected $runTestInSeparateProcess = false;

    /**
     * The name of the test suite.
     *
     * @var string
     */
    protected $name = '';

    /**
     * The test groups of the test suite.
     *
     * @var array
     */
    protected $groups = [];

    /**
     * The tests in the test suite.
     *
     * @var Test[]
     */
    protected $tests = [];

    /**
     * The number of tests in the test suite.
     *
     * @var int
     */
    protected $numTests = -1;

    /**
     * @var bool
     */
    protected $testCase = false;

    /**
<<<<<<< HEAD
     * @var array
=======
     * @var string[]
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    protected $foundClasses = [];

    /**
     * Last count of tests in this suite.
     *
     * @var null|int
     */
    private $cachedNumTests;

    /**
     * @var bool
     */
    private $beStrictAboutChangesToGlobalState;

    /**
     * @var Factory
     */
    private $iteratorFilter;

    /**
     * @var string[]
     */
    private $declaredClasses;

    /**
<<<<<<< HEAD
     * @param string $name
     *
     * @throws Exception
     */
    public static function createTest(ReflectionClass $theClass, $name): Test
    {
        $className = $theClass->getName();

        if (!$theClass->isInstantiable()) {
            return self::warning(
                \sprintf('Cannot instantiate class "%s".', $className)
            );
        }

        $backupSettings = \PHPUnit\Util\Test::getBackupSettings(
            $className,
            $name
        );

        $preserveGlobalState = \PHPUnit\Util\Test::getPreserveGlobalStateSettings(
            $className,
            $name
        );

        $runTestInSeparateProcess = \PHPUnit\Util\Test::getProcessIsolationSettings(
            $className,
            $name
        );

        $runClassInSeparateProcess = \PHPUnit\Util\Test::getClassProcessIsolationSettings(
            $className,
            $name
        );

        $constructor = $theClass->getConstructor();

        if ($constructor === null) {
            throw new Exception('No valid test provided.');
        }
        $parameters = $constructor->getParameters();

        // TestCase() or TestCase($name)
        if (\count($parameters) < 2) {
            $test = new $className;
        } // TestCase($name, $data)
        else {
            try {
                $data = \PHPUnit\Util\Test::getProvidedData(
                    $className,
                    $name
                );
            } catch (IncompleteTestError $e) {
                $message = \sprintf(
                    'Test for %s::%s marked incomplete by data provider',
                    $className,
                    $name
                );

                $_message = $e->getMessage();

                if (!empty($_message)) {
                    $message .= "\n" . $_message;
                }

                $data = self::incompleteTest($className, $name, $message);
            } catch (SkippedTestError $e) {
                $message = \sprintf(
                    'Test for %s::%s skipped by data provider',
                    $className,
                    $name
                );

                $_message = $e->getMessage();

                if (!empty($_message)) {
                    $message .= "\n" . $_message;
                }

                $data = self::skipTest($className, $name, $message);
            } catch (Throwable $t) {
                $message = \sprintf(
                    'The data provider specified for %s::%s is invalid.',
                    $className,
                    $name
                );

                $_message = $t->getMessage();

                if (!empty($_message)) {
                    $message .= "\n" . $_message;
                }

                $data = self::warning($message);
            }

            // Test method with @dataProvider.
            if (isset($data)) {
                $test = new DataProviderTestSuite(
                    $className . '::' . $name
                );

                if (empty($data)) {
                    $data = self::warning(
                        \sprintf(
                            'No tests found in suite "%s".',
                            $test->getName()
                        )
                    );
                }

                $groups = \PHPUnit\Util\Test::getGroups($className, $name);

                if ($data instanceof WarningTestCase ||
                    $data instanceof SkippedTestCase ||
                    $data instanceof IncompleteTestCase) {
                    $test->addTest($data, $groups);
                } else {
                    foreach ($data as $_dataName => $_data) {
                        $_test = new $className($name, $_data, $_dataName);

                        /* @var TestCase $_test */

                        if ($runTestInSeparateProcess) {
                            $_test->setRunTestInSeparateProcess(true);

                            if ($preserveGlobalState !== null) {
                                $_test->setPreserveGlobalState($preserveGlobalState);
                            }
                        }

                        if ($runClassInSeparateProcess) {
                            $_test->setRunClassInSeparateProcess(true);

                            if ($preserveGlobalState !== null) {
                                $_test->setPreserveGlobalState($preserveGlobalState);
                            }
                        }

                        if ($backupSettings['backupGlobals'] !== null) {
                            $_test->setBackupGlobals(
                                $backupSettings['backupGlobals']
                            );
                        }

                        if ($backupSettings['backupStaticAttributes'] !== null) {
                            $_test->setBackupStaticAttributes(
                                $backupSettings['backupStaticAttributes']
                            );
                        }

                        $test->addTest($_test, $groups);
                    }
                }
            } else {
                $test = new $className;
            }
        }

        if ($test instanceof TestCase) {
            $test->setName($name);

            if ($runTestInSeparateProcess) {
                $test->setRunTestInSeparateProcess(true);

                if ($preserveGlobalState !== null) {
                    $test->setPreserveGlobalState($preserveGlobalState);
                }
            }

            if ($runClassInSeparateProcess) {
                $test->setRunClassInSeparateProcess(true);

                if ($preserveGlobalState !== null) {
                    $test->setPreserveGlobalState($preserveGlobalState);
                }
            }

            if ($backupSettings['backupGlobals'] !== null) {
                $test->setBackupGlobals($backupSettings['backupGlobals']);
            }

            if ($backupSettings['backupStaticAttributes'] !== null) {
                $test->setBackupStaticAttributes(
                    $backupSettings['backupStaticAttributes']
                );
            }
        }

        return $test;
    }

    public static function isTestMethod(ReflectionMethod $method): bool
    {
        if (\strpos($method->name, 'test') === 0) {
            return true;
        }

        $annotations = \PHPUnit\Util\Test::parseAnnotations($method->getDocComment());

        return isset($annotations['test']);
    }

    /**
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * Constructs a new TestSuite:
     *
     *   - PHPUnit\Framework\TestSuite() constructs an empty TestSuite.
     *
     *   - PHPUnit\Framework\TestSuite(ReflectionClass) constructs a
     *     TestSuite from the given class.
     *
     *   - PHPUnit\Framework\TestSuite(ReflectionClass, String)
     *     constructs a TestSuite from the given class with the given
     *     name.
     *
     *   - PHPUnit\Framework\TestSuite(String) either constructs a
     *     TestSuite from the given class (if the passed string is the
     *     name of an existing class) or constructs an empty TestSuite
     *     with the given name.
     *
<<<<<<< HEAD
     * @param string $name
     *
     * @throws Exception
     */
    public function __construct($theClass = '', $name = '')
    {
        $this->declaredClasses = \get_declared_classes();

        $argumentsValid = false;

        if (\is_object($theClass) &&
            $theClass instanceof ReflectionClass) {
            $argumentsValid = true;
        } elseif (\is_string($theClass) &&
            $theClass !== '' &&
            \class_exists($theClass, true)) {
            $argumentsValid = true;

            if ($name == '') {
                $name = $theClass;
            }

            $theClass = new ReflectionClass($theClass);
        } elseif (\is_string($theClass)) {
            $this->setName($theClass);

            return;
        }

        if (!$argumentsValid) {
            throw new Exception;
        }

        if (!$theClass->isSubclassOf(TestCase::class)) {
            $this->setName($theClass);
=======
     * @param \ReflectionClass|string $theClass
     *
     * @throws Exception
     */
    public function __construct($theClass = '', string $name = '')
    {
        if (!\is_string($theClass) && !$theClass instanceof \ReflectionClass) {
            throw InvalidArgumentException::create(
                1,
                'ReflectionClass object or string'
            );
        }

        $this->declaredClasses = \get_declared_classes();

        if (!$theClass instanceof \ReflectionClass) {
            if (\class_exists($theClass, true)) {
                if ($name === '') {
                    $name = $theClass;
                }

                try {
                    $theClass = new \ReflectionClass($theClass);
                } catch (\ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        (int) $e->getCode(),
                        $e
                    );
                }
            } else {
                $this->setName($theClass);

                return;
            }
        }

        if (!$theClass->isSubclassOf(TestCase::class)) {
            $this->setName((string) $theClass);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

            return;
        }

<<<<<<< HEAD
        if ($name != '') {
=======
        if ($name !== '') {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $this->setName($name);
        } else {
            $this->setName($theClass->getName());
        }

        $constructor = $theClass->getConstructor();

        if ($constructor !== null &&
            !$constructor->isPublic()) {
            $this->addTest(
<<<<<<< HEAD
                self::warning(
=======
                new WarningTestCase(
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                    \sprintf(
                        'Class "%s" has no public constructor.',
                        $theClass->getName()
                    )
                )
            );

            return;
        }

        foreach ($theClass->getMethods() as $method) {
            if ($method->getDeclaringClass()->getName() === Assert::class) {
                continue;
            }

            if ($method->getDeclaringClass()->getName() === TestCase::class) {
                continue;
            }

            $this->addTestMethod($theClass, $method);
        }

        if (empty($this->tests)) {
            $this->addTest(
<<<<<<< HEAD
                self::warning(
=======
                new WarningTestCase(
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                    \sprintf(
                        'No tests found in class "%s".',
                        $theClass->getName()
                    )
                )
            );
        }

        $this->testCase = true;
    }

    /**
<<<<<<< HEAD
     * Template Method that is called before the tests
     * of this test suite are run.
     */
    protected function setUp(): void
    {
    }

    /**
     * Template Method that is called after the tests
     * of this test suite have finished running.
     */
    protected function tearDown(): void
    {
    }

    /**
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * Returns a string representation of the test suite.
     */
    public function toString(): string
    {
        return $this->getName();
    }

    /**
     * Adds a test to the suite.
     *
     * @param array $groups
     */
    public function addTest(Test $test, $groups = []): void
    {
<<<<<<< HEAD
        $class = new ReflectionClass($test);
=======
        try {
            $class = new \ReflectionClass($test);
        } catch (\ReflectionException $e) {
            throw new Exception(
                $e->getMessage(),
                (int) $e->getCode(),
                $e
            );
        }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        if (!$class->isAbstract()) {
            $this->tests[]  = $test;
            $this->numTests = -1;

            if ($test instanceof self && empty($groups)) {
                $groups = $test->getGroups();
            }

            if (empty($groups)) {
                $groups = ['default'];
            }

            foreach ($groups as $group) {
                if (!isset($this->groups[$group])) {
                    $this->groups[$group] = [$test];
                } else {
                    $this->groups[$group][] = $test;
                }
            }

            if ($test instanceof TestCase) {
                $test->setGroups($groups);
            }
        }
    }

    /**
     * Adds the tests from the given class to the suite.
     *
<<<<<<< HEAD
=======
     * @param object|string $testClass
     *
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * @throws Exception
     */
    public function addTestSuite($testClass): void
    {
<<<<<<< HEAD
        if (\is_string($testClass) && \class_exists($testClass)) {
            $testClass = new ReflectionClass($testClass);
        }

        if (!\is_object($testClass)) {
            throw InvalidArgumentHelper::factory(
=======
        if (!(\is_object($testClass) || (\is_string($testClass) && \class_exists($testClass)))) {
            throw InvalidArgumentException::create(
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                1,
                'class name or object'
            );
        }

<<<<<<< HEAD
        if ($testClass instanceof self) {
            $this->addTest($testClass);
        } elseif ($testClass instanceof ReflectionClass) {
            $suiteMethod = false;

            if (!$testClass->isAbstract() && $testClass->hasMethod(BaseTestRunner::SUITE_METHODNAME)) {
                $method = $testClass->getMethod(
                    BaseTestRunner::SUITE_METHODNAME
                );
=======
        if (!\is_object($testClass)) {
            try {
                $testClass = new \ReflectionClass($testClass);
            } catch (\ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    (int) $e->getCode(),
                    $e
                );
            }
        }

        if ($testClass instanceof self) {
            $this->addTest($testClass);
        } elseif ($testClass instanceof \ReflectionClass) {
            $suiteMethod = false;

            if (!$testClass->isAbstract() && $testClass->hasMethod(BaseTestRunner::SUITE_METHODNAME)) {
                try {
                    $method = $testClass->getMethod(
                        BaseTestRunner::SUITE_METHODNAME
                    );
                } catch (\ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        (int) $e->getCode(),
                        $e
                    );
                }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

                if ($method->isStatic()) {
                    $this->addTest(
                        $method->invoke(null, $testClass->getName())
                    );

                    $suiteMethod = true;
                }
            }

            if (!$suiteMethod && !$testClass->isAbstract() && $testClass->isSubclassOf(TestCase::class)) {
                $this->addTest(new self($testClass));
            }
        } else {
            throw new Exception;
        }
    }

    /**
     * Wraps both <code>addTest()</code> and <code>addTestSuite</code>
     * as well as the separate import statements for the user's convenience.
     *
     * If the named file cannot be read or there are no new tests that can be
     * added, a <code>PHPUnit\Framework\WarningTestCase</code> will be created instead,
     * leaving the current test run untouched.
     *
     * @throws Exception
     */
    public function addTestFile(string $filename): void
    {
<<<<<<< HEAD
        if (\file_exists($filename) && \substr($filename, -5) == '.phpt') {
=======
        if (\file_exists($filename) && \substr($filename, -5) === '.phpt') {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $this->addTest(
                new PhptTestCase($filename)
            );

            return;
        }

        // The given file may contain further stub classes in addition to the
        // test class itself. Figure out the actual test class.
        $filename   = FileLoader::checkAndLoad($filename);
        $newClasses = \array_diff(\get_declared_classes(), $this->declaredClasses);

        // The diff is empty in case a parent class (with test methods) is added
        // AFTER a child class that inherited from it. To account for that case,
        // accumulate all discovered classes, so the parent class may be found in
        // a later invocation.
        if (!empty($newClasses)) {
            // On the assumption that test classes are defined first in files,
            // process discovered classes in approximate LIFO order, so as to
            // avoid unnecessary reflection.
            $this->foundClasses    = \array_merge($newClasses, $this->foundClasses);
            $this->declaredClasses = \get_declared_classes();
        }

        // The test class's name must match the filename, either in full, or as
        // a PEAR/PSR-0 prefixed short name ('NameSpace_ShortName'), or as a
        // PSR-1 local short name ('NameSpace\ShortName'). The comparison must be
        // anchored to prevent false-positive matches (e.g., 'OtherShortName').
        $shortName      = \basename($filename, '.php');
        $shortNameRegEx = '/(?:^|_|\\\\)' . \preg_quote($shortName, '/') . '$/';

        foreach ($this->foundClasses as $i => $className) {
            if (\preg_match($shortNameRegEx, $className)) {
<<<<<<< HEAD
                $class = new ReflectionClass($className);
=======
                try {
                    $class = new \ReflectionClass($className);
                } catch (\ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        (int) $e->getCode(),
                        $e
                    );
                }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

                if ($class->getFileName() == $filename) {
                    $newClasses = [$className];
                    unset($this->foundClasses[$i]);

                    break;
                }
            }
        }

        foreach ($newClasses as $className) {
<<<<<<< HEAD
            $class = new ReflectionClass($className);
=======
            try {
                $class = new \ReflectionClass($className);
            } catch (\ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    (int) $e->getCode(),
                    $e
                );
            }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

            if (\dirname($class->getFileName()) === __DIR__) {
                continue;
            }

            if (!$class->isAbstract()) {
                if ($class->hasMethod(BaseTestRunner::SUITE_METHODNAME)) {
<<<<<<< HEAD
                    $method = $class->getMethod(
                        BaseTestRunner::SUITE_METHODNAME
                    );
=======
                    try {
                        $method = $class->getMethod(
                            BaseTestRunner::SUITE_METHODNAME
                        );
                    } catch (\ReflectionException $e) {
                        throw new Exception(
                            $e->getMessage(),
                            (int) $e->getCode(),
                            $e
                        );
                    }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

                    if ($method->isStatic()) {
                        $this->addTest($method->invoke(null, $className));
                    }
                } elseif ($class->implementsInterface(Test::class)) {
                    $this->addTestSuite($class);
                }
            }
        }

        $this->numTests = -1;
    }

    /**
     * Wrapper for addTestFile() that adds multiple test files.
     *
<<<<<<< HEAD
     * @param array|Iterator $fileNames
     *
     * @throws Exception
     */
    public function addTestFiles($fileNames): void
    {
        if (!(\is_array($fileNames) ||
            (\is_object($fileNames) && $fileNames instanceof Iterator))) {
            throw InvalidArgumentHelper::factory(
                1,
                'array or iterator'
            );
        }

=======
     * @throws Exception
     */
    public function addTestFiles(iterable $fileNames): void
    {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        foreach ($fileNames as $filename) {
            $this->addTestFile((string) $filename);
        }
    }

    /**
     * Counts the number of test cases that will be run by this test.
<<<<<<< HEAD
     *
     * @param bool $preferCache indicates if cache is preferred
     */
    public function count($preferCache = false): int
=======
     */
    public function count(bool $preferCache = false): int
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if ($preferCache && $this->cachedNumTests !== null) {
            return $this->cachedNumTests;
        }

        $numTests = 0;

        foreach ($this as $test) {
            $numTests += \count($test);
        }

        $this->cachedNumTests = $numTests;

        return $numTests;
    }

    /**
     * Returns the name of the suite.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Returns the test groups of the suite.
     */
    public function getGroups(): array
    {
        return \array_keys($this->groups);
    }

<<<<<<< HEAD
    public function getGroupDetails()
=======
    public function getGroupDetails(): array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->groups;
    }

    /**
     * Set tests groups of the test case
     */
    public function setGroupDetails(array $groups): void
    {
        $this->groups = $groups;
    }

    /**
     * Runs the tests and collects their result in a TestResult.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
=======
     * @throws \PHPUnit\Framework\CodeCoverageException
     * @throws \SebastianBergmann\CodeCoverage\CoveredCodeNotExecutedException
     * @throws \SebastianBergmann\CodeCoverage\InvalidArgumentException
     * @throws \SebastianBergmann\CodeCoverage\MissingCoversAnnotationException
     * @throws \SebastianBergmann\CodeCoverage\RuntimeException
     * @throws \SebastianBergmann\CodeCoverage\UnintentionallyCoveredCodeException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Warning
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function run(TestResult $result = null): TestResult
    {
        if ($result === null) {
            $result = $this->createResult();
        }

<<<<<<< HEAD
        if (\count($this) == 0) {
            return $result;
        }

        $hookMethods = \PHPUnit\Util\Test::getHookMethods($this->name);
=======
        if (\count($this) === 0) {
            return $result;
        }

        /** @psalm-var class-string $className */
        $className   = $this->name;
        $hookMethods = TestUtil::getHookMethods($className);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        $result->startTestSuite($this);

        try {
<<<<<<< HEAD
            $this->setUp();

            foreach ($hookMethods['beforeClass'] as $beforeClassMethod) {
                if ($this->testCase === true &&
                    \class_exists($this->name, false) &&
                    \method_exists($this->name, $beforeClassMethod)) {
                    if ($missingRequirements = \PHPUnit\Util\Test::getMissingRequirements($this->name, $beforeClassMethod)) {
=======
            foreach ($hookMethods['beforeClass'] as $beforeClassMethod) {
                if ($this->testCase &&
                    \class_exists($this->name, false) &&
                    \method_exists($this->name, $beforeClassMethod)) {
                    if ($missingRequirements = TestUtil::getMissingRequirements($this->name, $beforeClassMethod)) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                        $this->markTestSuiteSkipped(\implode(\PHP_EOL, $missingRequirements));
                    }

                    \call_user_func([$this->name, $beforeClassMethod]);
                }
            }
        } catch (SkippedTestSuiteError $error) {
            foreach ($this->tests() as $test) {
                $result->startTest($test);
                $result->addFailure($test, $error, 0);
                $result->endTest($test, 0);
            }

<<<<<<< HEAD
            $this->tearDown();
            $result->endTestSuite($this);

            return $result;
        } catch (Throwable $t) {
=======
            $result->endTestSuite($this);

            return $result;
        } catch (\Throwable $t) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            foreach ($this->tests() as $test) {
                if ($result->shouldStop()) {
                    break;
                }

                $result->startTest($test);
                $result->addError($test, $t, 0);
                $result->endTest($test, 0);
            }

<<<<<<< HEAD
            $this->tearDown();
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $result->endTestSuite($this);

            return $result;
        }

        foreach ($this as $test) {
            if ($result->shouldStop()) {
                break;
            }

            if ($test instanceof TestCase || $test instanceof self) {
                $test->setBeStrictAboutChangesToGlobalState($this->beStrictAboutChangesToGlobalState);
                $test->setBackupGlobals($this->backupGlobals);
                $test->setBackupStaticAttributes($this->backupStaticAttributes);
                $test->setRunTestInSeparateProcess($this->runTestInSeparateProcess);
            }

            $test->run($result);
        }

        try {
            foreach ($hookMethods['afterClass'] as $afterClassMethod) {
<<<<<<< HEAD
                if ($this->testCase === true && \class_exists($this->name, false) && \method_exists(
                    $this->name,
                    $afterClassMethod
                )) {
                    \call_user_func([$this->name, $afterClassMethod]);
                }
            }
        } catch (Throwable $t) {
=======
                if ($this->testCase &&
                    \class_exists($this->name, false) &&
                    \method_exists($this->name, $afterClassMethod)) {
                    \call_user_func([$this->name, $afterClassMethod]);
                }
            }
        } catch (\Throwable $t) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $message = "Exception in {$this->name}::$afterClassMethod" . \PHP_EOL . $t->getMessage();
            $error   = new SyntheticError($message, 0, $t->getFile(), $t->getLine(), $t->getTrace());

            $placeholderTest = clone $test;
            $placeholderTest->setName($afterClassMethod);

            $result->startTest($placeholderTest);
            $result->addFailure($placeholderTest, $error, 0);
            $result->endTest($placeholderTest, 0);
        }

<<<<<<< HEAD
        $this->tearDown();

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $result->endTestSuite($this);

        return $result;
    }

    public function setRunTestInSeparateProcess(bool $runTestInSeparateProcess): void
    {
        $this->runTestInSeparateProcess = $runTestInSeparateProcess;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns the test at the given index.
     *
     * @return false|Test
     */
    public function testAt(int $index)
    {
<<<<<<< HEAD
        if (isset($this->tests[$index])) {
            return $this->tests[$index];
        }

        return false;
=======
        return $this->tests[$index] ?? false;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Returns the tests as an enumeration.
     *
     * @return Test[]
     */
    public function tests(): array
    {
        return $this->tests;
    }

    /**
     * Set tests of the test suite
     *
     * @param Test[] $tests
     */
    public function setTests(array $tests): void
    {
        $this->tests = $tests;
    }

    /**
     * Mark the test suite as skipped.
     *
     * @param string $message
     *
     * @throws SkippedTestSuiteError
     */
    public function markTestSuiteSkipped($message = ''): void
    {
        throw new SkippedTestSuiteError($message);
    }

    /**
     * @param bool $beStrictAboutChangesToGlobalState
     */
    public function setBeStrictAboutChangesToGlobalState($beStrictAboutChangesToGlobalState): void
    {
        if (null === $this->beStrictAboutChangesToGlobalState && \is_bool($beStrictAboutChangesToGlobalState)) {
            $this->beStrictAboutChangesToGlobalState = $beStrictAboutChangesToGlobalState;
        }
    }

    /**
     * @param bool $backupGlobals
     */
    public function setBackupGlobals($backupGlobals): void
    {
        if (null === $this->backupGlobals && \is_bool($backupGlobals)) {
            $this->backupGlobals = $backupGlobals;
        }
    }

    /**
     * @param bool $backupStaticAttributes
     */
    public function setBackupStaticAttributes($backupStaticAttributes): void
    {
        if (null === $this->backupStaticAttributes && \is_bool($backupStaticAttributes)) {
            $this->backupStaticAttributes = $backupStaticAttributes;
        }
    }

    /**
     * Returns an iterator for this test suite.
     */
<<<<<<< HEAD
    public function getIterator(): Iterator
=======
    public function getIterator(): \Iterator
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $iterator = new TestSuiteIterator($this);

        if ($this->iteratorFilter !== null) {
            $iterator = $this->iteratorFilter->factory($iterator, $this);
        }

        return $iterator;
    }

    public function injectFilter(Factory $filter): void
    {
        $this->iteratorFilter = $filter;

        foreach ($this as $test) {
            if ($test instanceof self) {
                $test->injectFilter($filter);
            }
        }
    }

    /**
     * Creates a default TestResult object.
     */
    protected function createResult(): TestResult
    {
        return new TestResult;
    }

    /**
     * @throws Exception
     */
<<<<<<< HEAD
    protected function addTestMethod(ReflectionClass $class, ReflectionMethod $method): void
    {
        if (!$this->isTestMethod($method)) {
            return;
        }

        $name = $method->getName();

        if (!$method->isPublic()) {
            $this->addTest(
                self::warning(
                    \sprintf(
                        'Test method "%s" in test class "%s" is not public.',
                        $name,
=======
    protected function addTestMethod(\ReflectionClass $class, \ReflectionMethod $method): void
    {
        if (!TestUtil::isTestMethod($method)) {
            return;
        }

        $methodName = $method->getName();

        if (!$method->isPublic()) {
            $this->addTest(
                new WarningTestCase(
                    \sprintf(
                        'Test method "%s" in test class "%s" is not public.',
                        $methodName,
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                        $class->getName()
                    )
                )
            );

            return;
        }

<<<<<<< HEAD
        $test = self::createTest($class, $name);

        if ($test instanceof TestCase || $test instanceof DataProviderTestSuite) {
            $test->setDependencies(
                \PHPUnit\Util\Test::getDependencies($class->getName(), $name)
=======
        $test = (new TestBuilder)->build($class, $methodName);

        if ($test instanceof TestCase || $test instanceof DataProviderTestSuite) {
            $test->setDependencies(
                TestUtil::getDependencies($class->getName(), $methodName)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            );
        }

        $this->addTest(
            $test,
<<<<<<< HEAD
            \PHPUnit\Util\Test::getGroups($class->getName(), $name)
        );
    }

    /**
     * @param string $message
     */
    protected static function warning($message): WarningTestCase
    {
        return new WarningTestCase($message);
    }

    /**
     * @param string $class
     * @param string $methodName
     * @param string $message
     */
    protected static function skipTest($class, $methodName, $message): SkippedTestCase
    {
        return new SkippedTestCase($class, $methodName, $message);
    }

    /**
     * @param string $class
     * @param string $methodName
     * @param string $message
     */
    protected static function incompleteTest($class, $methodName, $message): IncompleteTestCase
    {
        return new IncompleteTestCase($class, $methodName, $message);
    }
=======
            TestUtil::getGroups($class->getName(), $methodName)
        );
    }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
