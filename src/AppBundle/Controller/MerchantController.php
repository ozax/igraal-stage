<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Merchant;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class MerchantController extends Controller
{
    /**
     * @Route("/merchants", name="merchants_list")
     * @Method({"GET"})
     */
    public function getMerchantsAction(Request $request)
    {

        $merchants = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Merchant')
            ->findAll();
        /* @var $merchants Merchant[] */


        $AllMerchants = [];
        foreach ($merchants as $user) {
            $AllMerchants[] = [
                'name' => $user->getName(),

            ];
        }

        return new JsonResponse($AllMerchants);

    }

}