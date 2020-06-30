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
namespace PHPUnit\Framework\MockObject\Builder;

<<<<<<< HEAD
use PHPUnit\Framework\MockObject\Stub as BaseStub;

/**
 * Builder interface for stubs which are actions replacing an invocation.
=======
use PHPUnit\Framework\MockObject\Stub\Stub as BaseStub;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
interface Stub extends Identity
{
    /**
     * Stubs the matching method with the stub object $stub. Any invocations of
     * the matched method will now be handled by the stub instead.
<<<<<<< HEAD
     *
     * @return Identity
     */
    public function will(BaseStub $stub);
=======
     */
    public function will(BaseStub $stub): Identity;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
