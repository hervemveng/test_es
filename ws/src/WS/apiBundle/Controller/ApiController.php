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
use WS\apiBundle\Entity\User;

class ApiController extends Controller
{

    /**
     * @Method({"GET"})
     */
    public function addAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');

        $gender = $request->query->get('gender');
        $name = $request->query->get('name');
        $firstname = $request->query->get('firstName');
        $postalcode = $request->query->get('postalCode');
        $mail = $request->query->get('mail');
        $phone = $request->query->get('phone');
        $actuality = $request->query->get('actuality');
        $offer = $request->query->get('offer');

        // auccune valeur nulle malgré les required du form
        if ($name === null || $firstname === null) {
            return new JsonResponse(array(
                'state' => 'down',
                'ack' => 'les parametres noms et prenoms doivent etre renseignes '
            ), 422);
        }

        //aucun doublon
        $nbre =$em->getRepository('WSapiBundle:User')->countByNameLastName($name,$firstname);
        if ($nbre != 0) {
            return new JsonResponse(array(
                'state' => 'down',
                'ack' => 'Oops '.$name.' '.$firstname.' &agrave; d&eacute;j&agrave; &eacute;t&eacute; enregistr&eacute;'
            ), 422);
        }

        $user = new User();
        $user->setGender($gender);
        $user->setName($name);
        $user->setFirstname($firstname);
        $user->setPostalcode($postalcode);
        $user->setMail($mail);
        $user->setPhone($phone);
        $user->setActuality($actuality);
        $user->setOffer($offer);

        $em->persist($user);
        $em->flush();

        return new JsonResponse(array(
            'state' => 'up',
            'ack' => $user->toArray().', vous aviez &eacute;t&eacute; enregistr&eacute;.'
        ), 201);
    }
}