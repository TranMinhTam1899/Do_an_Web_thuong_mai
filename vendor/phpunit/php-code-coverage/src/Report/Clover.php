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
namespace SebastianBergmann\CodeCoverage\Report;

use SebastianBergmann\CodeCoverage\CodeCoverage;
use SebastianBergmann\CodeCoverage\Node\File;
use SebastianBergmann\CodeCoverage\RuntimeException;

/**
 * Generates a Clover XML logfile from a code coverage object.
 */
final class Clover
{
    /**
     * @throws \RuntimeException
     */
    public function process(CodeCoverage $coverage, ?string $target = null, ?string $name = null): string
    {
        $xmlDocument               = new \DOMDocument('1.0', 'UTF-8');
        $xmlDocument->formatOutput = true;

        $xmlCoverage = $xmlDocument->createElement('coverage');
<<<<<<< HEAD
        $xmlCoverage->setAttribute('generated', (int) $_SERVER['REQUEST_TIME']);
        $xmlDocument->appendChild($xmlCoverage);

        $xmlProject = $xmlDocument->createElement('project');
        $xmlProject->setAttribute('timestamp', (int) $_SERVER['REQUEST_TIME']);
=======
        $xmlCoverage->setAttribute('generated', (string) $_SERVER['REQUEST_TIME']);
        $xmlDocument->appendChild($xmlCoverage);

        $xmlProject = $xmlDocument->createElement('project');
        $xmlProject->setAttribute('timestamp', (string) $_SERVER['REQUEST_TIME']);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        if (\is_string($name)) {
            $xmlProject->setAttribute('name', $name);
        }

        $xmlCoverage->appendChild($xmlProject);

        $packages = [];
        $report   = $coverage->getReport();

        foreach ($report as $item) {
            if (!$item instanceof File) {
                continue;
            }

            /* @var File $item */

            $xmlFile = $xmlDocument->createElement('file');
            $xmlFile->setAttribute('name', $item->getPath());

            $classes      = $item->getClassesAndTraits();
            $coverageData = $item->getCoverageData();
            $lines        = [];
            $namespace    = 'global';

            foreach ($classes as $className => $class) {
                $classStatements        = 0;
                $coveredClassStatements = 0;
                $coveredMethods         = 0;
                $classMethods           = 0;

                foreach ($class['methods'] as $methodName => $method) {
                    if ($method['executableLines'] == 0) {
                        continue;
                    }

                    $classMethods++;
                    $classStatements += $method['executableLines'];
                    $coveredClassStatements += $method['executedLines'];

                    if ($method['coverage'] == 100) {
                        $coveredMethods++;
                    }

                    $methodCount = 0;

                    foreach (\range($method['startLine'], $method['endLine']) as $line) {
                        if (isset($coverageData[$line]) && ($coverageData[$line] !== null)) {
                            $methodCount = \max($methodCount, \count($coverageData[$line]));
                        }
                    }

                    $lines[$method['startLine']] = [
                        'ccn'         => $method['ccn'],
                        'count'       => $methodCount,
                        'crap'        => $method['crap'],
                        'type'        => 'method',
                        'visibility'  => $method['visibility'],
                        'name'        => $methodName,
                    ];
                }

                if (!empty($class['package']['namespace'])) {
                    $namespace = $class['package']['namespace'];
                }

                $xmlClass = $xmlDocument->createElement('class');
                $xmlClass->setAttribute('name', $className);
                $xmlClass->setAttribute('namespace', $namespace);

                if (!empty($class['package']['fullPackage'])) {
                    $xmlClass->setAttribute(
                        'fullPackage',
                        $class['package']['fullPackage']
                    );
                }

                if (!empty($class['package']['category'])) {
                    $xmlClass->setAttribute(
                        'category',
                        $class['package']['category']
                    );
                }

                if (!empty($class['package']['package'])) {
                    $xmlClass->setAttribute(
                        'package',
                        $class['package']['package']
                    );
                }

                if (!empty($class['package']['subpackage'])) {
                    $xmlClass->setAttribute(
                        'subpackage',
                        $class['package']['subpackage']
                    );
                }

                $xmlFile->appendChild($xmlClass);

                $xmlMetrics = $xmlDocument->createElement('metrics');
<<<<<<< HEAD
                $xmlMetrics->setAttribute('complexity', $class['ccn']);
                $xmlMetrics->setAttribute('methods', $classMethods);
                $xmlMetrics->setAttribute('coveredmethods', $coveredMethods);
                $xmlMetrics->setAttribute('conditionals', 0);
                $xmlMetrics->setAttribute('coveredconditionals', 0);
                $xmlMetrics->setAttribute('statements', $classStatements);
                $xmlMetrics->setAttribute('coveredstatements', $coveredClassStatements);
                $xmlMetrics->setAttribute('elements', $classMethods + $classStatements /* + conditionals */);
                $xmlMetrics->setAttribute('coveredelements', $coveredMethods + $coveredClassStatements /* + coveredconditionals */);
=======
                $xmlMetrics->setAttribute('complexity', (string) $class['ccn']);
                $xmlMetrics->setAttribute('methods', (string) $classMethods);
                $xmlMetrics->setAttribute('coveredmethods', (string) $coveredMethods);
                $xmlMetrics->setAttribute('conditionals', '0');
                $xmlMetrics->setAttribute('coveredconditionals', '0');
                $xmlMetrics->setAttribute('statements', (string) $classStatements);
                $xmlMetrics->setAttribute('coveredstatements', (string) $coveredClassStatements);
                $xmlMetrics->setAttribute('elements', (string) ($classMethods + $classStatements /* + conditionals */));
                $xmlMetrics->setAttribute('coveredelements', (string) ($coveredMethods + $coveredClassStatements /* + coveredconditionals */));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                $xmlClass->appendChild($xmlMetrics);
            }

            foreach ($coverageData as $line => $data) {
                if ($data === null || isset($lines[$line])) {
                    continue;
                }

                $lines[$line] = [
                    'count' => \count($data), 'type' => 'stmt',
                ];
            }

            \ksort($lines);

            foreach ($lines as $line => $data) {
                $xmlLine = $xmlDocument->createElement('line');
<<<<<<< HEAD
                $xmlLine->setAttribute('num', $line);
=======
                $xmlLine->setAttribute('num', (string) $line);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                $xmlLine->setAttribute('type', $data['type']);

                if (isset($data['name'])) {
                    $xmlLine->setAttribute('name', $data['name']);
                }

                if (isset($data['visibility'])) {
                    $xmlLine->setAttribute('visibility', $data['visibility']);
                }

                if (isset($data['ccn'])) {
<<<<<<< HEAD
                    $xmlLine->setAttribute('complexity', $data['ccn']);
                }

                if (isset($data['crap'])) {
                    $xmlLine->setAttribute('crap', $data['crap']);
                }

                $xmlLine->setAttribute('count', $data['count']);
=======
                    $xmlLine->setAttribute('complexity', (string) $data['ccn']);
                }

                if (isset($data['crap'])) {
                    $xmlLine->setAttribute('crap', (string) $data['crap']);
                }

                $xmlLine->setAttribute('count', (string) $data['count']);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                $xmlFile->appendChild($xmlLine);
            }

            $linesOfCode = $item->getLinesOfCode();

            $xmlMetrics = $xmlDocument->createElement('metrics');
<<<<<<< HEAD
            $xmlMetrics->setAttribute('loc', $linesOfCode['loc']);
            $xmlMetrics->setAttribute('ncloc', $linesOfCode['ncloc']);
            $xmlMetrics->setAttribute('classes', $item->getNumClassesAndTraits());
            $xmlMetrics->setAttribute('methods', $item->getNumMethods());
            $xmlMetrics->setAttribute('coveredmethods', $item->getNumTestedMethods());
            $xmlMetrics->setAttribute('conditionals', 0);
            $xmlMetrics->setAttribute('coveredconditionals', 0);
            $xmlMetrics->setAttribute('statements', $item->getNumExecutableLines());
            $xmlMetrics->setAttribute('coveredstatements', $item->getNumExecutedLines());
            $xmlMetrics->setAttribute('elements', $item->getNumMethods() + $item->getNumExecutableLines() /* + conditionals */);
            $xmlMetrics->setAttribute('coveredelements', $item->getNumTestedMethods() + $item->getNumExecutedLines() /* + coveredconditionals */);
=======
            $xmlMetrics->setAttribute('loc', (string) $linesOfCode['loc']);
            $xmlMetrics->setAttribute('ncloc', (string) $linesOfCode['ncloc']);
            $xmlMetrics->setAttribute('classes', (string) $item->getNumClassesAndTraits());
            $xmlMetrics->setAttribute('methods', (string) $item->getNumMethods());
            $xmlMetrics->setAttribute('coveredmethods', (string) $item->getNumTestedMethods());
            $xmlMetrics->setAttribute('conditionals', '0');
            $xmlMetrics->setAttribute('coveredconditionals', '0');
            $xmlMetrics->setAttribute('statements', (string) $item->getNumExecutableLines());
            $xmlMetrics->setAttribute('coveredstatements', (string) $item->getNumExecutedLines());
            $xmlMetrics->setAttribute('elements', (string) ($item->getNumMethods() + $item->getNumExecutableLines() /* + conditionals */));
            $xmlMetrics->setAttribute('coveredelements', (string) ($item->getNumTestedMethods() + $item->getNumExecutedLines() /* + coveredconditionals */));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $xmlFile->appendChild($xmlMetrics);

            if ($namespace === 'global') {
                $xmlProject->appendChild($xmlFile);
            } else {
                if (!isset($packages[$namespace])) {
                    $packages[$namespace] = $xmlDocument->createElement(
                        'package'
                    );

                    $packages[$namespace]->setAttribute('name', $namespace);
                    $xmlProject->appendChild($packages[$namespace]);
                }

                $packages[$namespace]->appendChild($xmlFile);
            }
        }

