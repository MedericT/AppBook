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
            ->findBy(
                array(),
                array('title' => 'asc')
            );

        foreach ($listBooks as $key=>$book){
          $listAlphabetic[strtoupper($book->getTitle()[0])][] = $book;
        }


          //  dump($listAlphabetic);
          //  die();

        return $this->render(
            'AppBookBundle:Index:index.html.twig',
            array(
                'listBooks' => $listAlphabetic
            ));
    }
}
