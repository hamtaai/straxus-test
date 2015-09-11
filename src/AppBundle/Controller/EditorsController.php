<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class EditorsController extends Controller {

    /**
     * Displays a form to create a new users entity.
     *
     * @Route("/editors", name="editor_page")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        return $this->render(
                    'AppBundle:editors:index.html.twig'
        );
    }
}