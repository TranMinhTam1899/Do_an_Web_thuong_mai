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
<<<<<<< HEAD

namespace SebastianBergmann\CodeCoverage\Report;

use SebastianBergmann\CodeCoverage\Driver\Driver;
use SebastianBergmann\CodeCoverage\CodeCoverage;
use SebastianBergmann\CodeCoverage\Filter;
use SebastianBergmann\CodeCoverage\TestCase;
use SebastianBergmann\CodeCoverage\Node\Builder;
=======
namespace SebastianBergmann\CodeCoverage\Report;

use SebastianBergmann\CodeCoverage\Node\Builder;
use SebastianBergmann\CodeCoverage\TestCase;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

class BuilderTest extends TestCase
{
    protected $factory;

<<<<<<< HEAD
    protected function setUp()
=======
    protected function setUp(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->factory = new Builder;
    }

<<<<<<< HEAD
    public function testSomething()
    {
        $root = $this->getCoverageForBankAccount()->getReport();

        $expectedPath = rtrim(TEST_FILES_PATH, DIRECTORY_SEPARATOR);
=======
    public function testSomething(): void
    {
        $root = $this->getCoverageForBankAccount()->getReport();

        $expectedPath = \rtrim(TEST_FILES_PATH, \DIRECTORY_SEPARATOR);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $this->assertEquals($expectedPath, $root->getName());
        $this->assertEquals($expectedPath, $root->getPath());
        $this->assertEquals(10, $root->getNumExecutableLines());
        $this->assertEquals(5, $root->getNumExecutedLines());
        $this->assertEquals(1, $root->getNumClasses());
        $this->assertEquals(0, $root->getNumTestedClasses());
        $this->assertEquals(4, $root->getNumMethods());
        $this->assertEquals(3, $root->getNumTestedMethods());
        $this->assertEquals('0.00%', $root->getTestedClassesPercent());
        $this->assertEquals('75.00%', $root->getTestedMethodsPercent());
        $this->assertEquals('50.00%', $root->getLineExecutedPercent());
        $this->assertEquals(0, $root->getNumFunctions());
        $this->assertEquals(0, $root->getNumTestedFunctions());
        $this->assertNull($root->getParent());
        $this->assertEquals([], $root->getDirectories());
        #$this->assertEquals(array(), $root->getFiles());
        #$this->assertEquals(array(), $root->getChildNodes());

        $this->assertEquals(
            [
                'BankAccount' => [
                    'methods' => [
                        'getBalance' => [
                            'signature'       => 'getBalance()',
                            'startLine'       => 6,
                            'endLine'         => 9,
                            'executableLines' => 1,
                            'executedLines'   => 1,
                            'ccn'             => 1,
                            'coverage'        => 100,
                            'crap'            => '1',
                            'link'            => 'BankAccount.php.html#6',
                            'methodName'      => 'getBalance',
                            'visibility'      => 'public',
                        ],
                        'setBalance' => [
                            'signature'       => 'setBalance($balance)',
                            'startLine'       => 11,
                            'endLine'         => 18,
                            'executableLines' => 5,
                            'executedLines'   => 0,
                            'ccn'             => 2,
                            'coverage'        => 0,
                            'crap'            => 6,
                            'link'            => 'BankAccount.php.html#11',
                            'methodName'      => 'setBalance',
                            'visibility'      => 'protected',
                        ],
                        'depositMoney' => [
                            'signature'       => 'depositMoney($balance)',
                            'startLine'       => 20,
                            'endLine'         => 25,
                            'executableLines' => 2,
                            'executedLines'   => 2,
                            'ccn'             => 1,
                            'coverage'        => 100,
                            'crap'            => '1',
                            'link'            => 'BankAccount.php.html#20',
                            'methodName'      => 'depositMoney',
                            'visibility'      => 'public',
                        ],
                        'withdrawMoney' => [
                            'signature'       => 'withdrawMoney($balance)',
                            'startLine'       => 27,
                            'endLine'         => 32,
                            'executableLines' => 2,
                            'executedLines'   => 2,
                            'ccn'             => 1,
                            'coverage'        => 100,
                            'crap'            => '1',
                            'link'            => 'BankAccount.php.html#27',
                            'methodName'      => 'withdrawMoney',
                            'visibility'      => 'public',
                        ],
                    ],
                    'startLine'       => 2,
                    'executableLines' => 10,
                    'executedLines'   => 5,
                    'ccn'             => 5,
                    'coverage'        => 50,
                    'crap'            => '8.12',
                    'package'         => [
                        'namespace'   => '',
                        'fullPackage' => '',
                        'category'    => '',
                        'package'     => '',
<<<<<<< HEAD
                        'subpackage'  => ''
                    ],
                    'link'      => 'BankAccount.php.html#2',
                    'className' => 'BankAccount'
                ]
=======
                        'subpackage'  => '',
                    ],
                    'link'      => 'BankAccount.php.html#2',
                    'className' => 'BankAccount',
                ],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            ],
            $root->getClasses()
        );

        $this->assertEquals([], $root->getFunctions());
    }

