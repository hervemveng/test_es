<?php

namespace WS\apiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WSapiBundle:Default:index.html.twig');
    }
}
