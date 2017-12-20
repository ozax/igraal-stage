<?php

namespace OC\RedaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{

    public function userAction()
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://localhost:8001/users');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        $obj = json_decode($response, true);


        $content = $this->get('templating')->render('OCRedaBundle:Client:users.html.twig', array('obj' => $obj,));

        return new Response($content);


    }
}