<<<<<<< HEAD
    public function testNotCrashParsing()
    {
        $coverage = $this->getCoverageForCrashParsing();
        $root = $coverage->getReport();

        $expectedPath = rtrim(TEST_FILES_PATH, DIRECTORY_SEPARATOR);
=======
    public function testNotCrashParsing(): void
    {
        $coverage = $this->getCoverageForCrashParsing();
        $root     = $coverage->getReport();

        $expectedPath = \rtrim(TEST_FILES_PATH, \DIRECTORY_SEPARATOR);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $this->assertEquals($expectedPath, $root->getName());
        $this->assertEquals($expectedPath, $root->getPath());
        $this->assertEquals(2, $root->getNumExecutableLines());
        $this->assertEquals(0, $root->getNumExecutedLines());
<<<<<<< HEAD
        $data = $coverage->getData();
        $expectedFile = $expectedPath . DIRECTORY_SEPARATOR . 'Crash.php';
        $this->assertSame([$expectedFile => [1 => [], 2 => []]], $data);
    }

    public function testBuildDirectoryStructure()
=======
        $data         = $coverage->getData();
        $expectedFile = $expectedPath . \DIRECTORY_SEPARATOR . 'Crash.php';
        $this->assertSame([$expectedFile => [1 => [], 2 => []]], $data);
    }

    public function testBuildDirectoryStructure(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $s = \DIRECTORY_SEPARATOR;

        $method = new \ReflectionMethod(
            Builder::class,
            'buildDirectoryStructure'
        );

        $method->setAccessible(true);

        $this->assertEquals(
            [
                'src' => [
                    'Money.php/f'    => [],
                    'MoneyBag.php/f' => [],
<<<<<<< HEAD
                    'Foo' => [
=======
                    'Foo'            => [
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                        'Bar' => [
                            'Baz' => [
                                'Foo.php/f' => [],
                            ],
                        ],
                    ],
<<<<<<< HEAD
                ]
=======
                ],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            ],
            $method->invoke(
                $this->factory,
                [
<<<<<<< HEAD
                    "src{$s}Money.php" => [],
                    "src{$s}MoneyBag.php" => [],
=======
                    "src{$s}Money.php"                    => [],
                    "src{$s}MoneyBag.php"                 => [],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                    "src{$s}Foo{$s}Bar{$s}Baz{$s}Foo.php" => [],
                ]
            )
        );
    }

    /**
     * @dataProvider reducePathsProvider
     */
<<<<<<< HEAD
    public function testReducePaths($reducedPaths, $commonPath, $paths)
=======
    public function testReducePaths($reducedPaths, $commonPath, $paths): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $method = new \ReflectionMethod(
            Builder::class,
            'reducePaths'
        );

        $method->setAccessible(true);

        $_commonPath = $method->invokeArgs($this->factory, [&$paths]);

        $this->assertEquals($reducedPaths, $paths);
        $this->assertEquals($commonPath, $_commonPath);
    }

    public function reducePathsProvider()
    {
        $s = \DIRECTORY_SEPARATOR;

        yield [
            [],
<<<<<<< HEAD
            ".",
            []
=======
            '.',
            [],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        ];

        $prefixes = ["C:$s", "$s"];

<<<<<<< HEAD
        foreach($prefixes as $p){
            yield [
                [
                    "Money.php" => []
                ],
                "{$p}home{$s}sb{$s}Money{$s}",
                [
                    "{$p}home{$s}sb{$s}Money{$s}Money.php" => []
                ]
=======
        foreach ($prefixes as $p) {
            yield [
                [
                    'Money.php' => [],
                ],
                "{$p}home{$s}sb{$s}Money{$s}",
                [
                    "{$p}home{$s}sb{$s}Money{$s}Money.php" => [],
                ],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            ];

            yield [
                [
<<<<<<< HEAD
                    "Money.php"    => [],
                    "MoneyBag.php" => []
=======
                    'Money.php'    => [],
                    'MoneyBag.php' => [],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                ],
                "{$p}home{$s}sb{$s}Money",
                [
                    "{$p}home{$s}sb{$s}Money{$s}Money.php"    => [],
<<<<<<< HEAD
                    "{$p}home{$s}sb{$s}Money{$s}MoneyBag.php" => []
                ]
=======
                    "{$p}home{$s}sb{$s}Money{$s}MoneyBag.php" => [],
                ],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            ];

            yield [
                [
<<<<<<< HEAD
                    "Money.php"          => [],
                    "MoneyBag.php"       => [],
=======
                    'Money.php'             => [],
                    'MoneyBag.php'          => [],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                    "Cash.phar{$s}Cash.php" => [],
                ],
                "{$p}home{$s}sb{$s}Money",
                [
<<<<<<< HEAD
                    "{$p}home{$s}sb{$s}Money{$s}Money.php"                 => [],
                    "{$p}home{$s}sb{$s}Money{$s}MoneyBag.php"              => [],
=======
                    "{$p}home{$s}sb{$s}Money{$s}Money.php"                    => [],
                    "{$p}home{$s}sb{$s}Money{$s}MoneyBag.php"                 => [],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                    "phar://{$p}home{$s}sb{$s}Money{$s}Cash.phar{$s}Cash.php" => [],
                ],
            ];
        }
    }
}
