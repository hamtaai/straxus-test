<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AdminsController extends Controller {

    /**
     * Displays a form to create a new users entity.
     *
     * @Route("/admins", name="admin_page")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        return $this->render(
                    'AppBundle:admins:index.html.twig'
        );
    }
}