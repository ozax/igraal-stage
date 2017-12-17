<?php
/**
 * Created by PhpStorm.
 * User: Reda
 * Date: 17/12/2017
 * Time: 18:20
 */
namespace AppBundle\Controller;

use AppBundle\Entity\User;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class UserController extends Controller
{
    /**
     * @Route("/users", name="users_list")
     * @Method({"GET"})
     */

    public function getUsersAction(Request $request )
    {

        $users = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:User')
            ->findAll();
        /* @var $users User[] */


        $AllUsers = [];
        foreach ($users as $user) {
            $AllUsers[] = [
                'name' => $user->getName(),
            ];
        }




        return new JsonResponse($AllUsers);



    }


}