<?php

// # src/WS/apiBundle/Controller/AppController.php

/**
 * Created by PhpStorm.
 * User: Hervé MVENG
 * Date: 13/11/2016
 * Time: 21:50
 */

namespace WS\apiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use WS\appBundle\Entity\User;

class ApiController extends Controller
{

    /**
     * @Method({"GET"})
     */
    public function addAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');

        $name = $request->request->get('name');
        $last_name = $request->request->get('last_name');

        // auccune valeur nulle
        if ($name === null || $last_name === null) {
            return new JsonResponse(array('error' => 'les parametres noms et prenoms doivent etre renseignes '), 422);
        }

        //aucun doublon
        $nbre =$em->getRepository('WSapiBundle:User')->countByNameLastName($name,$last_name);
        if ($nbre != 0) {
            return new JsonResponse(array('error' => 'Oops "'.$name.' '.$last_name.'" existe deja'), 422);
        }

        $user = new User();
        $user->setName($name);
        $user->setLastName($last_name);

        $em->persist($user);
        $em->flush();

        return new JsonResponse($user->toArray(), 201);
    }
}