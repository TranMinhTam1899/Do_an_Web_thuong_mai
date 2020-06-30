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
 * Builder interface for unique identifiers.
 *
 * Defines the interface for recording unique identifiers. The identifiers
 * can be used to define the invocation order of expectations. The expectation
 * is recorded using id() and then defined in order using
 * PHPUnit\Framework\MockObject\Builder\Match::after().
=======
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
interface Identity
{
    /**
     * Sets the identification of the expectation to $id.
     *
     * @note The identifier is unique per mock object.
     *
     * @param string $id unique identification of expectation
     */
    public function id($id);
}
