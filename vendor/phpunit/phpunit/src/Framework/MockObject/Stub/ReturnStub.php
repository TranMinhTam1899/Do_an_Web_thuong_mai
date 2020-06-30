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
namespace PHPUnit\Framework\MockObject\Stub;

use PHPUnit\Framework\MockObject\Invocation;
<<<<<<< HEAD
use PHPUnit\Framework\MockObject\Stub;
use SebastianBergmann\Exporter\Exporter;

/**
 * Stubs a method by returning a user-defined value.
 */
class ReturnStub implements Stub
=======
use SebastianBergmann\Exporter\Exporter;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class ReturnStub implements Stub
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    /**
     * @var mixed
     */
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function invoke(Invocation $invocation)
    {
        return $this->value;
    }

    public function toString(): string
    {
        $exporter = new Exporter;

        return \sprintf(
            'return user-specified value %s',
            $exporter->export($this->value)
        );
    }
}
