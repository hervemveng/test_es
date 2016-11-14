<?php

// # src/WS/apiBundle/EventListener/SubmitJsonListener.php

namespace WS\apiBundle\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/**
 * Created by PhpStorm.
 * User: Hervé MVENG
 * Date: 13/11/2016
 * Time: 21:17
 */

class SubmitJsonListener
{

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $hasBeenSubmited = in_array($request->getMethod(), array('POST', 'PUT'), true);
        $isJson = ('application/json' === $request->headers->get('Content-Type'));
        if (!$hasBeenSubmited || !$isJson) {
            return;
        }
        $data = json_decode($request->getContent(), true);
        if (JSON_ERROR_NONE !== json_last_error()) {
            $event->setResponse(new JsonResponse(array('error' => 'Invalid or malformed JSON'), 400));
        }
        $request->request->add($data ?: array());
    }
}