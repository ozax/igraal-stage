<?php
/**
 * Created by PhpStorm.
 * User: Reda
 * Date: 15/12/2017
 * Time: 13:33
 */
namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class OneUserController extends Controller
{


    /**
     * @Route("/users/{user_id}", name="users_one")
     * @Method({"GET"})
     */
    public function getOneUserAction(Request $request)
    {
        $user = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:User')
            ->find($request->get('user_id'));

        if(empty($user)) {
            return new JsonResponse(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
        }
        /* @var $user User */

        $OneUser = [
            'id' => $user->getId(),
            'name' => $user->getName(),

        ];

        return new JsonResponse($OneUser);
    }
}