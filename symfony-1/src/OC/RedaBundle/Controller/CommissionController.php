<?php

namespace OC\RedaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CommissionController extends Controller
{

    public function commission1Action()
    {


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://localhost:8001/commission/1');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        $obj = json_decode($response, true);


        $content = $this->get('templating')->render('OCRedaBundle:Client:commission.html.twig', array('obj' => $obj,));

        return new Response($content);


    }

    public function commission2Action()
    {


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://localhost:8001/commission/2');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        $obj = json_decode($response, true);


        $content = $this->get('templating')->render('OCRedaBundle:Client:commission.html.twig', array('obj' => $obj,));

        return new Response($content);


    }


    public function commission3Action()
    {


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://localhost:8001/commission/3');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        $obj = json_decode($response, true);


        $content = $this->get('templating')->render('OCRedaBundle:Client:commission.html.twig', array('obj' => $obj,));

        return new Response($content);


    }
}