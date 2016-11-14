<?php

// # src/WS/apiBundle/EventListener/ForbiddenExceptionListener.php

namespace WS\apiBundle\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Created by PhpStorm.
 * User: Hervé MVENG
 * Date: 13/11/2016
 * Time: 21:28
 */



class ForbiddenExceptionListener
{

    /**
     * @param GetResponseForExceptionEvent $event
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();
        if (!$exception instanceof AccessDeniedException) {
            return;
        }
        $error = 'The credentials are either missing or incorrect';
        $event->setResponse(new JsonResponse(array('error' => $error), 403));
    }
}