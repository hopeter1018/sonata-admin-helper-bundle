<?php

namespace HoPeter1018\SonataAdminHelperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HoPeter1018SonataAdminHelperBundle:Default:index.html.twig');
    }
}
