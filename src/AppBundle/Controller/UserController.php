<?php
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
    public function getUsersAction(Request $request)
    {
        {
            $users = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:User')
                ->findAll();
            /* @var $users User[] */

            $formatted = [];
            foreach ($users as $user) {
                $formatted[] = [
                    'id' => $user->getId(),
                    'name' => $user->getName(),
                ];
            }

            return new JsonResponse($formatted);
        }
    }
}