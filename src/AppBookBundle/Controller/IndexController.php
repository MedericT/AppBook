<?php

namespace AppBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBookBundle:Index:index.html.twig');
    }
}
