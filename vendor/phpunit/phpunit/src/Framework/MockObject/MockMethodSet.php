<<<<<<< HEAD
<?php
declare(strict_types=1);
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
namespace PHPUnit\Framework\MockObject;

<<<<<<< HEAD
=======
/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
final class MockMethodSet
{
    /**
     * @var MockMethod[]
     */
    private $methods = [];

    public function addMethods(MockMethod ...$methods): void
    {
        foreach ($methods as $method) {
            $this->methods[\strtolower($method->getName())] = $method;
        }
    }

<<<<<<< HEAD
=======
    /**
     * @return MockMethod[]
     */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function asArray(): array
    {
        return \array_values($this->methods);
    }

    public function hasMethod(string $methodName): bool
    {
        return \array_key_exists(\strtolower($methodName), $this->methods);
    }
}
