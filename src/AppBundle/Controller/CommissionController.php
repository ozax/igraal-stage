<?php
/**
 * Created by PhpStorm.
 * User: Reda
 * Date: 17/12/2017
 * Time: 19:43
 */
namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\All;


class CommissionController extends Controller
{
    /**
     * @Route("commission/{user_id}", name="commissions")
     */
    public function commissionAction($user_id)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Commission')
        ;
        $commissions = $repository->findByiduser($user_id);

        $AllCommissions = [];
        foreach ($commissions as $commission) {
            $AllCommissions[] = [
                $commission->getIduser()->getName(),
                 $commission->getIdmerchant()->getName(),
                 $commission->getCashBack(),
                $commission->getDate(),




            ];
        }

        return new JsonResponse($AllCommissions);

    }

}