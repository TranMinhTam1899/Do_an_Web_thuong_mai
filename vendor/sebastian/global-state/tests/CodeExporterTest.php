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

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
namespace SebastianBergmann\GlobalState;

use PHPUnit\Framework\TestCase;

/**
 * @covers \SebastianBergmann\GlobalState\CodeExporter
 */
<<<<<<< HEAD
class CodeExporterTest extends TestCase
=======
final class CodeExporterTest extends TestCase
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @runInSeparateProcess
     */
<<<<<<< HEAD
    public function testCanExportGlobalVariablesToCode()
=======
    public function testCanExportGlobalVariablesToCode(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $GLOBALS = ['foo' => 'bar'];

        $snapshot = new Snapshot(null, true, false, false, false, false, false, false, false, false);

        $exporter = new CodeExporter;

        $this->assertEquals(
<<<<<<< HEAD
            '$GLOBALS = [];' . PHP_EOL . '$GLOBALS[\'foo\'] = \'bar\';' . PHP_EOL,
=======
            '$GLOBALS = [];' . \PHP_EOL . '$GLOBALS[\'foo\'] = \'bar\';' . \PHP_EOL,
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            $exporter->globalVariables($snapshot)
        );
    }
}
