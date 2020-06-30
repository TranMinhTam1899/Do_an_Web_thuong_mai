<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Controller\ArgumentResolver;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

/**
 * Yields a variadic argument's values from the request attributes.
 *
 * @author Iltar van der Berg <kjarli@gmail.com>
 */
final class VariadicValueResolver implements ArgumentValueResolverInterface
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function supports(Request $request, ArgumentMetadata $argument): bool
=======
    public function supports(Request $request, ArgumentMetadata $argument)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $argument->isVariadic() && $request->attributes->has($argument->getName());
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function resolve(Request $request, ArgumentMetadata $argument): iterable
=======
    public function resolve(Request $request, ArgumentMetadata $argument)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $values = $request->attributes->get($argument->getName());

        if (!\is_array($values)) {
            throw new \InvalidArgumentException(sprintf('The action argument "...$%1$s" is required to be an array, the request attribute "%1$s" contains a type of "%2$s" instead.', $argument->getName(), \gettype($values)));
        }

<<<<<<< HEAD
        yield from $values;
=======
        foreach ($values as $value) {
            yield $value;
        }
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
