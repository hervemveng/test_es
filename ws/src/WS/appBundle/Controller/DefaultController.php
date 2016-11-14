<?php

namespace WS\appBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WS\appBundle\Entity\MyApp;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $app = new MyApp();
        $result = $app->callApi('/add', array(
            'name' => "herve",
            'last_name' => "herve",
        ));

        var_dump($result);
        return $this->render('WSappBundle:Default:index.html.twig');
    }
}
