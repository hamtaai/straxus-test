<?php

namespace AppBundle\Handler;

use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\DependencyInjection\ContainerAware;

class AuthenticationHandler extends ContainerAware implements AuthenticationSuccessHandlerInterface
{
    function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {   
        $loginTime = new \DateTime();
        $session = $this->container->get('session');
        $session->start();
        $session->set('sessionLoginTime', $loginTime);
        
        $userID = $token->getUser()->getId();
        $session->set('userID', $userID);
        $session->save();
               
        return new RedirectResponse($this->container->get('router')->generate('main_page'));
    }
}
