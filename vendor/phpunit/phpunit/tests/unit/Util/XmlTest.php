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
namespace PHPUnit\Util;

use PHPUnit\Framework\Exception;
use PHPUnit\Framework\TestCase;

<<<<<<< HEAD
class XmlTest extends TestCase
=======
/**
 * @small
 */
final class XmlTest extends TestCase
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @dataProvider charProvider
     */
    public function testPrepareString(string $char): void
    {
        $e = null;

        $escapedString = Xml::prepareString($char);
        $xml           = "<?xml version='1.0' encoding='UTF-8' ?><tag>$escapedString</tag>";
        $dom           = new \DOMDocument('1.0', 'UTF-8');

        try {
            $dom->loadXML($xml);
        } catch (Exception $e) {
        }

        $this->assertNull(
            $e,
            \sprintf(
                '\PHPUnit\Util\Xml::prepareString("\x%02x") should not crash DomDocument',
                \ord($char)
            )
        );
    }

    public function charProvider(): array
    {
        $data = [];

        for ($i = 0; $i < 256; $i++) {
            $data[] = [\chr($i)];
        }

        return $data;
    }

    public function testLoadEmptyString(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Could not load XML from empty string');

        Xml::load('');
    }

    public function testLoadArray(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Could not load XML from array');

        Xml::load([1, 2, 3]);
    }

    public function testLoadBoolean(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Could not load XML from boolean');

        Xml::load(false);
    }

<<<<<<< HEAD
=======
    /**
     * @testdox Nested xmlToVariable()
     */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function testNestedXmlToVariable(): void
    {
        $xml = '<array><element key="a"><array><element key="b"><string>foo</string></element></array></element><element key="c"><string>bar</string></element></array>';
        $dom = new \DOMDocument;
        $dom->loadXML($xml);

        $expected = [
            'a' => [
                'b' => 'foo',
            ],
            'c' => 'bar',
        ];

        $actual = Xml::xmlToVariable($dom->documentElement);

        $this->assertSame($expected, $actual);
    }

<<<<<<< HEAD
=======
    /**
     * @testdox xmlToVariable() can handle multiple of the same argument type
     */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function testXmlToVariableCanHandleMultipleOfTheSameArgumentType(): void
    {
        $xml = '<object class="SampleClass"><arguments><string>a</string><string>b</string><string>c</string></arguments></object>';
        $dom = new \DOMDocument;
        $dom->loadXML($xml);

        $expected = ['a' => 'a', 'b' => 'b', 'c' => 'c'];

        $actual = Xml::xmlToVariable($dom->documentElement);

        $this->assertSame($expected, (array) $actual);
    }

<<<<<<< HEAD
=======
    /**
     * @testdox xmlToVariable() can construct objects with constructor arguments recursively
     */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function testXmlToVariableCanConstructObjectsWithConstructorArgumentsRecursively(): void
    {
        $xml = '<object class="Exception"><arguments><string>one</string><integer>0</integer><object class="Exception"><arguments><string>two</string></arguments></object></arguments></object>';
        $dom = new \DOMDocument;
        $dom->loadXML($xml);

        $actual = Xml::xmlToVariable($dom->documentElement);

        $this->assertEquals('one', $actual->getMessage());
        $this->assertEquals('two', $actual->getPrevious()->getMessage());
    }
}