        $linesOfCode = $report->getLinesOfCode();

        $xmlMetrics = $xmlDocument->createElement('metrics');
<<<<<<< HEAD
        $xmlMetrics->setAttribute('files', \count($report));
        $xmlMetrics->setAttribute('loc', $linesOfCode['loc']);
        $xmlMetrics->setAttribute('ncloc', $linesOfCode['ncloc']);
        $xmlMetrics->setAttribute('classes', $report->getNumClassesAndTraits());
        $xmlMetrics->setAttribute('methods', $report->getNumMethods());
        $xmlMetrics->setAttribute('coveredmethods', $report->getNumTestedMethods());
        $xmlMetrics->setAttribute('conditionals', 0);
        $xmlMetrics->setAttribute('coveredconditionals', 0);
        $xmlMetrics->setAttribute('statements', $report->getNumExecutableLines());
        $xmlMetrics->setAttribute('coveredstatements', $report->getNumExecutedLines());
        $xmlMetrics->setAttribute('elements', $report->getNumMethods() + $report->getNumExecutableLines() /* + conditionals */);
        $xmlMetrics->setAttribute('coveredelements', $report->getNumTestedMethods() + $report->getNumExecutedLines() /* + coveredconditionals */);
=======
        $xmlMetrics->setAttribute('files', (string) \count($report));
        $xmlMetrics->setAttribute('loc', (string) $linesOfCode['loc']);
        $xmlMetrics->setAttribute('ncloc', (string) $linesOfCode['ncloc']);
        $xmlMetrics->setAttribute('classes', (string) $report->getNumClassesAndTraits());
        $xmlMetrics->setAttribute('methods', (string) $report->getNumMethods());
        $xmlMetrics->setAttribute('coveredmethods', (string) $report->getNumTestedMethods());
        $xmlMetrics->setAttribute('conditionals', '0');
        $xmlMetrics->setAttribute('coveredconditionals', '0');
        $xmlMetrics->setAttribute('statements', (string) $report->getNumExecutableLines());
        $xmlMetrics->setAttribute('coveredstatements', (string) $report->getNumExecutedLines());
        $xmlMetrics->setAttribute('elements', (string) ($report->getNumMethods() + $report->getNumExecutableLines() /* + conditionals */));
        $xmlMetrics->setAttribute('coveredelements', (string) ($report->getNumTestedMethods() + $report->getNumExecutedLines() /* + coveredconditionals */));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $xmlProject->appendChild($xmlMetrics);

        $buffer = $xmlDocument->saveXML();

        if ($target !== null) {
            if (!$this->createDirectory(\dirname($target))) {
                throw new \RuntimeException(\sprintf('Directory "%s" was not created', \dirname($target)));
            }

            if (@\file_put_contents($target, $buffer) === false) {
                throw new RuntimeException(
                    \sprintf(
                        'Could not write to "%s',
                        $target
                    )
                );
            }
        }

        return $buffer;
    }

    private function createDirectory(string $directory): bool
    {
        return !(!\is_dir($directory) && !@\mkdir($directory, 0777, true) && !\is_dir($directory));
    }
}
