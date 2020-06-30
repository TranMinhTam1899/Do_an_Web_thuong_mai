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

class StopOnErrorTestSuite extends \PHPUnit\Framework\TestCase
{
<<<<<<< HEAD
    public function testIncomplete()
=======
    public function testIncomplete(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->markTestIncomplete();
    }

<<<<<<< HEAD
    public function testWithError()
=======
    public function testWithError(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->assertTrue(true);

        throw new Error('StopOnErrorTestSuite_error');
    }

<<<<<<< HEAD
    public function testThatIsNeverReached()
=======
    public function testThatIsNeverReached(): void
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->assertTrue(true);
    }
}
