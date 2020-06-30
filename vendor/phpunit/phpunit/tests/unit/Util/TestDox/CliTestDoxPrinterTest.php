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
namespace PHPUnit\Util\TestDox;

use Exception;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Warning;

<<<<<<< HEAD
=======
/**
 * @group testdox
 * @small
 */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
final class CliTestDoxPrinterTest extends TestCase
{
    /**
     * @var TestableCliTestDoxPrinter
     */
    private $printer;

    /**
     * @var TestableCliTestDoxPrinter
     */
    private $verbosePrinter;

    protected function setUp(): void
    {
        $this->printer        = new TestableCliTestDoxPrinter;
        $this->verbosePrinter = new TestableCliTestDoxPrinter(null, true);
    }

    protected function tearDown(): void
    {
        $this->printer        = null;
        $this->verbosePrinter = null;
    }

    public function testPrintsTheClassNameOfTheTestClass(): void
    {
        $this->printer->startTest($this);
        $this->printer->endTest($this, 0);

<<<<<<< HEAD
        $this->assertStringStartsWith('PHPUnit\Util\TestDox\CliTestDoxPrinter', $this->printer->getBuffer());
=======
        $this->assertStringStartsWith('Cli Test Dox Printer (PHPUnit\Util\TestDox\CliTestDoxPrinter)', $this->printer->getBuffer());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function testPrintsThePrettifiedMethodName(): void
    {
        $this->printer->startTest($this);
        $this->printer->endTest($this, 0.001);

<<<<<<< HEAD
        $this->assertContains('Prints the prettified method name', $this->printer->getBuffer());
=======
        $this->assertStringContainsString('Prints the prettified method name', $this->printer->getBuffer());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function testPrintsCheckMarkForSuccessfulTest(): void
    {
        $this->printer->startTest($this);
        $this->printer->endTest($this, 0.001);

<<<<<<< HEAD
        $this->assertContains('✔', $this->printer->getBuffer());
=======
        $this->assertStringContainsString('✔', $this->printer->getBuffer());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function testDoesNotPrintAdditionalInformationForSuccessfulTest(): void
    {
        $this->printer->startTest($this);
        $this->printer->endTest($this, 0.001);

<<<<<<< HEAD
        $this->assertNotContains('│', $this->printer->getBuffer());
=======
        $this->assertStringNotContainsString('│', $this->printer->getBuffer());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function testPrintsCrossForTestWithError(): void
    {
        $this->printer->startTest($this);
        $this->printer->addError($this, new Exception, 0);
        $this->printer->endTest($this, 0.001);

<<<<<<< HEAD
        $this->assertContains('✘', $this->printer->getBuffer());
=======
        $this->assertStringContainsString('✘', $this->printer->getBuffer());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function testPrintsAdditionalInformationForTestWithError(): void
    {
        $this->printer->startTest($this);
        $this->printer->addError($this, new Exception, 0);
        $this->printer->endTest($this, 0.001);

<<<<<<< HEAD
        $this->assertContains('│', $this->printer->getBuffer());
    }

    public function testPrintsCrossForTestWithWarning(): void
=======
        $this->assertStringContainsString('│', $this->printer->getBuffer());
    }

    public function testPrintsWarningTriangleForTestWithWarning(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->printer->startTest($this);
        $this->printer->addWarning($this, new Warning, 0);
        $this->printer->endTest($this, 0.001);

<<<<<<< HEAD
        $this->assertContains('✘', $this->printer->getBuffer());
=======
        $this->assertStringContainsString('⚠', $this->printer->getBuffer());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function testPrintsAdditionalInformationForTestWithWarning(): void
    {
        $this->printer->startTest($this);
        $this->printer->addWarning($this, new Warning, 0);
        $this->printer->endTest($this, 0.001);

<<<<<<< HEAD
        $this->assertContains('│', $this->printer->getBuffer());
=======
        $this->assertStringContainsString('│', $this->printer->getBuffer());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function testPrintsCrossForTestWithFailure(): void
    {
        $this->printer->startTest($this);
        $this->printer->addFailure($this, new AssertionFailedError, 0);
        $this->printer->endTest($this, 0.001);

<<<<<<< HEAD
        $this->assertContains('✘', $this->printer->getBuffer());
=======
        $this->assertStringContainsString('✘', $this->printer->getBuffer());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function testPrintsAdditionalInformationForTestWithFailure(): void
    {
        $this->printer->startTest($this);
        $this->printer->addFailure($this, new AssertionFailedError, 0);
        $this->printer->endTest($this, 0.001);

<<<<<<< HEAD
        $this->assertContains('│', $this->printer->getBuffer());
=======
        $this->assertStringContainsString('│', $this->printer->getBuffer());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function testPrintsEmptySetSymbolForTestWithFailure(): void
    {
        $this->printer->startTest($this);
        $this->printer->addIncompleteTest($this, new Exception, 0);
        $this->printer->endTest($this, 0.001);

<<<<<<< HEAD
        $this->assertContains('∅', $this->printer->getBuffer());
=======
        $this->assertStringContainsString('∅', $this->printer->getBuffer());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function testDoesNotPrintAdditionalInformationForIncompleteTestByDefault(): void
    {
        $this->printer->startTest($this);
        $this->printer->addIncompleteTest($this, new Exception, 0);
        $this->printer->endTest($this, 0.001);

<<<<<<< HEAD
        $this->assertNotContains('│', $this->printer->getBuffer());
=======
        $this->assertStringNotContainsString('│', $this->printer->getBuffer());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function testPrintsAdditionalInformationForIncompleteTestInVerboseMode(): void
    {
        $this->verbosePrinter->startTest($this);
        $this->verbosePrinter->addIncompleteTest($this, new Exception('E_X_C_E_P_T_I_O_N'), 0);
        $this->verbosePrinter->endTest($this, 0.001);

<<<<<<< HEAD
        $this->assertContains('│', $this->verbosePrinter->getBuffer());
        $this->assertContains('E_X_C_E_P_T_I_O_N', $this->verbosePrinter->getBuffer());
=======
        $this->assertStringContainsString('│', $this->verbosePrinter->getBuffer());
        $this->assertStringContainsString('E_X_C_E_P_T_I_O_N', $this->verbosePrinter->getBuffer());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function testPrintsRadioactiveSymbolForRiskyTest(): void
    {
        $this->printer->startTest($this);
        $this->printer->addRiskyTest($this, new Exception, 0);
        $this->printer->endTest($this, 0.001);

<<<<<<< HEAD
        $this->assertContains('☢', $this->printer->getBuffer());
=======
        $this->assertStringContainsString('☢', $this->printer->getBuffer());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function testDoesNotPrintAdditionalInformationForRiskyTestByDefault(): void
    {
        $this->printer->startTest($this);
        $this->printer->addRiskyTest($this, new Exception, 0);
        $this->printer->endTest($this, 0.001);

<<<<<<< HEAD
        $this->assertNotContains('│', $this->printer->getBuffer());
=======
        $this->assertStringNotContainsString('│', $this->printer->getBuffer());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function testPrintsAdditionalInformationForRiskyTestInVerboseMode(): void
    {
        $this->verbosePrinter->startTest($this);
        $this->verbosePrinter->addRiskyTest($this, new Exception, 0);
        $this->verbosePrinter->endTest($this, 0.001);

<<<<<<< HEAD
        $this->assertContains('│', $this->verbosePrinter->getBuffer());
=======
        $this->assertStringContainsString('│', $this->verbosePrinter->getBuffer());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function testPrintsArrowForSkippedTest(): void
    {
        $this->printer->startTest($this);
        $this->printer->addSkippedTest($this, new Exception, 0);
        $this->printer->endTest($this, 0.001);

<<<<<<< HEAD
        $this->assertContains('→', $this->printer->getBuffer());
=======
        $this->assertStringContainsString('↩', $this->printer->getBuffer());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function testDoesNotPrintAdditionalInformationForSkippedTestByDefault(): void
    {
        $this->printer->startTest($this);
        $this->printer->addSkippedTest($this, new Exception, 0);
        $this->printer->endTest($this, 0.001);

<<<<<<< HEAD
        $this->assertNotContains('│', $this->printer->getBuffer());
=======
        $this->assertStringNotContainsString('│', $this->printer->getBuffer());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function testPrintsAdditionalInformationForSkippedTestInVerboseMode(): void
    {
        $this->verbosePrinter->startTest($this);
        $this->verbosePrinter->addSkippedTest($this, new Exception('S_K_I_P_P_E_D'), 0);
        $this->verbosePrinter->endTest($this, 0.001);

<<<<<<< HEAD
        $this->assertContains('│', $this->verbosePrinter->getBuffer());
        $this->assertContains('S_K_I_P_P_E_D', $this->verbosePrinter->getBuffer());
=======
        $this->assertStringContainsString('│', $this->verbosePrinter->getBuffer());
        $this->assertStringContainsString('S_K_I_P_P_E_D', $this->verbosePrinter->getBuffer());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
