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
 * Yields a non-variadic argument's value from the request attributes.
 *
 * @author Iltar van der Berg <kjarli@gmail.com>
 */
final class RequestAttributeValueResolver implements ArgumentValueResolverInterface
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
        return !$argument->isVariadic() && $request->attributes->has($argument->getName());
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
        yield $request->attributes->get($argument->getName());
    }
}
