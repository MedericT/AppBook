<?php

namespace AppBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBookBundle\Entity\Book;

class IndexController extends Controller
{
    public function indexAction()
    {
        $listBooks = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBookBundle:Book')
            ->findAll();

        return $this->render(
            'AppBookBundle:Index:index.html.twig',
            array(
                'listBooks' => $listBooks
            ));
    }
}
