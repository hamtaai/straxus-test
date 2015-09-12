<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\loginType;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login_route")
     */
    public function loginAction(Request $request) {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->createForm(new loginType(), NULL, array(
            'action' => $this->container->get('router')->generate('login_check')
        ));   
        
        return $this->render(
                        'AppBundle:security:login.html.twig', 
                        array(
                            'form' => $form->createView(),
                            // last username entered by the user
                            'last_username' => $lastUsername,
                            'error' => $error,
                        )
        );
    }
}

