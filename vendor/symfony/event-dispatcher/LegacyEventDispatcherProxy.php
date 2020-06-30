<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\EventDispatcher;

use Psr\EventDispatcher\StoppableEventInterface;
use Symfony\Contracts\EventDispatcher\Event as ContractsEvent;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface as ContractsEventDispatcherInterface;

/**
 * A helper class to provide BC/FC with the legacy signature of EventDispatcherInterface::dispatch().
 *
 * This class should be deprecated in Symfony 5.1
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
final class LegacyEventDispatcherProxy implements EventDispatcherInterface
{
    private $dispatcher;

    public static function decorate(?ContractsEventDispatcherInterface $dispatcher): ?ContractsEventDispatcherInterface
    {
        if (null === $dispatcher) {
            return null;
        }
        $r = new \ReflectionMethod($dispatcher, 'dispatch');
        $param2 = $r->getParameters()[1] ?? null;

        if (!$param2 || !$param2->hasType() || $param2->getType()->isBuiltin()) {
            return $dispatcher;
        }

        @trigger_error(sprintf('The signature of the "%s::dispatch()" method should be updated to "dispatch($event, string $eventName = null)", not doing so is deprecated since Symfony 4.3.', $r->class), E_USER_DEPRECATED);

        $self = new self();
        $self->dispatcher = $dispatcher;

        return $self;
    }

    /**
     * {@inheritdoc}
     *
     * @param string|null $eventName
     *
     * @return object
     */
    public function dispatch($event/*, string $eventName = null*/)
    {
        $eventName = 1 < \func_num_args() ? func_get_arg(1) : null;

        if (\is_object($event)) {
            $eventName = $eventName ?? \get_class($event);
<<<<<<< HEAD
        } elseif (\is_string($event) && (null === $eventName || $eventName instanceof ContractsEvent || $eventName instanceof Event)) {
=======
        } elseif (\is_string($event) && (null === $eventName || $eventName instanceof Event)) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            @trigger_error(sprintf('Calling the "%s::dispatch()" method with the event name as the first argument is deprecated since Symfony 4.3, pass it as the second argument and provide the event object as the first argument instead.', ContractsEventDispatcherInterface::class), E_USER_DEPRECATED);
            $swap = $event;
            $event = $eventName ?? new Event();
            $eventName = $swap;
        } else {
<<<<<<< HEAD
            throw new \TypeError(sprintf('Argument 1 passed to "%s::dispatch()" must be an object, "%s" given.', ContractsEventDispatcherInterface::class, \is_object($event) ? \get_class($event) : \gettype($event)));
=======
            throw new \TypeError(sprintf('Argument 1 passed to "%s::dispatch()" must be an object, %s given.', ContractsEventDispatcherInterface::class, \is_object($event) ? \get_class($event) : \gettype($event)));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        $listeners = $this->getListeners($eventName);
        $stoppable = $event instanceof Event || $event instanceof ContractsEvent || $event instanceof StoppableEventInterface;

        foreach ($listeners as $listener) {
            if ($stoppable && $event->isPropagationStopped()) {
                break;
            }
            $listener($event, $eventName, $this);
        }

        return $event;
    }

    /**
     * {@inheritdoc}
     */
    public function addListener($eventName, $listener, $priority = 0)
    {
        return $this->dispatcher->addListener($eventName, $listener, $priority);
    }

    /**
     * {@inheritdoc}
     */
    public function addSubscriber(EventSubscriberInterface $subscriber)
    {
        return $this->dispatcher->addSubscriber($subscriber);
    }

    /**
     * {@inheritdoc}
     */
    public function removeListener($eventName, $listener)
    {
        return $this->dispatcher->removeListener($eventName, $listener);
    }

    /**
     * {@inheritdoc}
     */
    public function removeSubscriber(EventSubscriberInterface $subscriber)
    {
        return $this->dispatcher->removeSubscriber($subscriber);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getListeners($eventName = null): array
=======
    public function getListeners($eventName = null)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->dispatcher->getListeners($eventName);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getListenerPriority($eventName, $listener): ?int
=======
    public function getListenerPriority($eventName, $listener)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->dispatcher->getListenerPriority($eventName, $listener);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function hasListeners($eventName = null): bool
=======
    public function hasListeners($eventName = null)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        return $this->dispatcher->hasListeners($eventName);
    }

    /**
     * Proxies all method calls to the original event dispatcher.
     */
    public function __call($method, $arguments)
    {
        return $this->dispatcher->{$method}(...$arguments);
    }
}
