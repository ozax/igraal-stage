<?php
/**
 * Created by PhpStorm.
 * User: Reda
 * Date: 15/12/2017
 * Time: 14:13
 */
namespace AppBundle\Controller;

use AppBundle\Entity\Commission;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class CommissionController extends Controller
{
    /**
     * @Route("/commissions", name="commission_list")
     * @Method({"GET"})
     */
    public function getCommissionAction(Request $request)
    {

        $commissions = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Commission')
            ->findAll();
        /* @var $commissions Commission[] */


        $AllCommissions = [];
        foreach ($commissions as $commission) {
            $AllCommissions[] = [
                'id' => $commission->getId(),
                'date'=> $commission->getDate(),
               'cashback' =>$commission->getCashBack()

            ];
        }

        return new JsonResponse($AllCommissions);

    }

}