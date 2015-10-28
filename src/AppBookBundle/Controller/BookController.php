<?php

namespace AppBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBookBundle\Entity\Book;
use AppBookBundle\Form\BookType;

class BookController extends Controller
{
    public function viewAction()
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

    public function addAction(Request $request)
    {
        $book = new Book();
        $form = $this->createForm( new BookType(), $book);

        if($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();

            return $this->redirect($this->generateUrl('appbook_index'));
        }

        return $this->render('AppBookBundle:Book:Add.html.twig',
                            array(
                                'form' => $form->createView()
                            ));
    }
}
