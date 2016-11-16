<?php
// src/WS/appBundle/Controller/DefaultController.php
namespace WS\appBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Common\Collections\ArrayCollection;
use WS\apiBundle\Entity\User;
use WS\apiBundle\Form\UserType;
use WS\appBundle\Entity\MyApp;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        //$result = null;
        $user = new User();
        $form = $this->get('form.factory')->create(UserType::class, $user);

        /*
        $form->handleRequest($request);

        if ($form->isValid()) {

            //return new JsonResponse($user->toArray(), 201);

            $app = new MyApp();
            $data = array(
                'gender' => $user->getGender(),
                'name' => $user->getName(),
                'firstName' => $user->getFirstname(),
                'postalCode' => $user->getPostalcode(),
                'mail' => $user->getMail(),
                'phone' => $user->getPhone(),
                'actuality' => $user->getActuality(),
                'offer' => $user->getOffer(),
            );

            $result = $app->sendPOST('/add', $data);

            return new JsonResponse($result, 201);

        }
        */
        if ($request->isXMLHttpRequest()) {
            $gender = $request->get('gender');
            $name = $request->get('name');
            $firstname = $request->get('firstName');
            $postalcode = $request->get('postalCode');
            $mail = $request->get('mail');
            $phone = $request->get('phone');
            $actuality = $request->get('actuality');
            $offer = $request->get('offer');

            $app = new MyApp();
            $data = array(
                'gender' => $gender,
                'name' => $name,
                'firstName' => $firstname,
                'postalCode' => $postalcode,
                'mail' => $mail,
                'phone' => $phone,
                'actuality' => $actuality,
                'offer' => $offer,
            );

            $result = $app->sendPOST('/add', $data);

            return new JsonResponse($result, 201);

        }

        //var_dump($result);
        return $this->render('WSappBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
