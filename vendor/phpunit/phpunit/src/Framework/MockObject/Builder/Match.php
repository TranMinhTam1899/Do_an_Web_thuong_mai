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

/**
<<<<<<< HEAD
 * Builder interface for invocation order matches.
=======
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
interface Match extends Stub
{
    /**
     * Defines the expectation which must occur before the current is valid.
     *
     * @param string $id the identification of the expectation that should
     *                   occur before this one
     *
     * @return Stub
     */
    public function after($id);
}
