<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\VarDumper\Test;

use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
trait VarDumperTestTrait
{
<<<<<<< HEAD
    /**
     * @internal
     */
    private $varDumperConfig = [
        'casters' => [],
        'flags' => null,
    ];

    protected function setUpVarDumper(array $casters, int $flags = null): void
    {
        $this->varDumperConfig['casters'] = $casters;
        $this->varDumperConfig['flags'] = $flags;
    }

    /**
     * @after
     */
    protected function tearDownVarDumper(): void
    {
        $this->varDumperConfig['casters'] = [];
        $this->varDumperConfig['flags'] = null;
    }

=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function assertDumpEquals($expected, $data, $filter = 0, $message = '')
    {
        $this->assertSame($this->prepareExpectation($expected, $filter), $this->getDump($data, null, $filter), $message);
    }

    public function assertDumpMatchesFormat($expected, $data, $filter = 0, $message = '')
    {
        $this->assertStringMatchesFormat($this->prepareExpectation($expected, $filter), $this->getDump($data, null, $filter), $message);
    }

    /**
     * @return string|null
     */
    protected function getDump($data, $key = null, $filter = 0)
    {
<<<<<<< HEAD
        if (null === $flags = $this->varDumperConfig['flags']) {
            $flags = getenv('DUMP_LIGHT_ARRAY') ? CliDumper::DUMP_LIGHT_ARRAY : 0;
            $flags |= getenv('DUMP_STRING_LENGTH') ? CliDumper::DUMP_STRING_LENGTH : 0;
            $flags |= getenv('DUMP_COMMA_SEPARATOR') ? CliDumper::DUMP_COMMA_SEPARATOR : 0;
        }

        $cloner = new VarCloner();
        $cloner->addCasters($this->varDumperConfig['casters']);
=======
        $flags = getenv('DUMP_LIGHT_ARRAY') ? CliDumper::DUMP_LIGHT_ARRAY : 0;
        $flags |= getenv('DUMP_STRING_LENGTH') ? CliDumper::DUMP_STRING_LENGTH : 0;
        $flags |= getenv('DUMP_COMMA_SEPARATOR') ? CliDumper::DUMP_COMMA_SEPARATOR : 0;

        $cloner = new VarCloner();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $cloner->setMaxItems(-1);
        $dumper = new CliDumper(null, null, $flags);
        $dumper->setColors(false);
        $data = $cloner->cloneVar($data, $filter)->withRefHandles(false);
        if (null !== $key && null === $data = $data->seek($key)) {
            return null;
        }

        return rtrim($dumper->dump($data, true));
    }

<<<<<<< HEAD
    private function prepareExpectation($expected, int $filter): string
=======
    private function prepareExpectation($expected, $filter)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!\is_string($expected)) {
            $expected = $this->getDump($expected, null, $filter);
        }

        return rtrim($expected);
    }
}
