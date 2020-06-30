<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\EventListener;

use Psr\Log\LoggerInterface;
<<<<<<< HEAD
use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
=======
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;

<<<<<<< HEAD
@trigger_error(sprintf('The "%s" class is deprecated since Symfony 4.4, use "ErrorListener" instead.', ExceptionListener::class), E_USER_DEPRECATED);

/**
 * @deprecated since Symfony 4.4, use ErrorListener instead
=======
/**
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @final since Symfony 4.3
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
class ExceptionListener implements EventSubscriberInterface
{
    protected $controller;
    protected $logger;
    protected $debug;

    public function __construct($controller, LoggerInterface $logger = null, $debug = false)
    {
        $this->controller = $controller;
        $this->logger = $logger;
        $this->debug = $debug;
    }

    public function logKernelException(GetResponseForExceptionEvent $event)
    {
<<<<<<< HEAD
        $e = FlattenException::createFromThrowable($event->getException());
=======
        $e = FlattenException::create($event->getException());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        $this->logException($event->getException(), sprintf('Uncaught PHP Exception %s: "%s" at %s line %s', $e->getClass(), $e->getMessage(), $e->getFile(), $e->getLine()));
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        if (null === $this->controller) {
            return;
        }

        $exception = $event->getException();
        $request = $this->duplicateRequest($exception, $event->getRequest());
        $eventDispatcher = \func_num_args() > 2 ? func_get_arg(2) : null;

        try {
            $response = $event->getKernel()->handle($request, HttpKernelInterface::SUB_REQUEST, false);
        } catch (\Exception $e) {
<<<<<<< HEAD
            $f = FlattenException::createFromThrowable($e);
=======
            $f = FlattenException::create($e);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

            $this->logException($e, sprintf('Exception thrown when handling an exception (%s: %s at %s line %s)', $f->getClass(), $f->getMessage(), $e->getFile(), $e->getLine()));

            $prev = $e;
            do {
                if ($exception === $wrapper = $prev) {
                    throw $e;
                }
            } while ($prev = $wrapper->getPrevious());

            $prev = new \ReflectionProperty($wrapper instanceof \Exception ? \Exception::class : \Error::class, 'previous');
            $prev->setAccessible(true);
            $prev->setValue($wrapper, $exception);

            throw $e;
        }

        $event->setResponse($response);

        if ($this->debug && $eventDispatcher instanceof EventDispatcherInterface) {
            $cspRemovalListener = function ($event) use (&$cspRemovalListener, $eventDispatcher) {
                $event->getResponse()->headers->remove('Content-Security-Policy');
                $eventDispatcher->removeListener(KernelEvents::RESPONSE, $cspRemovalListener);
            };
            $eventDispatcher->addListener(KernelEvents::RESPONSE, $cspRemovalListener, -128);
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => [
                ['logKernelException', 0],
                ['onKernelException', -128],
            ],
        ];
    }

    /**
     * Logs an exception.
     *
     * @param \Exception $exception The \Exception instance
     * @param string     $message   The error message to log
     */
    protected function logException(\Exception $exception, $message)
    {
        if (null !== $this->logger) {
            if (!$exception instanceof HttpExceptionInterface || $exception->getStatusCode() >= 500) {
                $this->logger->critical($message, ['exception' => $exception]);
            } else {
                $this->logger->error($message, ['exception' => $exception]);
            }
        }
    }

    /**
     * Clones the request for the exception.
     *
<<<<<<< HEAD
=======
     * @param \Exception $exception The thrown exception
     * @param Request    $request   The original request
     *
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * @return Request The cloned request
     */
    protected function duplicateRequest(\Exception $exception, Request $request)
    {
        $attributes = [
            '_controller' => $this->controller,
<<<<<<< HEAD
            'exception' => FlattenException::createFromThrowable($exception),
=======
            'exception' => FlattenException::create($exception),
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            'logger' => $this->logger instanceof DebugLoggerInterface ? $this->logger : null,
        ];
        $request = $request->duplicate(null, null, $attributes);
        $request->setMethod('GET');

        return $request;
    }
}
