<?php

namespace UtahSpj\AwardsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class AdminController extends Controller
{
    public function indexAction()
    {
        if (false === $this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException();
        }
        return $this->render(
            'UtahSpjAwardsBundle:Admin:index.html.twig'
        );
    }

    public function usersAction()
    {
        $r = $this->getDoctrine()->getRepository('UtahSpjAwardsBundle:User');
        $users = $r->findAll();
        return $this->render(
            'UtahSpjAwardsBundle:Admin:users.html.twig',
            ['users'=>$users]
        );
    }

}
