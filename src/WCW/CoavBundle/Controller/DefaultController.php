<?php

namespace WCW\CoavBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WCWCoavBundle:Default:index.html.twig');
    }
}
