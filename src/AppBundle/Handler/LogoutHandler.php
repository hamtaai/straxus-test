<?php

namespace AppBundle\Handler;

use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\DependencyInjection\ContainerAware;
use AppBundle\Entity\users;

class LogoutHandler extends ContainerAware implements LogoutSuccessHandlerInterface {
   
    public function onLogoutSuccess(Request $request) {
        
        $session = $this->container->get('session');
        $userID = $session->get('userID');
        $loginTime = $session->get('sessionLoginTime');    
        
        $em = $this->container->get('doctrine')->getEntityManager();
        $user = $em->getRepository('AppBundle:users')->find($userID);
        if ($user) {
            $user->setLastLogin($loginTime);
            $em->persist($user);
            $em->flush();
        }
               
        $session->invalidate();
        
        return new RedirectResponse($this->container->get('router')->generate('login_route'));
    }

}
